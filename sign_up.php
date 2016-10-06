<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>“三笙有杏”歌手大赛报名</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

  <!-- CSS  -->
  <link href="css/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php include 'libs/header.php' ;?>
  
  <br><br><br>
 
        <div id="you-are-in" class="modal">
            <div class="modal-content">
            <p>你已经注册了</p>
            </div>
            <div class="modal-footer">
            <a href="modify.php" class=" modal-action modal-close waves-effect waves-teal btn-flat">查看报名信息</a>
            </div>
        </div>

        <div class="container">
            <ul class="collapsible popout" data-collapsible="accordion">
				<li>	
                    <div class="collapsible-header"><i class="material-icons">account_box</i>个人信息</div>
                    <div class="collapsible-body">
                        <div class="container in-collapsible">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row"><br>
										<div class="input-field col s12 m6">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" 
											id="buptid" name="buptid" type="text" >
                                            <label for="buptid">学号</label>
                                        </div>
										<div class="input-field col s12 m6">
                                            <i class="material-icons prefix">class</i>
                                            <input id="class" name="class" type="text">
                                            <label for="class">班级</label>
                                        </div>
										<div class="input-field col s12 m6">
                                            <i class="material-icons prefix">group_work</i>
                                            <select id="campus" name="campus">
                                                <option value="" disabled selected>请选择</option>
                                                <option value="西土城校区">西土城</option>
                                                <option value="沙河校区">沙河</option>
                                                <option value="宏福校区">宏福</option>
                                            </select>
                                            <label for="campus">校区</label>
                                        </div>
										<div class="input-field col s12 m6">
                                            <i class="material-icons prefix">my_location</i>
                                            <select id="school" name="school">
                                                <option value="" disabled selected>请选择</option>
                                                <option value="数字媒体与设计艺术学院">数字媒体与设计艺术学院</option>
                                                <option value="网络空间安全学院">网络空间安全学院</option>
                                                <option value="软件学院">软件学院</option>
												<option value="公共管理学院">公共管理学院</option>
                                            </select>
                                            <label for="school">学院</label>
                                        </div>
                                        <div class="input-field col s8 m4">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="name" name="name" type="text">
                                            <label for="name">姓名</label>
                                        </div>
                                        <div class="input-field col s4 m2">
                                            <select id="gender" name="gender">
                                                <option value="" disabled selected>请选择</option>
                                                <option value="男">男</option>
                                                <option value="女">女</option>
                                            </select>
                                            <label for="gender">性别</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">phone</i>
                                            <input id="contact" name="contact" type="text">
                                            <label for="contact">联系方式</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
				<li>
					<div class="collapsible-header"><i class="material-icons">settings</i>设置口令</div>
					<div class="collapsible-body">
                        <div class="container in-collapsible">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row"><br>
										<div class="input-field col s12 m6">
											口令有什么作用呢？<br><br>
											当你的报名信息（伴奏、参赛曲目等）需要修改时，需要用到这个口令进行身份验证哦●ω●~<br>
										</div>
										<div class="input-field col s12 m6"><br><br>
											<i class="material-icons prefix">lock</i>
                                            <input id="password" name="password" placeholder="口令一定要牢记哦●ω●~" type="text">
                                            <label for="password">口令</label>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>报名信息</div>
                    <div class="collapsible-body">
                        <div class="container in-collapsible">
                            <div class="col s12">
                                <div class="row"><br>
									<div class="input-field col s12 m6">
                                        <i class="material-icons prefix">volume_up</i>
                                        <input id="song" name="song" type="text">
                                        <label for="song">海选曲目</label>
                                    </div>
									<div class="input-field col s12 m6">
										<i class="material-icons prefix">volume_mute</i>
                                        <select id="way" name="way">
											<option value="" disabled selected>请选择</option>
											<option value="1">是</option>
											<option value="0">否</option>
										</select>
										<label for="way">是否清唱</label>
                                    </div>
								</div>
								<div class="row">
                                    <div class="input-field col s12">
										  <input name="single_or_group" type="radio" id="app_for_single" value="single" />
										  <label for="app_for_single">个人参赛</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                          <input name="single_or_group" type="radio" id="app_for_group" value="team" />
										  <label for="app_for_group">组队参赛</label><br><br><br>
                                    </div>
                                    <div id="group_pos"><br><br><br>
										<div class="input-field col s12">
                                            <i class="material-icons prefix">settings_voice</i>
                                            <input id="team_name" name="team_name" type="text">
                                            <label for="team_name">队名</label>
										</div>
										<div class="input-field col s12">
                                            <i class="material-icons prefix">supervisor_account</i>
                                            <input id="number" name="number" type="text" placeholder="不得超过6人">
                                            <label for="number">参赛人数</label>
										</div>
										<div class="input-field col s12">
											<textarea id="others" name="others" class="materialize-textarea" 
												  length="200"></textarea>
											<label for="others">详细信息</label>
											<span>请在上面横线上填写你萌队里其他小伙伴的姓名和学号哦●ω●~例如：张三2015211633+李四2015211366</span>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
			</ul>
        </div>
    
	<div class="center">
                <button id="submit_btn" class="btn waves-effect waves-light tooltipped"
                        data-position="bottom" data-delay="50" data-tooltip="(灬ºωº灬)又有可爱的宝宝来报名辣好开森~︶ε╰✿ " type="submit">提交
                    <i class="material-icons right">send</i>
                </button>
    </div><br>
	<form enctype="multipart/form-data" id="file" action="API/file.php" method="POST">
        <div class="container">
            <ul class="collapsible popout" data-collapsible="accordion">
				<li>
                    <div class="collapsible-header"><i class="material-icons">radio</i>上传伴奏</div>
                    <div class="collapsible-body">
                        <div class="container in-collapsible">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
										<div class="input-field col s12">
											<span>在这里上传音频或修改音频哦●ω●~</span><br>
											<br><br>
										</div>
										<div class="input-field col s12">
											<div class="progress">
												<div class="indeterminate"></div>
											</div>
										</div>
										<div class="input-field col s12">
											<div class="file-field input-field">
												<div class="btn">
													<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
													<span>选择音频<i class="material-icons right">radio</i></span>
													<input name="userfile" type="file">
												</div>
												<div class="file-path-wrapper">
													<input id="userfile" class="file-path validate" type="text">
												</div>
											</div>
											<div class="center">
												<button id="submit_file" class="btn waves-effect waves-light tooltipped" 
													data-position="bottom" data-delay="50" data-tooltip="仿佛听到了可爱的宝宝们美丽的歌声~︶ε╰︶" type="submit">上传
														<i class="material-icons right">cloud</i>
												</button>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
			</ul>
		</div>
	</form>
                
  <br><br><br>
  
<?php include 'libs/footer.php';?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/md5.js"></script>
  <script src="js/index.js"></script>
  <script src="js/form.js"></script>
  </body>
</html>
