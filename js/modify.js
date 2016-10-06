
$(document).ready(function(){
	$('#confirm_pwd').click(function(e){
		
		$.ajax({
			type:"POST",
			url:"API/signIn.php",
			dataType:"json",
			data:{ 
				studentID: $('#buptid').val();
				pwd: hex_md5($("#password").val());
			},
			success:function(data){
				if(data.result == "NewUser"){
					Materialize.toast("您还没有注册过！", 6000);
				}
				else if(data.result == "Succeeded"){
					Materialize.toast("验证通过！请稍候……", 6000);
					$("#warning_card").slideUp();
					$("#modify").slideDown();
					
					$.ajax({
						type:"GET",
						url:"API/info.php",
						dataType:"json",
						success:function(data){
							$("#buptid").val(data.studentID);
							$("#campus").val(data.campus);
							$("#school").val(data.school);
							$("#name").val(data.name);
							$("#gender").val(data.gender);
							$("#contact").val(data.contact);
							$("#class").val(data.college_class);
							$("#song").val(data.title);
							$("#way").val(data.noMusic);
							$("#team_name").val(data.teamName);
							$("#number").val(data.teamPeople);
							$("#others").val(data.teamInfo);
							$("#userfile").val(data.file);
							if(data.type=="single"){
								$("input#app_for_single").attr("checked",'checked');
							}else $("input#app_for_group").attr("checked",'checked');
						},
						error: function (XMLHttpRequest, textStatus, errorThrown){    
								alert("XMLHttpRequest " + XMLHttpRequest[0]);
						}
					});							
				}
				else if(data.result == "Failed"){
					Materialize.toast("口令错误请重试！", 6000);
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown){    
                alert("XMLHttpRequest " + XMLHttpRequest[0]);
			}
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

	
	$.ajaxSetup({
		type:"POST",
		url:"API/Info.php",
		dataType:"json",
		success:function(data){
				Materialize.toast("修改成功！", 6000);
			},
		error: function (XMLHttpRequest, textStatus, errorThrown){    
            alert("XMLHttpRequest " + XMLHttpRequest[0]);
		}
	});
	
	
	$('#class').change(function(){
		$.ajax({
			data:{ 
				college_class:$("#class").val();
			},
		});
	});
	$('#campus').change(function(){
		$.ajax({
			data:{ 
				campus:$("#campus").val();
			},
		});
	});
	$('#school').change(function(){
		$.ajax({
			data:{ 
				school:$("#school").val();
			},
		});
	});
	$('#name').change(function(){
		$.ajax({
			data:{ 
				name:$("#name").val();
			},
		});
	});
	$('#gender').change(function(){
		$.ajax({
			data:{ 
				gender:$("#gender").val();
			},
		});
	});
	$('#contact').change(function(){
		$.ajax({
			data:{ 
				contact:$("#contact").val();
			},
		});
	});
	$('#song').change(function(){
		$.ajax({
			data:{ 
				title:$("#song").val();
			},
		});
	});
	$('#way').change(function(){
		$.ajax({
			data:{ 
				noMusic:$("#way").val();
			},
		});
	});
	$('[name=single_or_group]').change(function(){
		$.ajax({
			data:{ 
				type:$("input[name='single_or_group'][checked]").val();
			},
		});
	});
	$('#team_name').change(function(){
		$.ajax({
			data:{ 
				teamName:$("#team_name").val();
			},
		});
	});
	$('#number').change(function(){
		$.ajax({
			data:{ 
				teamPeople:$("#number").val();
			},
		});
	});
	$('#others').change(function(){
		$.ajax({
			data:{ 
				teamInfo:$("#others").val();
			},
		});
	});
	
	
	
});