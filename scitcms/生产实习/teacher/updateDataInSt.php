<?php
    include_once('../conn.php');
    header('Connect-Type:text/html;Charset=utf-8');
    $mysqli->query('use scitcms');
    $stid=@$_POST['stid'];
    $name=@$_POST['name'];
    $sex=@$_POST['sex'];
    $face=@$_POST['face'];
    $birthday=@$_POST['birthday'];
    $id=@$_POST['id'];
    $nation=@$_POST['nation'];
    $isOne=@$_POST['isOne'];
    $phone=@$_POST['phone'];
    $qq=@$_POST['qq'];
    $email =@$_POST['email'];
    $fname=@$_POST['fname'];
    $fphone=@$_POST['fphone'];


    $str="
    update studentInfo
    set sname = '$name',
    sex = '$sex',
    face = '$face' ,
    birthday = '$birthday',
    sidentityId = '$id',
    nation =' $nation',
    isOne = '$isOne',
    phone = '$phone',
    qq = '$qq',
    email = '$email',
    coachName = '$fname',
    coachPhone = '$fphone'
    where stId = '$stid'
    ";
    $result = $mysqli->query($str);
    if($result){
        $rows = $mysqli->affected_rows;
        if($rows){
            echo "<script>
            alert('更新成功。');
            window.open('studentInfo.php','main');
            </script>";
        }else{
            echo "更新失败。<br>";
            
        }
    }else{
        echo "sql语句有误".$mysqli->error."<br>";
    }
    
    $mysqli->close();
?>