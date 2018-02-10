
var department_list_active = "";
var pattern_list_active = "";
var g_table_name = "";
var g_filename = "";


$(document).ready(function(){
    $('.modal').modal({dismissible: false});
    $('#intro_modal').modal('open');

    $(".button-collapse").sideNav();

    mainList();
});


function mainList(){
    var preloader = $("#preloader");

    if (preloader.hasClass("display-none"))
        preloader.removeClass("display-none");

    ajaxCall("main_list");

    preloader.addClass("display-none");
}


function departmentList(id, table_name) {
    var preloader = $("#preloader");
    preloader.removeClass("display-none");
    g_table_name = table_name;

    $("#" + id).addClass("active");

    if (department_list_active.localeCompare("") !== 0)
        $("#" + department_list_active).removeClass('active');
    department_list_active = id;

    ajaxCall("table_name", g_table_name, "", "");

    preloader.addClass("display-none");
}


function patternList(id, filename) {
    var preloader = $("#preloader");
    preloader.removeClass("display-none");
    g_filename = filename;

    $("#" + id).addClass("active");

    if (pattern_list_active.localeCompare("") !== 0)
        $("#" + pattern_list_active).removeClass('active');
    pattern_list_active = id;

    ajaxCall("pattern_name",g_table_name, g_filename, "");

    preloader.addClass("display-none");
}


function inputPattern() {
    var preloader = $("#preloader");
    var list_div = $("#list");
    var input_text = $.trim($("#input_text").val());

    if (input_text.localeCompare("") !== 0) {
        preloader.removeClass("display-none");
        list_div.addClass("display-none");

        ajaxCall("input_pattern", g_table_name, g_filename, input_text);

        list_div.removeClass("display-none");
        preloader.addClass("display-none");
    }
    else {
        $("#input_text").focus();
        Materialize.toast('Please enter the data and then submit!', 4000);
    }

}


function deletePattern() {
    var preloader = $("#preloader");
    var list_div = $("#list");

    $("delete-btn").addClass("display-none");

    preloader.removeClass("display-none");
    list_div.addClass("display-none");

    ajaxCall("delete_pattern", g_table_name, g_filename, "");

    list_div.removeClass("display-none");
    preloader.addClass("display-none");
}


function ajaxCall(id, table_name, filename, input_text) {

    $.ajax({
        type: 'POST',
        url: '/php_files/ajaxResponse.php',
        data: "id=" + id + "&table_name=" + table_name + "&filename=" + filename + "&input_text=" + input_text,
        success: function (data) {
            if (id.localeCompare("input_pattern") === 0)
                $("#alert-box").html(data);
            else
                $("#list").html(data);
        },
        error: function (data) {
            $("#alert-box").html(data);
            Materialize.toast('An error occurred!', 4000);
        }
    });

}
