<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
	<link rel='stylesheet' href='../css/common.css' >
	<link rel='stylesheet' href='../css/school-msg.css'>
	
</head>
<body>
	<script src='../js/jquery-3.5.1.js'></script>
	<script src='../js/edit.js'></script>
	<?php
		include_once('../conn.php');

		$code=@$_POST['code'];
		$enterdate=@$_POST['enterdate'];
		$graduate=@$_POST['graduate'];
		$level=@$_POST['level'];
		$syd=@$_POST['syd'];
		$xueji=@$_POST['xueji'];
		$renzhi=@$_POST['renzhi'];
		$pince=@$_POST['pince'];
		$dangan=@$_POST['dangan'];
		$danwei=@$_POST['danwei'];
		$xueli=@$_POST['xueli'];
		$xuezhi=@$_POST['xuezhi'];
		$major=@$_POST['major'];
		$department=@$_POST['department'];
		$banji=@$_POST['banji'];
		
		$mysqli->query('use scitcms');
		
		$result = $mysqli->query('
			create table statusInfo(
			stId char(8) not null,
			cfeId char(8) not null,
			sname char(8) not null,
			inDate datetime not null,
			outDate datetime not null,
			pollLevel char(8) not null,
			sfrom varchar(30) not null,
			changeStutas char(4) not null,
			position varchar(20),
			evaluate varchar(80) not null,
			recordIn char(4) not null,
			recordFrom varchar(30) not null,
			education char(10) not null,
			edSystem char(10) not null,
			department varchar(20) not null,
			major varchar(20) not null,
			class varchar(20) not null,
			primary key(stId,cfeId)
			)');
		
		$str_sql='select * from statusInfo';
		$result = $mysqli->query($str_sql);
		
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "
				<div class='school-msg'>
					<form action='<?php echo htmlspecialchars($_SERVER[PHP_SELF])?>' method='POST'>
						<div class='pos-set wrap'>
							<span>当前位置>学籍信息</span>
							<p>
								<input type='button' id='edit' value='编辑'>
								<input type='submit' id='keep' value='保存'>
							</p>
						</div>
						<div class='basics-msg'>
							<p>基础信息</p>
						</div>
						<div class='list' align='center'>
							<table class='clearfix' cellspacing='8'>
								<tr>
									<td><label for='code'>考生号码 :</label></td>
									<td><input type='text'id='code' name='code' value='$row[cfeId]' disabled></td>
									<td><label for='enterdate'>入校时间 :</label></td>
									<td><input type='text'id='enterdate' name='enterdate' value='$row[inDate]' disabled></td>
								</tr>
								<tr>
									<td><label for='graduate'>毕业时间 :</label></td>
									<td><input type='text'id='graduate' name='graduate' value='$row[outDate]' disabled></td>
									<td><label for='l'>困难生类别 :</label></td>
									<td><input type='text'id='level' name='level' value='$row[pollLevel]' disabled></td>
								</tr>
								<tr>
									<td><label for='syd'>生源所在地 :</label></td>
									<td><input type='text'id='syd' name='syd' value='$row[sfrom]' disabled></td>
									<td><label for='xueji'>学籍是否变动 :</label></td>
									<td><input type='text'id='xueji' name='xueji' value='$row[changeStutas]' disabled></td>
								</tr>
								<tr>
									<td><label for='renzhi'>在校任职情况 :</label></td>
									<td><input type='text'id='renzhi' name='renzhi' value='$row[position]' disabled></td>
									<td><label for='pince'>综合评测情况 :</label></td>
									<td><input type='text'id='pince' name='pince' value='$row[evaluate]' disabled></td>
								</tr>
								<tr>
									<td><label for='dangan'>档案是否转入学校 :</label></td>
									<td><input type='text'id='dangan' name='dangan' value='$row[recordIn]' disabled></td>
									<td><label for='danwei'>入学前档案所在单位 :</label></td>
									<td><input type='text'id='danwei' name='danwei' value='$row[recordFrom]' disabled></td>
								</tr>
							</table>
						</div>
						<div class='basics-msg'>
							<p>专业信息</p>
						</div>
						<div class='list' align='center'>
							<table class='clearfix' cellspacing='8'>
								<tr>
									<td><label for='xueli'>学历 :</label></td>
									<td><input type='text' id='xueli' name='xueli' value='$row[education]' disabled></td>
									<td><label for='xuezhi'>学制 :</label></td>
									<td><input type='text' id='xuezhi' name='xuezhi' value='$row[edSystem]' disabled></td>
								</tr>
								<tr>
									<td><label for='major'>专业名称 :</label></td>
									<td><input type='text' id='major' name='major' value='$row[major]' disabled></td>
									<td><label for='department'>所在院系 :</label></td>
									<td><input type='text' id='department' name='department' value='$row[department]' disabled></td>
								</tr>
								<tr>
									<td><label for='banji'>所在班级 :</label></td>
									<td><input type='text' id='banji' name='banji' value='$row[class]' disabled></td>
								</tr>
							</table>
						</div>
					</form>
				</div>
				";
			}
		}
		

		$str_update="
		update statusInfo set 
		cfeId = $code and
		inDate = $enterdate and
		outDate = $graduate and
		pollLevel = $level and
		sfrom = $syd and
		changeStutas = $xueji and
		position = $renzhi and
		evaluate = $pince and
		recordIn = $dangan and
		recordFrom = $danwei and
		education = $xueli and
		edSystem = $xuezhi and
		major = $major and
		department = $department and
		class = $banji
		";
		$mysqli->query($str_update); 
		
		$mysqli->close();      
	?>
	<script src='../js/jquery-3.5.1.js'></script>
    <script src='../js/edit.js'></script>
</body>
</html>