<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckAddProfession;
use App\Profession;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function professions(){
        $professions = DB::select('SELECT * FROM professions');
        $results = array(
            'professions' => $professions,
        );
        return view('professions')->with($results);
    }

    public function addProfession(CheckAddProfession $request){
        $name = $request->pName;
        $payment = $request->pPayment;

        $p = new Profession;
        $p->pr_name = $name;
        $p->no_of_professionals = 0;
        $p->monthly_price = $payment;
        $saved = $p->save();

        if($saved){
            return back();
        }
    }

    public function deleteProfession(Request $request){
        $id = $request->professionId;
        $delete = DB::delete("DELETE FROM professions WHERE id=?",[$id]);
        if($delete){
            return back();
        }
    }

    public function editProfession(Request $request){
        $id = $request->pId;
        $name = $request->pName;
        $payment = $request->pPayment;

        $update = DB::update("UPDATE professions SET pr_name = '".$name."'
        ,monthly_price = '".$payment."'
        WHERE id = ?", [$id]);

        return back();
    }

    public function professionals(){
        $professionals = DB::select('SELECT professionals.id, professionals.p_name, professionals.p_email,
        professionals.p_id_card_num, professionals.p_id_card_img_name, professionals.p_id_card_img_src, professionals.p_image_name, professionals.p_image_src,
        professionals.profession_id, professionals.p_address, professionals.p_lat, professionals.p_long, professionals.rating, professionals.p_status, professionals.p_active,
        professions.pr_name
        FROM professionals JOIN professions ON  professionals.profession_id = professions.id');

        $results = array(
            'professionals' => $professionals,
        );
        return view('professionals')->with($results);
    }

    public function viewProfessional($id){
        $professional = DB::select('SELECT professionals.id, professionals.p_name, professionals.p_email,
        professionals.p_id_card_num, professionals.p_id_card_img_name, professionals.p_id_card_img_src, professionals.p_id_card_back_img_name, professionals.p_id_card_back_img_src,
         professionals.p_image_name, professionals.p_image_src,
        professionals.profession_id, professionals.p_address, professionals.p_lat, professionals.p_long, professionals.rating, professionals.p_status, professionals.p_active,
        professions.pr_name
        FROM professionals JOIN professions ON  professionals.profession_id = professions.id AND professionals.id = ?',[$id]);

        $jobs = DB::select('SELECT jobs.j_id, jobs.j_professional_id, jobs.j_customer_id, jobs.j_profession_id, jobs.j_rating, jobs.j_date,
        professionals.p_name,
         professions.pr_name,
        users.usr_name, users.usr_email
        FROM jobs JOIN professionals JOIN professions JOIN users ON
        jobs.j_professional_id = professionals.id AND
         jobs.j_profession_id = professions.id AND
          jobs.j_customer_id = users.usr_id AND
          jobs.j_professional_id = ?',[$id]);

        $complaints = DB::select('SELECT complaints.cmp_id, complaints.professional_id, complaints.customer_id, complaints.profession_id, complaints.complaint,
        professionals.p_name, professionals.p_email,
         professions.pr_name,
        users.usr_name, users.usr_email
        FROM complaints JOIN professionals JOIN professions JOIN users ON
        complaints.professional_id = professionals.id AND
         complaints.profession_id = professions.id AND
          complaints.customer_id = users.usr_id AND
          complaints.professional_id = ?',[$id]);

        $ratingSumJ = 0;

        $ratingsJ = DB::select('SELECT * FROM jobs WHERE j_professional_id = ?',[$id]);

        foreach($ratingsJ as $r){
            $ratingSumJ = $ratingSumJ + $r->j_rating;
        }

        $ratingCountJ = DB::select('SELECT COUNT(*) AS ratingCountJ FROM jobs WHERE j_professional_id = ?',[$id]);

        $rCountJ = $ratingCountJ[0]->ratingCountJ;


        if($rCountJ <= 0){

            $finalRatingJ = 0.0;

        } else {
            $ratingP = $ratingSumJ/$rCountJ;

            $finalRatingJ = number_format($ratingP, 1, '.', ',');
        }

        $results = array(
            'professional' => $professional,
            'jobs' => $jobs,
            'complaints' => $complaints,
            'ratingJ' => $finalRatingJ,
        );
        return view('view_professional')->with($results);
    }

    public function activateProfessional(Request $request){
        $id = $request->professionalId;

        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $day = $now->day;
        $jdate = $now->toDateString();

        $professional = db::select('SELECT * FROM professionals WHERE  id = ?',[$id]);

        $joined = $professional[0]->p_joined;
        if($joined = 'Joined'){
            $update = DB::update("UPDATE professionals SET 	p_active = 'Activated'
            where id = ?", [$id]);

            if($update){
                return back();
            }
        } elseif($joined = "NotJoined"){
            if($day == '29' || $day == '30' || $day == "31" || $day == "1" || $day == "2" || $day == "3" || $day == "4"){

                $fday = 5;
                $month = $month +1;
                if($month > 12){
                    $month = 1;
                    $year = $year + 1;
                }

                $fDate = $year."-".$month."-".$day;

                $fpDay = $fday - 5;
                $fpMonth = $month;
                if($fpMonth > 12){
                    $fpMonth = 1;
                }

                $update = DB::update("UPDATE professionals SET 	p_active = 'Activated' , p_joined = 'Joined'
                , p_joining_date = '".$fDate."', p_joining_day = '".$fday."' , p_payment_day = '".$fpDay."' ,
                 p_payment_month = '".$fpMonth."' , p_due_day = '".$fday."'
                where id = ?", [$id]);
            }

            else {

                $fpDay = $day - 5;
                $fpMonth = $month + 1;
                if($fpMonth > 12){
                    $fpMonth = 1;
                }

                $update = DB::update("UPDATE professionals SET 	p_active = 'Activated' , p_joined = 'Joined'
                , p_joining_date = '".$jdate."', p_joining_day = '".$day."' , p_payment_day = '".$fpDay."' ,
                 p_payment_month = '".$fpMonth."' , p_due_day = '".$day."'
                where id = ?", [$id]);
            }
        }
    }

    public function deactivateProfessional(Request $request){
        $id = $request->professionalId;

        $update = DB::update("UPDATE professionals SET 	p_active = 'Deactivated'
            where id = ?", [$id]);


        if($update){
            return back();
        }

    }

    public function deleteProfessional(Request $request){
        $id = $request->professionalId;

        $delete = DB::delete("DELETE FROM professionals WHERE id=?",[$id]);
        if($delete){
            return back();
        }
    }

    public function users(){
        $users = DB::select('SELECT * FROM users');
        $results = array(
            'users' => $users,
        );
        return view('users')->with($results);
    }

    public function complaints(){
        $userComplaints = DB::select('SELECT complaints.cmp_id, complaints.professional_id, complaints.customer_id, complaints.profession_id, complaints.complaint, complaints.against , complaints.response,
        professionals.p_name, professionals.p_email,
        professions.pr_name,
        users.usr_name, users.usr_email
        FROM complaints JOIN professionals JOIN professions JOIN users ON
        complaints.professional_id = professionals.id AND
         complaints.profession_id = professions.id AND
          complaints.customer_id = users.usr_id AND
          complaints.against = ?',['professional']);

        $professionalComplaints = DB::select('SELECT complaints.cmp_id, complaints.professional_id, complaints.customer_id, complaints.profession_id, complaints.complaint, complaints.against , complaints.response,
        professionals.p_name, professionals.p_email,
        professions.pr_name,
        users.usr_name, users.usr_email
        FROM complaints JOIN professionals JOIN professions JOIN users ON
        complaints.professional_id = professionals.id AND
         complaints.profession_id = professions.id AND
          complaints.customer_id = users.usr_id AND
          complaints.against = ?',['user']);

        $results = array(
            'userComplaints' => $userComplaints,
            'professionalComplaints' => $professionalComplaints,
        );
        return view('complaints')->with($results);
    }

    public function respondComplaint(Request $request){
        $id = $request->cmpId;
        $response = $request->response;

        $update = DB::update("UPDATE complaints SET response = '".$response."'
            WHERE cmp_id = ?", [$id]);

        return back();
    }

    public function payments(){

        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;


        $professionals = db::select('SELECT * FROM professionals WHERE p_payment_month = ?',[$month]);

        $unclr_Payment_Notifications = db::select('SELECT * FROM payment_notifications WHERE p_payment_status = ?',['Uncleared']);

        $clr_Payment_Notifications = db::select('SELECT * FROM payment_notifications WHERE p_payment_status = ?',['Cleared']);

        $results = array(
            'month' => $month,
            'year' => $year,
            'professionals' => $professionals,
            'unclr_Payment_Notifications' => $unclr_Payment_Notifications,
            'clr_Payment_Notifications' => $clr_Payment_Notifications,
        );
        return view('payments')->with($results);
    }

    public function receivePayment($id){
        $now = Carbon::now();
        $pdate = $now->toDateString();
        $month = $now->month;
        $year = $now->year;

        $paymentNotification = db::select('SELECT * FROM payment_notifications WHERE p_n_id = ?',[$id]);

        $prfnlId = $paymentNotification[0]->p_n_prfnl_id;

        $professional = db::select('SELECT * FROM professionals WHERE  id = ?',[$prfnlId]);

        if(!$professional){
            return back();
        }

        $updateProfessional = DB::update("UPDATE professionals SET 	p_paid_on = '".$pdate."', p_payment_status = 'Paid'
            where id = ?", [$prfnlId]);

        $updatePaymentNotification = DB::update("UPDATE payment_notifications SET p_payment_status = 'Cleared'
            where p_n_id = ?", [$id]);

        $rp = new Payment;
        $rp->professional_id = $id;
        $rp->payment_month = $month;
        $rp->payment_year = $year;
        $rp->payment_date = $pdate;
        $saved = $rp->save();

        $updateProfessional = DB::update("UPDATE professionals SET 	p_paid_on = '".$pdate."', p_payment_status = 'Paid'
            where id = ?", [$id]);

        if($saved){
            return back();
        }
    }

    public function paymentList($id){
        $professional = db::select('SELECT * FROM professionals WHERE id = ?',[$id]);

        $payments = db::select('SELECT * FROM payments WHERE professional_id = ?',[$id]);

        $results = array(
            'professional' => $professional,
            'payments' => $payments,
        );
        return view('payment_list')->with($results);

    }

    public function faqs(){
        $faqs = DB::select('SELECT * FROM f_a_qs');
        $results = array(
            'faqs' => $faqs,
        );
        return view('faqs')->with($results);
    }

    public function faqAnswer(Request $request){
        $qid = $request->qID;
        $qans = $request->ans;

        $update = DB::update("UPDATE f_a_qs SET faq_ans = '".$qans."'
            WHERE faq_id = ?", [$qid]);

        return back();
    }

    public function deleteQuestion(Request $request){
        $id = $request->qId;

        $delete = DB::delete("DELETE FROM f_a_qs WHERE faq_id=?",[$id]);
        if($delete){
            return back();
        }
    }

}
