<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Title</title>
    <link rel='stylesheet' href='../css/common.css'>
    <link rel='stylesheet' href='../css/student.css'>
</head>
<body>
    <?php
        include_once('../conn.php');
        
        $mysqli->query('use scitcms');

        $str_sql='select * from studentInfo';
        $result = $mysqli->query($str_sql);
        
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
                echo "
                <div class='container'>
                    <form action='' method='POST'>
                        <div class='content'>
                            <div class='header clearfix'>
                                <div class='top fl'>当前位置>个人信息</div>
                                <div class='bottom fr'>
                                <input type='button' id='edit' value='编辑'>
                                <button type='submit' id='keep'>保存</button>
                                </div>
                            </div>
                            <div class='main'>
                                <div class='BasicInformation'>
                                    <div class='title'>
                                    基础信息
                                    </div>
                                </div>
                                <div class='content clearfix' align='center'>
                                    <table cellspacing='8'>
                                        <tr>
                                            <td><label for='name'>姓名：</label></td>
                                            <td><input type='text' id='name' name='name' value='$row[sname]' disabled></td>
                                            <td><label for='id'>学号：</label></td>
                                            <td><input type='text' id='id' name='id' value='$row[stId]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='sex'>性别：</label></td>
                                            <td><input type='text' id='sex' name='sex' value='$row[sex]' disabled></td>
                                            <td><label for='politics'>政治面貌：</label></td>
                                            <td>
                                                <input type='text' id='politics' name='politics' list='zhengzhi' value='$row[face]' disabled>
                                                <datalist id='zhengzhi'>
                                                    <option value='中共党员'>中共党员</option>
                                                    <option value='中共预备党员'>中共预备党员</option>
                                                    <option value='共青团员'>共青团员</option>
                                                    <option value='群众'>群众</option>
                                                    <option value='无党派人士'>无党派人士</option>
                                                </datalist>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for='birthday'>出生日期：</label></td>
                                            <td><input id='birthday' name='birthday' type='text' value='$row[birthday]' disabled></td>
                                            <td><label for='idNumber'>身份证号：</label></td>
                                            <td><input id='idNumber' name='idNumber' class='id oInp' type='text'  value='$row[sidentityId]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='national_name'>民族：</label></td>
                                            <td><input id='national_name' name='national_name' type='text'  value='$row[nation]' disabled></td>
                                            <td><label for='child'>独生子女：</label></td>
                                            <td>
                                                <input type='text' id='child' name='child' list='zinv'  value='$row[isOne]' disabled>
                                                <datalist id='zinv'>
                                                    <option value='是'>是</option>
                                                    <option value='否'>否</option>
                                                </datalist>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class='BasicInformation'>
                                    <div class='title'>联系方式</div>
                                </div>
                                <div class='content clearfix' align='center'>
                                    <table cellspacing='8'>
                                        <tr>
                                            <td><label for='phone'>手机号码：</label></td>
                                            <td><input id='phone' name='phone' type='text' value='$row[phone]' disabled></td>
                                            <td><label for='qq'>QQ号码：</label></td>
                                            <td><input id='qq' name='qq' type='text' value='$row[qq]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='email'>电子邮箱：</label></td>
                                            <td><input id='email' name='email' type='text' value='$row[email]' disabled></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class='BasicInformation'>
                                    <div class='title'>
                                    辅导员信息
                                    </div>
                                </div>
                                <div class='content clearfix' align='center'>
                                    <table cellspacing='8'>
                                        <tr>
                                            <td><label for='fudaoyuan'>姓名：</label></td>
                                            <td><input type='text' id='fudaoyuan' name='fudaoyuan' value='$row[coachName]' disabled></td>
                                            <td><label for='fphone'>电话号码：</label></td>
                                            <td><input type='text' id='fphone' name='fphone' value='$row[coachPhone]' disabled></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                ";
            
        }  
        $mysqli->close();      
    ?>
    <script src='../js/jquery-3.5.1.js'></script>
    <script src='../js/edit.js'></script>
</body>
</html>