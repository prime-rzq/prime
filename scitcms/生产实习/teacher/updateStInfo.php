<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
    <!-- <style>
        label{
            font-size: 17px;
        }
        input{
            color:#686868;
            border:1px solid #cccccc;
            width:140px;
            height:15px;
            padding: 7px 0 6px 10px;
            outline: none;
        }	
    </style> -->
</head>
<body>
    <?php 
    include_once('../conn.php');
    header('Connect-Type:text/html;Charset=utf-8');
    $mysqli->query('use scitcms');
    $stid = $_GET['stid'];
    $str = "select * from studentInfo where stId =$stid";
    $result = $mysqli->query($str);
    if($result){
        $rows = $result->num_rows;
        if($rows){
            echo "<div align='center' class='container'>";
            echo "<div class='content' style='height:70vh;'>";
            echo "<form action='updateDataInSt.php' method='POST'>";
            echo "<table cellspacing='8'>";    
            echo "<caption style='padding-top:30px;'><h2>更新学生信息</h2></caption>";
            $array_rows = $result->fetch_assoc();
            echo "
            <tr>
            <td><label for='stid'>学号：</label></td>
            <td><input type='text' id='stid' name='stid' value='$array_rows[stId]'></td>
            <td><label for='name'>姓名：</label></td>
            <td><input type='text' id='name' name='name' value='$array_rows[sname]'></td>
            </tr>
            <tr>
            <td><label for='sex'>性别：</label></td>
            <td><input type='text' id='sex' name='sex' value='$array_rows[sex]'></td>
            <td><label for='face'>政治面貌：</label></td>
            <td><input type='text' id='face' name='face' value='$array_rows[face]'></td>
            </tr>
            <tr>
            <td><label for='birthday'>出生日期：</label></td>
            <td><input type='text' id='birthday' name='birthday' value='$array_rows[birthday]'></td>
            <td><label for='id'>身份证号：</label></td>
            <td><input type='text' id='id' name='id' value='$array_rows[sidentityId]'></td>
            </tr>
            <tr>
            <td><label for='nation'>民族：</label></td>
            <td><input type='text' id='nation' name='nation' value='$array_rows[nation]'></td>
            <td><label for='isOne'>独生子女：</label></td>
            <td><input type='text' id='isOne' name='isOne' value='$array_rows[isOne]'></td>
            </tr>
            <tr>
            <td><label for='phone'>手机号：</label></td>
            <td><input type='text' id='phone' name='phone' value='$array_rows[phone]'></td>
            <td><label for='qq'>QQ号：</label></td>
            <td><input type='text' id='qq' name='qq' value='$array_rows[qq]'></td>
            </tr>
            <tr>
            <td><label for='email'>电子邮箱：</label></td>
            <td><input type='text' id='email' name='email' value='$array_rows[email]'></td>
            <td><label for='fname'>辅导员姓名：</label></td>
            <td><input type='text' id='fname' name='fname' value='$array_rows[coachName]'></td>
            </tr>
            <tr>
            <td><label for='fphone'>辅导员电话：</label></td>
            <td><input type='text' id='fphone' name='fphone' value='$array_rows[coachPhone]'></td>
            </tr>";
            
            echo "<tr><td colspan='4' align='center'><input type='submit' value='更新' style='width: 80px;margin-top: 20px;'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    }
    
	$mysqli->close();
    ?>
</body>
</html>