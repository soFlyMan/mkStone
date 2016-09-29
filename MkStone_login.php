<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }//检测是否有submit操作 


    include('MkStone_Connect.php');//链接数据库
    $name = $_POST['username'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值

    if ($name && $passowrd){//如果用户名和密码都不为空
             $sql = "select * from user where usename = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
             $result = mysql_query($sql);//执行sql
             $rows=mysql_num_rows($result);//返回一个数值
             if($rows){//0 false 1 true
                   header("refresh:0;url=index.html");//如果成功跳转至index.html页面
                   exit;
             }else{
            
                echo "
                    <script>
                         out.print("<script>alert('登陆失败!!');location.href='login_register.html'</script>")   
                    </script>

                ";
             }
             

    }else{
                echo "<script>
                         out.print("<script>alert('用户名或者密码没有填写!!');location.href='login_register.html'</script>") </script>";
                

                          
   }

    mysql_close();//关闭数据库
?>
