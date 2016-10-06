
$(document).ready(function(){
	$('#confirm_id').click(function(e){//注册
		$.ajax({
			type:"POST",
			url:"API/signIn.php",
			dataType:"json",
			data:{ studentID:$('#buptid').val() },
			success:function(data){
				if(data.result == "NewUser"){
					Materialize.toast("注册成功！", 6000);
				}
				else {
					Materialize.toast("您已经注册过了哦！", 6000);
					setTimeout("window.location.href = 'modify.php'",6000);  
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown){    
                alert("XMLHttpRequest " + XMLHttpRequest[0]);
			}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});


	$("#submit_btn").click(function(e){//除文件外的其他信息

		var url = "API/info.php"; // the script where you handle the form input.
		 
		$.ajax({
			type: "POST",
			url: url,
			data: {
				studentID = $("#buptid").val();
				pwd = hex_md5($("#password").val());
				campus = $("#campus").val();
				school = $("#school").val();
				name = $("#name").val();
				gender = $("#gender").val();
				contact = $("#contact").val();
				college_class = $("#class").val();
				title = $("#song").val();
				noMusic = $("#way").val();
				type = $("input[name='single_or_group'][checked]").val();
				teamName = $("#team_name").val();
				teamPeople = $("#number").val();
				teamInfo = $("#others").val();
			},
			success: function(data){
				if(data.result == "Succeeded"){
					Materialize.toast("提交成功！", 6000);
				}
				else if(data.result == "Forbidden"){
					Materialize.toast("未注册，提交失败！请检查学号！", 6000);
				}
				else Materialize.toast("提交失败！", 6000);
			},
			error: function (XMLHttpRequest, textStatus, errorThrown){    
				alert("XMLHttpRequest " + XMLHttpRequest[0]);
			}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

});


