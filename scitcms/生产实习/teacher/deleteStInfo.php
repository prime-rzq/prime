<?php
    include_once('../conn.php');
    header('Connect-Type:text/html;Charset=utf-8');

    $mysqli->query('use scitcms;');
    $stid = $_GET['stid'];
    $sql_str="delete from studentInfo where stId = $stid";
    $result = $mysqli->query($sql_str);
    if($result){
        $rows = $mysqli->affected_rows;
        if($rows){
            echo "<script>
            alert('删除成功。');
            window.open('studentInfo.php','main');
            </script>";
            
        }else{
            echo "删除失败。<br>";
        }
    }
    $mysqli->close();
?>