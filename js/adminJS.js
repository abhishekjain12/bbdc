
$(document).ready(function(){
    $('.modal').modal({dismissible: false});
    $('#admin_modal').modal('open');

    $('select').material_select();

    $(".button-collapse").sideNav();
});


window.onload = function() {
    var eSelect = document.getElementById('select-table');
    eSelect.onchange = function() {
        adminAjaxCall("admin_table_detail", eSelect.value, "", "", "");
        adminAjaxCall("admin_table_list", eSelect.value, "", "", "");
    }

    var eSelect2 = document.getElementById('select-table-2');
    eSelect2.onchange = function() {
        var preloader = $("#preloader-2");
        preloader.removeClass("display-none");

        adminAjaxCall("admin_file_list", eSelect2.value, "", "", "");
        $("#note-2").html("Now select the File. <br />");

        preloader.addClass("display-none");
    }

    var eSelect3 = document.getElementById('select-table-3');
    eSelect3.onchange = function() {
        var preloader = $("#preloader-3");
        preloader.removeClass("display-none");

        adminAjaxCall("admin_file_list_2", eSelect3.value, "", "", "");
        $("#note-3").html("Now select the File. <br />");

        preloader.addClass("display-none");
    }
};


function logIN() {
    var username = $("#username").val();
    var password = $("#password").val();
    var id = "admin_login";

    $.ajax({
        type: 'POST',
        url: '/php_files/ajaxResponse.php',
        data: "id=" + id + "&username=" + username + "&password=" + password ,
        success: function (data) {
            console.log('Submission was successful. ' + data);

            if ($.trim(data).localeCompare("success") === 0) {
                $("#main_container").removeClass("display-none");
                $("#edit_file_container").removeClass("display-none");
                $("#edit_que_container").removeClass("display-none");
                $('#admin_modal').modal('close');
                Materialize.toast("Logged in!", 4000, 'light-green');
            }
            else {
                $("#check-login").html("Invalid Username or Password.");
            }
        },
        error: function (data) {
            console.log('An error occurred. ' + data);
            $("#check-login").html("Error. " + data);
        }
    });

}


function filePassword(pass) {
    if (pass.localeCompare("2607") === 0){
        $("#yes").removeClass("disabled");
    }
    else {
        $("#file-alert-password").html("Invaild password.");
        $("#yes").addClass("disabled");
    }
}


function quePassword(pass) {
    if (pass.localeCompare("2607") === 0){
        $("#yes-2").removeClass("disabled");
    }
    else {
        $("#que-alert-password").html("Invaild password.");
        $("#yes-2").addClass("disabled");
    }
}


function setInputValue(data) {
 	var preloader = $("#preloader");
    var pattern = $("#pattern");
    var filename = $("#filename");
    var count = $("#count");

    preloader.removeClass("display-none");
    $("#note").html("");

    pattern.removeAttr("disabled");
    filename.removeAttr("disabled");
    count.removeAttr("disabled");

    var words = data.split(" ");
    var file_number = words[0].substr(words[0].length - 2);
    file_number = parseInt(file_number) + 1;
    words[0] = words[0].substring(0, words[0].length-2);
    words[0] = words[0] + ('0' + file_number).slice(-2);

    filename.val(words[0]).focus();
    count.val(words[1]).focus();
    pattern.focus();

    $('html, body').animate({
        scrollTop: pattern.offset().top
    }, 2000);

   preloader.addClass("display-none");
}


function resetInput() {
    $("#preloader").addClass("display-none");

    var disabled = $("#disabled");
    var select_table = $("#select-table");
    var pattern = $("#pattern");
    var filename = $("#filename");
    var count = $("#count");

    $("#note").html("First select the department. <br />");
    $("#list").html("");

    pattern.val("");
    filename.val("");
    count.val("");

    pattern.blur();
    filename.blur();
    count.blur();

    disabled.prop("disabled", false);
    select_table.find('option[value="disabled"]').prop('selected', true);
    disabled.prop("disabled", true);
    select_table.material_select();

    pattern.prop("disabled", true);
    filename.prop("disabled", true);
    count.prop("disabled", true);
}


function insertData() {
    var preloader =$("#preloader");
    preloader.removeClass("display-none");

    var pattern = $.trim($("#pattern").val());
    var filename = $.trim($("#filename").val());
    var count = $.trim($("#count").val());

    if (pattern.localeCompare("") !== 0 && filename.localeCompare("") !==0 && count.localeCompare("") !==0) {
        adminAjaxCall("insert_data", $("#select-table").val(), filename,
            pattern, count);
    }
    else {
        $("#input_text").focus();
        preloader.addClass("display-none")
        Materialize.toast('Please enter the data and then submit!', 4000);
    }

}


function alertModal() {
    $('#alert_modal').modal('open');
    $("#password-2").focus();
}


function alertModal2() {
    $('#alert_modal_2').modal('open');
    $("#password-3").focus();
}


function setFileInput(data) {
    var file_data = $("#file_data");
    file_data.prop("disabled", false);
    file_data.focus();
    file_data.val(data);
    file_data.trigger('autoresize');

    $("#submit-file-btn").removeClass("disabled");
}


function updateFile(check) {
    if (check.localeCompare("yes") === 0){
        $("#submit-file-btn").addClass("disabled");
        $("#preloader-2").removeClass("display-none");
        $('#alert_modal').modal('close');

        adminAjaxCall("update_file_data", $("#select-table-2").val(), $("#select-file").val(), $("#file_data").val());
    }
    else {
        $('#alert_modal').modal('close');
    }
}


function updateQue(check) {
    if (check.localeCompare("yes") === 0){
        $("#submit-que-btn").addClass("disabled");
        $("#preloader-3").removeClass("display-none");
        $('#alert_modal_2').modal('close');

        adminAjaxCall("update_que_data", $("#select-table-3").val(), $("#select-que").val(), $("#pattern-2").val());
    }
    else {
        $('#alert_modal_2').modal('close');
    }
}


function resetFileInput() {

    $("#preloader-2").addClass("display-none");
    $("#list-file").html("");

    var disabled = $("#disabled-2");
    var select_table = $("#select-table-2");
    var disabled_3 = $("#disabled-3");
    var select_file = $("#select-file");
    var file_data = $("#file_data");

    $("#note-2").html("First select the department. <br />");

    file_data.val("");
    file_data.blur();
    file_data.trigger('autoresize');

    disabled.prop("disabled", false);
    select_table.find('option[value="disabled"]').prop('selected', true);
    disabled.prop("disabled", true);
    select_table.material_select();

    disabled_3.prop("disabled", false);
    select_file.find('option[value="disabled"]').prop('selected', true);
    disabled_3.prop("disabled", true);
    select_file.material_select();

    file_data.prop("disabled", true);
}


function resetQueInput() {

    $("#preloader-3").addClass("display-none");
    $("#list-file-2").html("");

    var disabled = $("#disabled-4");
    var select_table = $("#select-table-3");
    var disabled_5 = $("#disabled-5");
    var select_file = $("#select-que");
    var que_data = $("#pattern-2");

    $("#note-3").html("First select the department. <br />");

    que_data.val("");
    que_data.blur();

    disabled.prop("disabled", false);
    select_table.find('option[value="disabled"]').prop('selected', true);
    disabled.prop("disabled", true);
    select_table.material_select();

    disabled_5.prop("disabled", false);
    select_file.find('option[value="disabled"]').prop('selected', true);
    disabled_5.prop("disabled", true);
    select_file.material_select();

    que_data.prop("disabled", true);
}


function adminAjaxCall(id, admin_table_name, filename, pattern_text, count) {

    $.ajax({
        type: 'POST',
        url: '/php_files/ajaxResponse.php',
        data: "id=" + id + "&table_name=" + admin_table_name + "&filename=" + filename +
                "&pattern_text=" + pattern_text + "&count=" + count,
        success: function (data) {

            if (id.localeCompare("admin_table_detail") === 0) {
                setInputValue(data);
                Materialize.toast("department selected!", 4000, 'light-green');
            }

            else if(id.localeCompare("insert_data") === 0){
                $("#alert-box").html("<script>" + data + "</script>");
                resetInput();
            }

            else if (id.localeCompare("admin_table_list") === 0){
                $("#list").html(data);
                Materialize.toast("Table Data Fetched!", 4000, 'light-green');
                $("#submit-btn").removeClass("disabled");
            }

            else if (id.localeCompare("admin_file_list") === 0){
                $("#list-file").html(data);
                Materialize.toast("Department Data Fetched!", 4000, 'light-green');
            }

            else if (id.localeCompare("admin_file_list_2") === 0){
                $("#list-file-2").html(data);
                Materialize.toast("Department Data Fetched!", 4000, 'light-green');
            }

            else if (id.localeCompare("admin_file_data") === 0){
                setFileInput($.trim(data));
                Materialize.toast("File Data Fetched!", 4000, 'light-green');
            }

            else if (id.localeCompare("update_file_data") === 0){
                if ($.trim(data).localeCompare("success") === 0) {
                    Materialize.toast("File Updated!", 4000, 'light-green');
                    resetFileInput();
                }
                else {
                    Materialize.toast('An error occurred!' + data, 4000);
                }
            }

            else if (id.localeCompare("update_que_data") === 0){
                if ($.trim(data).localeCompare("success") === 0) {
                    Materialize.toast("File Updated!", 4000, 'light-green');
                    resetQueInput();
                }
                else {
                    Materialize.toast('An error occurred!' + data, 4000);
                }
            }

        },
        error: function (data) {
            Materialize.toast('An error occurred!' + data, 4000);
        }
    });

}


$(document).ready(function() {
    $("#pattern").keypress(function(event) {
        if (event.which === 13) {
            event.preventDefault();
            insertData();
        }
    });

    $("#filename").keypress(function(event) {
        if (event.which === 13) {
            event.preventDefault();
            insertData();
        }
    });

    $("#count").keypress(function(event) {
        if (event.which === 13) {
            event.preventDefault();
            insertData();
        }
    });

    $("#password").keypress(function(event) {
        if (event.which === 13) {
            event.preventDefault();
            logIN();
        }
    });
});
