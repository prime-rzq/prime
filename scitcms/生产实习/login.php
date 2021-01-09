<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/login.css"/>
	</head>
	<body>
		<div class="login">
			<div class="content clearfix">
				<div class="content-left">
					<div class="logo">
						<img src="img/logo.png" alt=""/>
						<p>四川信息职业技术学院</p>
					</div>
				</div>
				<div class="shu"></div>
				<div class="content-right">

					<form action="<?php echo ($_SERVER['PHP_SELF'])?>" method="POST" class="login-form">
						<h2>用户登录/LOGIN</h2>
						<div class="identifire ">
							<span>身　份：</span>
							<select id="identifire" name="identifire">
								<option value="学生">学生</option>
								<option value="教师教辅人员">教师教辅人员</option>
							</select>
						</div>
						<div class="account clearfix">
							<span>账　号：</span>
							<input id="account" name="account" type="text" value="" required/>
						</div>
						<div class="password clearfix">
							<span>密　码：</span>
							<input id="pwd" name="pwd" type="password" value="" required/>
						</div>
						<div class="btn">
							<input id="login" type="submit" value="登录">
							<input id="forget" type="button" value="忘记密码">
						</div>
					</form>
					
				</div>
			</div>
		</div>
		<script src="js/jquery-3.5.1.js"></script>
		<script>
			$(()=>{
				$('#forget').click(function(){
					window.open('password.php','_self');
				})
			})
		</script>
		<?php
			include_once('conn.php');
			header('Connect-Type:text/html;Charset=utf-8');

			$account = @$_POST['account'];
			$pwd = @$_POST['pwd'];
			$identifire=@$_POST['identifire'];

			$mysqli->query('create database scitcms');
			$mysqli->query('use scitcms');
			$mysqli->query('set names utf8');
			$str_cre_stu ="
				create table studentInfo(
				stId char(8) primary key not null,
				sidentity varchar(20) default '学生',
				sname char(8) not null,
				spwd varchar(30) not null,
				sex char(2) not null,
				face char(10) not null,
				birthday datetime not null,
				sidentityId varchar(30) not null,
				nation char(10) not null,
				isOne char(2) not null,
				phone varchar(30) not null,
				qq varchar(30) not null,
				email varchar(30) not null,
				coachName char(8) not null,
				coachPhone varchar(30) not null)
			";
			$mysqli->query($str_cre_stu);
			
			$str_cre_tea="
				create table teacherInfo(
				teId char(8) primary key,
				tidentity varchar(20) default '教师教辅人员',
				tname char(8) not null,
				tpwd varchar(30) not null,
				sex char(2) not null,
				nation varchar(30) not null,
				birthday datetime not null,
				face char(10) not null,
				tidentityId varchar(30) not null,
				teaLevel char(4) not null,
				phone varchar(30) not null,
				qq varchar(10) not null,
				email varchar(30) not null,
				homeAddress varchar(30) not null)
			";
			$mysqli->query($str_cre_tea);


			$str = "create table login(id varchar(8),password varchar(30),identityId varchar(30),identity varchar(20));";
			$mysqli->query($str);
			$str = "insert into login(id,password,identityId,identity) select stId,spwd,sidentityId,sidentity from studentInfo;";
			$mysqli->query($str);
			$str = "insert into login(id,password,identityId,identity) select teId,tpwd,tidentityId,tidentity from teacherInfo;";
			$mysqli->query($str);
			$str = "select * from login where id = $account and password = $pwd";
			$result = $mysqli->query($str);
			// print_r($result)."<br>";
			if(isset($account)&&isset($pwd)){
				if($result->num_rows > 0){
					if($identifire == '学生'){
						echo "<script>window.open('student/StudentIndex.html','_self');</script>";
					}
					if($identifire == '教师教辅人员'){
						echo "<script>window.open('teacher/TeacherIndex.html','_self');</script>";
					}
				}else{
					echo "<script>alert('账号或密码错误！')</script>";
				}
			}
			$mysqli->close();
		?>
	</body>
</html>	