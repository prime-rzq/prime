<?php
    include_once('../conn.php');
    $name=$_POST['name'];
    $id=$_POST['id'];     
    $sex=$_POST['sex'];
    $politics=$_POST['politics'];
    $birthday=$_POST['birthday'];
    $idNumber=$_POST['idNumber'];
    $national_name=$_POST['national_name'];
    $child=$_POST['child'];
    $phone=$_POST['phone'];
    $qq=$_POST['qq'];
    $email =$_POST['email'];
    $fudaoyuan=$_POST['fudaoyuan'];
    $fphone=$_POST['fphone'];

    echo $fphone;
   
    $mysqli->query('use scitcms');

    $str_update = "
    update studentInfo 
    set sname = '$name',
    stId = '$id',
    sex = '$sex',
    face = '$politics',
    birthday = '$birthday',
    sidentityId = '$idNumber',
    nation = '$national_name',
    isOne = '$child',
    phone = '$phone',
    qq = '$qq',
    email = '$email',
    coachName = '$fudaoyuan',
    coachPhone = '$fphone'
    where stid = '$id'
    ";
    echo $str_update;
    $result = $mysqli->query($str_update); 
    if($result){
        echo '成功';
    }else{
        echo $mysqli->error;
    }

    $mysqli->close();    
?>