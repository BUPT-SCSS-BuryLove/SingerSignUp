
$(document).ready(function(){
	$('#confirm_pwd').click(function(e){
		
		var subinfo = new Object;
		subinfo.studentID = $('#buptid').val();
		subinfo.pwd = hex_md5($("#password").val());
		
		$.ajax({
			type:"POST",
			url:"API/signIn.php",
			dataType:"json",
			data:subinfo,
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
							$("#buptid2").val(data.studentID);
							$("#campus").val(data.campus);
							$("#campus").material_select();
							$("#school").val(data.school);
							$("#school").material_select();
							$("#name").val(data.name);
							$("#gender").val(data.gender);
							$("#gender").material_select();
							$("#contact").val(data.contact);
							$("#class").val(data.college_class);
							$("#song").val(data.title);
							$("#way").val(data.noMusic);
							$("#way").material_select();
							$("#team_name").val(data.teamName);
							$("#number").val(data.teamPeople);
							$("#others").val(data.teamInfo);
							$("#userfile_name").val(data.file);
							if(data.type=="single"){
								$("input#app_for_single").attr("checked",'checked');
							}else $("input#app_for_group").attr("checked",'checked');
							Materialize.updateTextFields();
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
<<<<<<< HEAD
			}
=======
			},
>>>>>>> master
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

	
	$.ajaxSetup({
		type:"POST",
		url:"API/Info.php",
		dataType:"json",
		success:function(data){
			if (data.result == "Succeeded") {
				Materialize.toast("修改成功！", 6000);
			} else {
			    Materialize.toast("修改失败 请重试", 6000);
			}
				
		},
		error: function (XMLHttpRequest, textStatus, errorThrown){    
            alert("error:XMLHttpRequest " + XMLHttpRequest[0]);
		}
	});
	
	
	$('#class').change(function(){
		var sub = new Object;
		sub.college_class = $("#class").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				college_class:$("#class").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#campus').change(function(){
		var sub = new Object;
		sub.campus = $("#campus").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				campus:$("#campus").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#school').change(function(){
		var sub = new Object;
		sub.school = $("#school").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				school:$("#school").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#name').change(function(){
		var sub = new Object;
		sub.name = $("#name").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				name:$("#name").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#gender').change(function(){
		var sub = new Object;
		sub.gender = $("#gender").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				gender:$("#gender").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#contact').change(function(){
		var sub = new Object;
		sub.contact = $("#contact").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				contact:$("#contact").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#song').change(function(){
		var sub = new Object;
		sub.title = $("#song").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				title:$("#song").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#way').change(function(){
		var sub = new Object;
		sub.noMusic = $("#way").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				noMusic:$("#way").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$("input[name='single_or_group']").change(function(){
		var sub = new Object;
		sub.type = $("input[name='single_or_group'][checked]").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				type:$("input[name='single_or_group']:checked").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#team_name').change(function(){
		var sub = new Object;
		sub.teamName = $("#team_name").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				teamName:$("#team_name").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#number').change(function(){
		var sub = new Object;
		sub.teamPeople = $("#number").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				teamPeople:$("#number").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	$('#others').change(function(){
		var sub = new Object;
		sub.teamInfo = $("#others").val();
		$.ajax({
<<<<<<< HEAD
			data:{ 
				teamInfo:$("#others").val()
			},
=======
			data:sub,
>>>>>>> master
		});
	});
	
	
	
});