/*!
*
* custom.js
* Author : <dandoridwanto@ymail.com>
*
*/

var showloader = true;
var timeOut = '';

/**
* !---------------------------------------------------------------------------------------------------------------
* Ketika Ajax di-start, munculkan loading
*/
$(document).on({
    ajaxStart: function () {
        if (showloader) {
            timeOut = setTimeout(function () {
                $("#Processing").html("<div class='process'><i class='spinner-border spinner-border-sm'></i> Loading...</div>");
                $("#Processing").show();
            }, 500);
        }
    },
    ajaxStop: function () {
        clearTimeout(timeOut);
        $("#Processing").hide();
        showloader = true;
    }
});

/**
* !---------------------------------------------------------------------------------------------------------------
* AjaxNotif, Munculkan notifikasi ajax
*/
function AjaxNotif(msg) {
    $("#ajaxFailed").html("<div class='FailedMessage'>" + msg + "</div>");
    $("#ajaxFailed").fadeIn('fast').show().delay(3000).fadeOut('fast');
}

/**
* !---------------------------------------------------------------------------------------------------------------
* MessagerNotif by jquery-easyui
*/
function MessagerNotif(msg) {
    $.messager.show({
        title:'Info',
        msg: msg,
        timeout: 2500,
        // height: 130,
        width: 310,
        showType:'slide',
    });
}

/**
* !---------------------------------------------------------------------------------------------------------------
* MessagerNotif from https://izitoast.marcelodolza.com/
*/
function izitoastNotif(msg, type='success') {

    if (type == 'success') {
        iziToast.success({
            title: 'Info',
            message: msg,
            position: 'topCenter',
            timeout: 3000,
            progressBar: false,
        });
    } else {
        iziToast.show({
            // theme: 'dark',
            icon: 'ico-warning',
            iconColor: '#000',
            color: 'red', // blue, red, green, yellow
            title: 'Info',
            titleColor: '#000',
            message: msg,
            messageColor: '#000',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            timeout: 3000,
            progressBar: false,
        });
    }
}

/*!++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
* Fungsi Untuk Panggil modal bootstrap
*/
function ModalOpen(kelas, title, content, contentType, closeCaption) {
    BlurPage('MyModal');
    $('.modal-dialog').removeClass('modal-sm');
    $('.modal-dialog').removeClass('modal-lg');
    $('.modal-dialog').removeClass('modal-xxl');

    $('.modal-dialog').addClass(kelas);
    $('#modal-title').html(title);
    if (contentType == 'html') {
        $('#modal-body').html(content);
    }
    if (contentType == 'load') {
        $('#modal-body').load(content);
    }

    $('#modal-footer').html("<button type='button' class='btn btn-sm btn-outline-secondary' data-bs-dismiss='modal'><i class='fa fa-times'></i> " + closeCaption + "</button>");
    $('#MyModal').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#MyModal').modal('show');
}


/**
 * !+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
* Show Modal on Click
*/
$(document).on('click', '#ShowModal', function (e) {
    e.preventDefault();
    ModalOpen($(this).data('class'), $(this).data('header'), $(this).attr('href'), $(this).data('type'), "Close");
});


/*!++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
* BlurPage, ketika modal ditampilkan, background web akan di-blur
*/
function BlurPage(ModalID) {
    $('#' + ModalID).on('show.bs.modal', function () {
        //$('#top').addClass('blur');
    });
    $('#' + ModalID).on('hide.bs.modal', function () {
        //$('#top').removeClass('blur');
        setTimeout(function () {
            $('#modal-title, #modal-body, #modal-footer').html('');
            $('.modal-dialog').removeClass('modal-fullscreen');
        }, 500);
    });
}

function save_form_modal(form_id='form-input', type='POST') {
    let FormID = $('#'+form_id);

    $.ajax({
        url: FormID.attr('action'),
        cache: false,
        type: type,
        data: FormID.serialize(),
        dataType: 'json',
        success: d =>  {
            if (d.status == 0) {
                let message = "";
                $.each(d.msg, function(key, value) {
                    // console.log(key +' '+value);
                    message += "<i class='fa fa-times'></i> "+value+"<br>";
                });
                message += "";
                $('#showAlertNotif').html(message).css("display", "block").slideDown();
                setTimeout(function () {
                    $('#showAlertNotif').slideUp();
                }, 3000);
            }

            if (d.status == 1) {
                izitoastNotif(d.msg);

                if (d.datatable_reload != undefined && d.datatable_reload.length > 0) {
                    showDatatables();
                    // $(d.datatable_reload).DataTable().ajax.reload(null, false);
                }
                
                $('#MyModal').modal('hide');
            }
        }
    });
}

/**
* !---------------------------------------------------------------------------------------------------------------
* Ready Function
*/
$(document).ready(function () {
    $.ajaxSetup({
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connected, Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Request Timeout.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            AjaxNotif(msg);
        },
        cache: false
    });
});
/* End Document Ready */