<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/StudentRevise.css">
</head>
<body>
    <?php
    include_once('../conn.php');
    $password=@$_POST['password'];
    $newpwd=@$_POST['newpwd'];
    $confirm=@$_POST['confirm'];

    $mysqli->query('use scitcms');

    $str_sql="select * from login";

    $result = $mysqli->query($str_sql);

    $array_rows = $result->fetch_assoc();

    if(isset($newpwd)){
        if($newpwd == $confirm){
            $str_update="
            update login set password = $newpwd 
            where id =  and spassword = $password
            ";
            $mysqli->query($str_update); 
            echo "<script>
            alert('修改成功');
            window.open('StudentRevise.html','main');
            </script>";
        }else{
            echo "<script>
            alert('新密码与确认密码不同，请重新输入！');
            </script>";
        }
    }


    $result->free_result(); 
    $mysqli->close();      
    ?>
</body>
</html>