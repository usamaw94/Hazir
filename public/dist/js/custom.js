$(document).on("click", ".profession-action-edit", function(){
    var id=$(this).attr('data-profession-id');
    var name=$(this).attr('data-profession-name');
    var payment=$(this).attr('data-profession-payment');

    $('#pMId').val(id);
    $('#pMName').val(name);
    $('#pMPayment').val(payment);
});

$(document).on("click", ".profession-action-delete", function(){
    var id=$(this).attr('data-profession-id');
    $('#idToDelete').text(id);
    $('#idDelValue').val(id);
});

//----------------------------------------------------------------------

$(document).on("click", ".professionals-action-delete", function(){
    var id=$(this).attr('data-professional-id');
    $('#idToDelete').text(id);
    $('#idDelValue').val(id);
});

$(document).on("click", ".professionals-action-activate", function(){
    var id=$(this).attr('data-professional-id');

    $('#idToActivate').text(id);
    $('#idActivateValue').val(id);
});

$(document).on("click", ".professionals-action-deactivate", function(){
    var id=$(this).attr('data-professional-id');

    $('#idToDeactivate').text(id);
    $('#idDeactivateValue').val(id);
});


$(document).on("click", ".professionals-action-delete", function(){
    var id=$(this).attr('data-professional-id');
    $('#idToDelete').text(id);
    $('#idDelValue').val(id);
});

$(document).on("click", ".btn-activate-professional", function(){
    var id=$(this).attr('data-professional-id');

    $('#idToActivate').text(id);
    $('#idActivateValue').val(id);
});

$(document).on("click", ".btn-deactivate-professional", function(){
    var id=$(this).attr('data-professional-id');

    $('#idToDeactivate').text(id);
    $('#idDeactivateValue').val(id);
});

$(document).on("click", ".btn-delete-professional", function(){
    var id=$(this).attr('data-professional-id');
    $('#idToDelete').text(id);
    $('#idDelValue').val(id);
});

//----------------------------------------------------------------------

$(document).on("click", ".user-action-view", function(){
    var id =$(this).attr('data-user-id');
    var name =$(this).attr('data-user-name');
    var email =$(this).attr('data-user-email');
    var img =$(this).attr('data-user-img');
    var phone =$(this).attr('data-user-phone');
    var address =$(this).attr('data-user-address');
    var status =$(this).attr('data-user-status');

    $('#mUImg').attr('src',img);

    $('#mUId').text(id);
    $('#mUName').text(name);
    $('#mUEmail').text(email);
    $('#mUAddress').text(address);
    $('#mUStatus').text(status);
    $('#mUPhone').text(phone);
});

//----------------------------------------------------------------------

$(document).on("click", ".complaint-user", function(){
    var id =$(this).attr('data-complaint-id');
    var prflId =$(this).attr('data-complaint-prfl-id');
    var uId =$(this).attr('data-complaint-u-id');
    var prfnId =$(this).attr('data-complaint-prfn-id');
    var cmplt =$(this).attr('data-complaint-cmplt');
    var prflName =$(this).attr('data-complaint-prfl-name');
    var prflEmail =$(this).attr('data-complaint-prfl-email');
    var prfnName =$(this).attr('data-complaint-prfn-name');
    var uName =$(this).attr('data-complaint-u-name');
    var uEmail =$(this).attr('data-complaint-u-email');
    var response =$(this).attr('data-complaint-response');

    $('#ucMId').text(id);
    $('#ucMPrflId').text(prflId);
    $('#ucMUId').text(uId);
    $('#ucMPrfnId').text(prfnId);
    $('#ucMCmplt').text(cmplt);
    $('#ucMPrflName').text(prflName);
    $('#ucMPrflEmail').text(prflEmail);
    $('#ucMPrfnName').text(prfnName);
    $('#ucMUName').text(uName);
    $('#ucMUEmail').text(uEmail);
    $('#ucMRspns').text(response);
    $('#ucmpIdVal').val(id);
    if(response == ''){
        $('#showResponse').hide();
    }
});

$(document).on("click", ".complaint-professional", function(){
    var id =$(this).attr('data-complaint-id');
    var prflId =$(this).attr('data-complaint-prfl-id');
    var uId =$(this).attr('data-complaint-u-id');
    var prfnId =$(this).attr('data-complaint-prfn-id');
    var cmplt =$(this).attr('data-complaint-cmplt');
    var prflName =$(this).attr('data-complaint-prfl-name');
    var prflEmail =$(this).attr('data-complaint-prfl-email');
    var prfnName =$(this).attr('data-complaint-prfn-name');
    var uName =$(this).attr('data-complaint-u-name');
    var uEmail =$(this).attr('data-complaint-u-email');
    var response =$(this).attr('data-complaint-response');

    $('#pcMId').text(id);
    $('#pcMPrflId').text(prflId);
    $('#pcMUId').text(uId);
    $('#pcMPrfnId').text(prfnId);
    $('#pcMCmplt').text(cmplt);
    $('#pcMPrflName').text(prflName);
    $('#pcMPrflEmail').text(prflEmail);
    $('#pcMPrfnName').text(prfnName);
    $('#pcMUName').text(uName);
    $('#pcMUEmail').text(uEmail);
    $('#pcMRspns').text(response);
    $('#pcmpIdVal').val(id);
    if(response == ''){
        $('#pShowResponse').hide();
    }
});

//----------------------------------------------------------------------

$(document).on("click", ".view-chalan", function(){
    var id =$(this).attr('data-prfnl-id');
    var img =$(this).attr('data-chalan-img');

    $('#prfnlId').text(id);
    $('#chalanImg').attr('src',img);
});

//----------------------------------------------------------------------

$(document).on("click", ".faq-action-edit", function(){
    var qid =$(this).attr('data-q-id');
    var ques =$(this).attr('data-q');
    var ans =$(this).attr('data-q-a');

    $('#qID').val(qid);
    $('#question').text(ques);
    $('#wEAns').text(ans);
});

$(document).on("click", ".faq-action-delete", function(){
    var id=$(this).attr('data-q-id');
    $('#idToDelete').text(id);
    $('#idDelValue').val(id);
});


//----------------------------------------------------------------------

$('[hint="tooltip"]').tooltip();

$(document).on("click", "#openNotify", function(){

    $('#notify').slideDown('medium').delay(1000)
        .slideUp('medium');
});