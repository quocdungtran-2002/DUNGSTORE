<?php
    session_start();
    ob_start();
    include "class/connectdb.php";
    include "class/user.php";
    
    
    if((isset($_POST['dangnhap']))&&($_POST['dangnhap'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $role=checkuser($user, $pass);
        $kq=getuserinfo($user, $pass);
        $_SESSION['role']=$role;
        
        if($role==1) {
            header('location: index.php'); 
        }
        else if($role==2) 
        {
            header('location: ../employee/index.php');
        }
        // else header('location:login.php');
        else if($role==3){
            $_SESSION['role']=$role;
            $_SESSION['iduser']=$kq[0]['id'];
            $_SESSION['username']=$kq[0]['user'];
             header('location: ../index.php');
             
        }
        else  {
            header('location:login.php');
            // $txt_erro="Username hoặc Password không tồn tại!"; 
        } 
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Admin</title>
</head>
<style>
    html{
        /* background-color: #8ee5ee; */
        background-image: url('../assets/img/th (1).jfif');
        background-size: cover;
        background-repeat: repeat;
    }
    input{
        height: 30px;
        width: 350px;
        margin: 20px 0 20px 0;
    }
    .login{
        text-align: center;
        padding: 30px;
    }
    h1{
        margin-top: 100px;
        margin-bottom: 10px;
        text-align: center;
    }
    #label1{
        margin-left: -250px;
    }
    #label2{
        margin-left: -280px;
    }
    

</style>
<body>
                <h1>LOGIN</h1>
                <div class="login">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label id="label1" for="">Tên đăng nhập</label><br>
                    <input   name="user" type="text" placeholder="Tên đăng nhập"><br>
                    <label id="label2" for="">Mật khẩu</label><br>
                    <input   name="pass" type="password" placeholder="Mật khẩu"><br>
                    <input   name="dangnhap" type="submit" value= "ĐĂNG NHẬP">
                    <?php
                        // if(isset($txt_erro)&&($txt_erro!="")){
                        //     echo "<font color='red')".$txt_erro."</font>";
                        // }
                    ?>
                </form>
                </div>
</body>
</html>