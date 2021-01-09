<?php
    include_once('../conn.php');
    header('Connect-Type:text/html;Charset=utf-8');

    $stid = $_POST['stid'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $face = $_POST['face'];
    $birthday = $_POST['birthday'];
    $id = $_POST['id'];
    $isOne = $_POST['isOne'];
    $nation  = $_POST['nation'];
    $phone = $_POST['phone'];
    $qq = $_POST['qq'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $fphone = $_POST['fphone'];
    
    $mysqli->query('use scitcms;');

    $str_insert = "
    insert into studentInfo(stId,sname,sex,face,birthday,sidentityId,nation,isOne,
    phone,qq,email,coachName,coachPhone)
    values('$stid','$name','$sex','$face','$birthday','$id','$nation','$isOne','$phone',
    '$qq','$email','$fname','$fphone')
    ";
    $mysqli->query($str_insert);
    $row = $mysqli->affected_rows;
    if($row == 1){
        echo "<script>
        alert('添加成功。');
        window.open('Studentinfo.php','main');
        </script>";
    }else{
        echo "添加失败。<br>".$mysqli->error;
    }

    $mysqli->close();
?>