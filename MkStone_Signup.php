  <?php

    $server="localhost";//主机
    $db_username="root";//你的数据库用户名
    $db_password="";//你的数据库密码

    $con = mysql_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect".mysql_error());//如果链接失败输出错误
    }
    
    mysql_select_db('mkstone',$con);//选择数据库（我的是test）

?><?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }//检测是否有submit操作 

include('MkStone_Connect.php');//链接数据库
    $name = $_POST['username'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值

    if ($name && $passowrd){//如果用户名和密码都不为空
             $sql = "select * from stone where usename = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
             $result = mysql_query($sql);//执行sql
             $rows=mysql_num_rows($result);//返回一个数值
             if($rows){//0 false 1 true
                   header("refresh:0;url=index.html");//如果成功跳转至welcome.html页面
                   exit;
             }else{
             
                echo "
                    <script>
                            alert('用户名或者密码错误');location.href='login_register.html'
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }
             

    }
    mysql_close();//关闭数据库
?>
MkStone_login.phpMkStone_login.php
