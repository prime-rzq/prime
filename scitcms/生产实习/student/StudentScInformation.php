<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title></title>
		<link rel='stylesheet' href='../css/common.css'>
		<link rel='stylesheet' type='text/css' href='../css/StudentScInformation.css'/>
	</head>
	<body>
		<?php
		include_once('../conn.php');
		
        // $name=@$_POST['name'];
        // $fenxiao=@$_POST['fenxiao'];
        // $xiaoqu=@$_POST['xiaoqu'];
        // $yxdm=@$_POST['yxdm'];
        // $sfdm=@$_POST['sfdm'];
        // $bmdm=@$_POST['bmdm'];
		// $szddm=@$_POST['szddm'];
		
		$mysqli->query('use scitcms');
		
		$result = $mysqli -> query("create table scitcInfo(
			collegeCode varchar(30) primary key,
			collegeName varchar(30) not null,
			branCollName varchar(30) not null,
			locaCollege varchar(30) not null,
			collPrvCode varchar(30) not null,
			collDepartCode varchar(30) not null,
			locaCollCode varchar(30) not null
		)");
	
        $str_sql='select * from scitcInfo';
        $result = $mysqli->query($str_sql);
		// print_r($result);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "
				<div class='container'>
					<form action='<?php echo htmlspecialchars($_SERVER[PHP_SELF])?>' method='POST'>
						<div class='content'>
							<div class='bx'>
								<div class='box'>
									<div class='top'>
										<div class='left'>当前位置>学校信息</div>
										<div class='right'>
											<input type='button'id='edit' class='l' value='编辑'>
											<input type='submit'id='keep' class='r' value='保存'>
										</div>
									</div>
									<div class='content'>
										<div class='main'>
											<span class='title'>基础信息</span>
										</div>
									</div>
									<div class='bottom' align='center'>
										<table cellspacing='8'>
											<tr>
												<td><label for='name'>院校名称：</label></td>
												<td><input type='text' name='name' id='name' value='$row[collegeName]'disabled></td>
												<td><label for='fenxiao'>分校名称：</label></td>
												<td><input type='text' name='fenxiao' id='fenxiao' value='$row[branCollName]'disabled></td>
											</tr>
											<tr>
												<td><label for='xiaoqu'>所在校区：</label></td>
												<td><input type='text' name='xiaoqu' id='xiaoqu' value='$row[locaCollege]'disabled></td>
												<td><label for='yxdm'>院校代码：</label></td>
												<td><input type='text' name='yxdm' id='yxdm' value='$row[collegeCode]' disabled></td>
											</tr>
											<tr>
												<td><label for='sfdm'>院校所在省份代码：</label></td>
												<td><input type='text' name='sfdm' id='sfdm' value='$row[collPrvCode]' disabled></td>
												<td><label for='bmdm'>院校隶属部门代码：</label></td>
												<td><input type='text' name='bmdm' id='bmdm' value='$row[collDepartCode]' disabled></td>
											</tr>
											<tr>
												<td><label for='szddm'>院校所在地代码：</label></td>
												<td><input type='text' name='szddm' id='szddm' value='$row[locaCollCode]'disabled></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				";
			}
		}
        
		
        // $str_update='
		// update scitcInfo 
		// set collegeName = '$name' ,
		// branCollName = '$fenxiao' ,
		// locaCollege = '$xiaoqu' ,
		// collegeCode = '$yxdm' ,
		// collPrvCode = '$sfdm' ,
		// collDepartCode = '$bmdm' ,
		// locaCollCode = '$szddm'
        // ';
        // $mysqli->query($str_update); 
        
        
		$mysqli->close();      
		?>
		<script src='../js/jquery-3.5.1.js'></script>
		<script src='../js/edit.js'></script>
	</body>
	</html>
	