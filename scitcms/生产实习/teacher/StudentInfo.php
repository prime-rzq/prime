<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container .content .information-title{
        width: 100%;
        font-size: 16px;
        height: 75px;
        line-height: 75px;
        margin-left:30px;
        position: relative;
        color:#666;
    }
    .fr{
        float: right;
    }
    .btn{
        text-decoration: none;
        color: white;
        background: #177ec1;
        display: block;
        width: 100px;
        height: 20px;
        line-height: 20px;
        text-align: center;  
        border: 1px solid black;
        border-radius: 8px;
    }

    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="content">
                <div class="information-title">
                    <span>当前位置>学生信息</span>
                </div>
                <div class='fr'>
                    <a href="addStInfo.html" class="btn">添加学生信息</a>
                </div>
                <div style="margin-top:80px">
                <?php
                    include_once('../conn.php');
                    header('Connect-Type:text/html;Charset=utf-8');

                    $mysqli->query('use scitcms;');

                    $str_sql = "select * from studentInfo";

                    $result = $mysqli->query($str_sql);
                    // print_r($result);
                    if($result){
                        $rows = $result->num_rows;
                        if($rows > 0){
                            echo "<table align='center' border='1' cellspadding='0' cellspacing='0' bordercolor='white' >";
                            echo "<colgroup>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "<col widht='40px'>";
                            echo "</colgroup>";
                            echo "<tr style='line-height:30px;text-align:center;background:#84a2d4;'>";
                            echo "<td>学号</td>";
                            echo "<td>姓名</td>";
                            echo "<td>性别</td>";
                            echo "<td>政治面貌</td>";
                            echo "<td>出生日期</td>";
                            echo "<td>身份证号</td>";
                            echo "<td>民族</td>";
                            echo "<td>独生子女</td>";
                            echo "<td>手机号</td>";
                            echo "<td>QQ号</td>";
                            echo "<td>电子邮箱</td>";
                            echo "<td>辅导员姓名</td>";
                            echo "<td>辅导员电话</td>";
                            echo "<td colspan='2'>编辑</td>";
                            echo "</tr>";
                            while($array_rows = $result->fetch_assoc()){
                                echo "<tr style='line-height:30px;text-align:center;background:#dcdddd;border-top:#ebf6f7;'>";
                                echo "<td>$array_rows[stId]</td>";
                                echo "<td>$array_rows[sname]</td>";
                                echo "<td>$array_rows[sex]</td>";
                                echo "<td>$array_rows[face]</td>";
                                echo "<td>$array_rows[birthday]</td>";
                                echo "<td>$array_rows[sidentityId]</td>";
                                echo "<td>$array_rows[nation]</td>";
                                echo "<td>$array_rows[isOne]</td>";
                                echo "<td>$array_rows[phone]</td>";
                                echo "<td>$array_rows[qq]</td>";
                                echo "<td>$array_rows[email]</td>";
                                echo "<td>$array_rows[coachName]</td>";
                                echo "<td>$array_rows[coachPhone]</td>";
                                echo "<td><a href='updateStInfo.php?stid=$array_rows[stId]' target='main' style='text-decoration: none;color:black;'>更新</a></td>";
                                echo "<td><a href='deleteStInfo.php?stid=$array_rows[stId]' target='main' style='text-decoration: none;color:black;'>删除</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";

                        }else{
                            echo "没有你需要的数据。";
                        }
                    }
                      

                    $mysqli->close();       
                    
                ?>
                </div> 
            </div>
        </form>
    </div>
</body>
</html>