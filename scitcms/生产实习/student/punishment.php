<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Title</title>
    <link rel='stylesheet' href='../css/common.css'>
    <link rel='stylesheet' href='../css/punishment.css'>
</head>
<body>
    <?php
        include_once('../conn.php');

        $level=@$_POST['level'];
        $cfdate=@$_POST['cfdate'];
        $cfname=@$_POST['cfname'];
        $jinbanren=@$_POST['jinbanren'];
        $reason=@$_POST['reason'];

        $mysqli->query('use scitcms');
        
        $result = $mysqli->query('
        create table punishment(
            stId char(8) primary key,
            sname char(8) not null,
            punLevel char(8) not null,
            punDate datetime not null,
            punName char(10) not null,
            punReson varchar(80) not null,
            dealtName char(8) not null
            )');
       
        
        $str_sql='select * from punishment';
        $result = $mysqli->query($str_sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                <div class='container'>
                    <form action='<?php echo htmlspecialchars($_SERVER[PHP_SELF])?>' method='POST'>
                        <div class='content'>
                            <div class='header clearfix'>
                                <div class='top fl'>当前位置>处分信息</div>
                                <div class='bottom fr'>
                                    <input type='button' id='edit' value='编辑'>
                                    <input type='submit' id='keep' value='保存'>
                                </div>
                            </div>
                            <div class='main'>
                                <!--基础信息-->
                                <div>
                                    <div class='title'>基础信息</div>
                                </div>
                                <div class='content clearfix' align='center'>
                                    <table cellspacing='8'>
                                        <tr>
                                            <td><label for='level'>处分等级：</label></td>
                                            <td><input type='text' id='level' name='level' value='$row[punLevel]' disabled></td>
                                            <td><label for='cfdate'>处分日期：</label></td>
                                            <td><input type='text' id='cfdate' name='cfdate' value='$row[punDate]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='cfname'>处分名称：</label></td>
                                            <td><input type='text' id='cfname' name='cfname' value='$row[punName]' disabled></td>
                                            <td><label for='jinbanren'>经办人姓名：</label></td>
                                            <td><input type='text' id='jinbanren' name='jinbanren' value='$row[dealtName]' disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for='reason'>处分理由：</label></td>
                                            <td colspan='3'><textarea id='reason' name='reason' rows='10' cols='55' value='' disabled></textarea></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <script src='../js/jquery-3.5.1.js'></script>
                <script src='../js/edit.js'></script>
                <script>
                    $('#edit').click(function(){
                        $('textarea').removeAttr('disabled');
                    })
                    $('#keep').click(function(){
                        $('textarea').attr('disabled','disabled');
                    })
                    $('textarea').val($row[punReson]);
                </script>
                ";
            }
         }
        
        $str_update="
        update punishment
        set 
        punLevel = $level ,
        punDate = $cfdate ,
        punName = $cfname ,
        dealtName = $jinbanren ,
        punReson = $reason
        ";
        $mysqli->query($str_update); 
		$mysqli->close();      
        ?>
</body>
</html>