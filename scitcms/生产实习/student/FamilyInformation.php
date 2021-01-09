<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Title</title>
    <link rel='stylesheet' href='../css/common.css'>
    <link rel='stylesheet' href='../css/FamilyInformation.css'>
</head>
<body>
    <?php
        include_once('../conn.php');
        
        // $name=@$_POST['name'];
        // $tel=@$_POST['tel'];
        // $relationship=@$_POST['relationship'];
        // $Zipcode=@$_POST['Zipcode'];
        // $level=@$_POST['level'];
        // $code=@$_POST['code'];
        // $pliceAddress=@$_POST['pliceAddress'];
        // $address=@$_POST['address'];

        $mysqli->query('use scitcms');
        
        $str_cre_fam = '
        create table familyInfo(
        stId char(8) primary key,
        sname char(8) not null,
        parentName char(8) not null,
        phone varchar(30) not null,
        relation varchar(30) not null,
        postal varchar(30) not null,
        poolevel char(4) not null,
        forcode varchar(30) not null,
        polcadd varchar(30) not null,
        homeadd varchar(30) not null)
        ';
        $result = $mysqli->query($str_cre_fam);
        
        $str_sql='select * from familyInfo';
        $result = $mysqli->query($str_sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                <div class='container'>
                    <form action='<?php echo htmlspecialchars($_SERVER[PHP_SELF])?>' method='POST'>
                        <div class='content'>
                            <div class='header clearfix'>
                                <div class='top fl'>当前位置>家庭信息</div>
                                <div class='bottom fr'>
                                    <input type='button' id='edit' value='编辑'>
                                    <input type='submit' id='keep' value='保存'>
                                </div>
                            </div>
                            <div class='main'>
            
                                <div>
                                    <div class='title'>
                                        父母联系方式
                                    </div>
                                </div>
                                <div align='center' cellspacing='8'>
                                    <table cellspacing='8'>
                                        <tr>
                                            <td><label for='name'>姓名：</label></td>
                                            <td><input type='text' name='name' id='name' value='$row[parentName]' disabled></td>
                                            <td><label for='tel'>电话号码：</label></td>
                                            <td><input type='text' name='tel' id='tel' value='$row[phone]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='relationship'>关系：</label></td>
                                            <td>
                                                <input type='text' name='relationship' id='relationship' list='content' value='$row[relation]' disabled>
                                                <datalist id='content'>
                                                    <option value='父子'>父子</option>
                                                    <option value='父女'>父女</option>
                                                    <option value='母女'>母女</option>
                                                    <option value='母子'>母子</option>
                                                </datalist>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <div>
                                    <div class='title'>
                                        户口信息
                                    </div>
                                </div>
                                <div align='center'>
                                    <table cellspacing='8'>
                                        <tr>
                                            <td><label for='Zipcode'>邮政编码：</label></td>
                                            <td><input type='text' name='Zipcode' id='Zipcode' value='$row[postal]' disabled></td>
                                            <td><label for='level'>贫困等级：</label></td>
                                            <td>
                                                <input type='text' name='level' id='level' list='level' value='$row[poolevel]' disabled>
                                                <datalist>
                                                    <option value='一般'>一般</option>
                                                    <option value='特困'>特困</option>
                                                </datalist>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for='code'>代码编号：</label></td>
                                            <td><input type='text' name='code' id='code' value='$row[forcode]' disabled></td>
                                            <td><label for='pliceAddress'>派出所地址：</label></td>
                                            <td><input type='text' name='pliceAddress' id='pliceAddress' value='$row[polcadd]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='address'>家庭地址：</label></td>
                                            <td><input type='text' name='address' id='address' value='$row[homeadd]' disabled></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                ";
            }
        }   
        // $str_update="
        // update familyInfo 
        // set parentName = '$name' ,
        // phone= '$tel' ,
        // relation= '$relationship ',
        // postal= '$Zipcode' ,
        // poolevel= '$level' ,
        // forcode= '$code' ,
        // polcadd= '$pliceAddress',
        // homeadd= '$address'
        // where 
        // ";
        // $mysqli->query($str_update); 

        $mysqli->close();   
    ?>
    <script src='../js/jquery-3.5.1.js'></script>
    <script src='../js/edit.js'></script>
</body>
</html>