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
	$('#modify').slideUp();
  $('#upload-progress').hide();
  $.ajax({
			type:"POST",
			url:"API/signIn.php",
			dataType:"json",
			data:{},
			success:function(data){
			},
			error: function (XMLHttpRequest, textStatus, errorThrown){
			}
		});
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
  });
  $("#contact").keyup(function(){
    limit(this,11);
  });
  $("#class").keyup(function(){
    limit(this,10);
  });
	$('.modal-trigger').leanModal();
  $("#userfile").ajaxfileupload({
			action: 'API/file.php',
			valid_extensions : ['mp3','wav', 'aac', 'flac', 'aep', 'm4a'],
			onComplete: function(response) {
				$("#upload-progress").hide();
				if (response == "Succeeded") {
					Materialize.toast("文件上传完成", 6000);
				} else if (response == "Forbidden") {
					Materialize.toast("未注册，提交失败！请检查学号！", 6000);
				} else {
					Materialize.toast("上传失败！请阅读报名须知并检查文件大小和类型", 6000);
				}
			},
			onStart: function() {
				$("#upload-progress").show();
			},
			onCancel: function() {
				console.log('no file selected');
			}
		});
		
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