<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/password.css"/>
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
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="login-form">
						<h2>忘记密码/LOGIN</h2>
						<div class="identifire">
							<span>　账　号：</span>
							<input id="account" name="account"  type="text" />
						</div>
						<div class="account clearfix">
							<span>身份证号：</span>
							<input id="identityId" name="identityId" type="text" value="" />
						</div>
						<div class="password clearfix">
							<span>输入密码：</span>
							<input id="pwd" name="pwd" type="text" value="" />
						</div>
						<div class="btn">
							<input id="forget" type="submit" value="提交并登录">
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
		include_once('conn.php');

		$account = @$_POST['account'];
		$identityId = @$_POST['identityId'];
		$pwd = @$_POST['pwd'];

		$mysqli->query('use scitcms');
		if(isset($account)&&isset($identityId)&&isset($pwd)){
			$str_sql = "select * from login where id = $account and identityId = $identityId";
			$result =  $mysqli->query($str_sql);
			if($result){
				$str_update="
				update login
				set password = $pwd
				where id = $account and identityId = $identityId
				";
				$mysqli->query($str_update);
				echo "<script>window.open('student/StudentIndex.html','_self');</script>";
			}else{
					echo "<script>alert('账号或身份证号有误！')</script>";
			}
		}
		$mysqli->close();
		?>
	</body>
</html>
