<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/StudentGrades.css">
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <div class="content">
                <div class="header clearfix">
                    <div class="top fl">当前位置>成绩查询</div>
                  
                </div>
                <div class="main">
                    <div align="center">
                        <label for="keys">成绩查询：</label>
                        <input type="text" id="keys" name="keys" placeholder="学号">
                        <input type="submit" id="chaxun" name="chaxun" value="查询" style="#698aab;">           
                    </div>
                    <div align="center" style="margin-top:50px">
                        <?php
                            include_once('../conn.php');
                            header('Connect-Type:text/html;Charset=utf-8');

                            $mysqli->query('use scitcms;');

                            $result = $mysqli->query("
                                create table score(
                                stId char(8) primary key,
                                sname char(8) not null,
                                chinese int not null,
                                math int not null,
                                english int not null
                            )");
                    
                            if(isset($_POST['chaxun'])){
                                $key = $_POST['keys'];

                                $str_sql = "select * from score where stId = '$key'";

                                $result = $mysqli->query($str_sql);
                                if($result){
                                    $rows = $result->num_rows;
                                    if($rows > 0){
                                        echo "<table align='center'  cellspacing='0' style='width:600px;'>";
                                        echo "<tr style='line-height:30px;text-align:center;color:white;background:#698aab;'>";
                                        echo "<td>学号</td>";
                                        echo "<td>姓名</td>";
                                        echo "<td>语文</td>";
                                        echo "<td>数学</td>";
                                        echo "<td>英语</td>";
                                        echo "</tr>";
                                        while($array_rows = $result->fetch_assoc()){
                                            echo "<tr style='line-height:30px;text-align:center;background:#dcdddd;'>";
                                            echo "<td>$array_rows[stId]</td>";
                                            echo "<td>$array_rows[sname]</td>";
                                            echo "<td>$array_rows[chinese]</td>";
                                            echo "<td>$array_rows[math]</td>";
                                            echo "<td>$array_rows[english]</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";

                                    }else{
                                        echo "没有你需要的数据。";
                                    }
                                }else{
                                    echo "查询语句有误". $mysqli->error ."<br>";
                                }
                            $result->free_result();
                            $mysqli->close();       
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>