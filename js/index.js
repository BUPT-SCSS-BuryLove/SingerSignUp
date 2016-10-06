(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function(){
	$('textarea#others').characterCounter();
	$('select').material_select();
	$('#single_pos').slideUp();
	$('#group_pos').slideUp();
});
	
	
function len(s){
  s=String(s);
  return s.length;
}
function limit(obj,limit){
  var val=obj.value;
  if(len(val)>limit){
    val=val.substring(0,limit);
    while (len(val)>limit){
      val=val.substring(0,val.length-1);
    };
    obj.value=val;
  }
}
$(document).ready(function(){
  $("#buptid").keyup(function(){
    limit(this,10);
  })
})

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