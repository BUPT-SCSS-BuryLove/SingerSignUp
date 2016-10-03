(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space


$("#application").submit(function(e) {

    var url = "backend/DataHandler.php"; // the script where you handle the form input.

    $.ajax({
        type: "POST",
        url: url,
        data: $("#application").serialize(), // serializes the form's elements.
        success: function(data)
        {
            Materialize.toast("提交成功~", 6000);
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});




$(document).ready(function() {
    $('textarea#others').characterCounter();
    $('select').material_select();
    $('#single_pos').slideUp();
    $('#group_pos').slideUp();
});


$('#app_for_single').change(function () {
    if($(this).is(':checked')){
        $('#group_pos').slideUp();
    }
});
$('#app_for_group').change(function () {
    if($(this).is(':checked')){
        $('#group_pos').slideDown();
    }
    else {
        $('#group_pos').slideUp();
    }
});