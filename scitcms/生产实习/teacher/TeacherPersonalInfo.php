<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/TeacherPersonalInfo.css">
</head>
<body>
    
    <?PHP
        include_once('../conn.php');
        
        $name=@$_POST['name'];
        $id=@$_POST['id'];
        $sex=@$_POST['sex'];
        $birthday=@$_POST['birthday'];
        $face=@$_POST['face'];
        $identityId=@$_POST['identityId'];
        $level=@$_POST['level'];
        $phone=@$_POST['phone'];
        $qq=@$_POST['qq'];
        $email =@$_POST['email'];
        $address=@$_POST['address'];
        
        $mysqli->query('use scitcms');

        $str_sql='select * from teacherInfo';
        $result = $mysqli->query($str_sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                <div class='container'>
                    <form action='<?php echo htmlspecialchars($_SERVER[PHP_SELF])?>' method='POST'>
                        <div class='content'>
                            <div class='bx'>
                                <div class='box'>
                                    <div class='top'>
                                        <div class='left'>当前位置>个人信息</div>
                                        <div class='right'>
                                            <span id='edit' class='l' style='margin-right: 20px'>编辑</span>
                                            <span id='keep' class='r'>保存</span>
                                        </div>
                                    </div>
                                    <div class='content'>
                                        <div class='main'>
                                            <i class='column'></i>
                                            <span class='title'>基础信息</span>
                                        </div>
                                    </div>
                                    <div class='bottom' align='center'>
                                        <table cellspacing='8'>
                                            <tr>
                                                <td><label for='name'>姓名：</label></td>
                                                <td><input type='text' id='name' name='name' value='$row[tname]' disabled></td>
                                                <td><label for='id'>工号：</label></td>
                                                <td><input type='text' id='id' name='id' value='$row[teId]' disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label for='sex'>性别：</label></td>
                                                <td><input type='text' id='sex' name='sex' value='$row[sex]' disabled></td>
                                                <td><label for='nation'>民族：</label></td>
                                                <td><input type='text' id='nation' name='nation' value='$row[nation]' disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label for='birthday'>出生日期：</label></td>
                                                <td><input type='text' id='birthday' name='birthday' value='$row[birthday]' disabled></td>
                                                <td><label for='face'>政治面貌：</label></td>
                                                <td>
                                                    <input type='text' id='face' name='face' value='$row[face]' list='politics' disabled>
                                                    <datalist id='politics'>
                                                        <option value='中共党员'>中共党员</option>
                                                        <option value='中共预备党员'>中共预备党员</option>
                                                        <option value='群众'>群众</option>
                                                        <option value='无党派人士'>无党派人士</option>
                                                    </datalist>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for='identityId'>身份证号：</label></td>
                                                <td><input type='text' id='identityId' name='identityId' value='$row[tidentityId]' disabled></td>
                                                <td><label for='level'>教师等级</label></td>
                                                <td>
                                                    <input type='text' id='level' name='level' value='$row[teaLevel]' list='le' disabled>
                                                    <datalist id='le'>
                                                        <option value='讲师'>讲师</option>
                                                        <option value='高工'>高工</option>
                                                        <option value='副教授'>副教授</option>
                                                        <option value='教授'>教授</option>
                                                    </datalist>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for='phone'>手机号：</label></td>
                                                <td><input type='text' id='phone' name='phone' value='$row[phone]' disabled></td>
                                                <td><label for='qq'>QQ号：</label></td>
                                                <td><input type='text' id='qq' name='qq' value='$row[qq]' disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label for='email'>电子邮箱：</label></td>
                                                <td><input type='text' id='email' name='email' value='$row[email]' disabled></td>
                                                <td><label for='address'>家庭地址：</label></td>
                                                <td><input type='text' id='address' name='address' value='$row[homeAddress]' disabled></td>
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
        $mysqli->close();
    ?>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/edit.js"></script>
</body>
</html>