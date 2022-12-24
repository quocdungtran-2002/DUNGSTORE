<?php
    include "admin/class/signup_class.php";
?>


<?php 
    $signup = new signup;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name = $_POST['name'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        
        $insert_info = $signup -> insert_info($name,$user,$pass,$phonenumber,$address,$email,$role);

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIGN UP</title>
</head>
<style>
    html{
        /* background-color: #8ee5ee; */
        background-image: url('assets/img/th.jfif');
        background-size: cover;
        background-repeat: repeat;
    }
    .form-input{
        height: 30px;
        width: 350px;
        margin: 20px 0 20px 0;
    }
    .wrapper{
        text-align: center;
        padding: 30px;
    }
    h1{
        margin-top: 50px;
        margin-bottom: 10px;
        text-align: center;
    }
    .form-group{
        padding-left: 650px;
    }
    #submit{
        margin-top: 20px;
        margin-left: 650px;
        height: 30px;
        width: 350px;
    }

</style>
<body>
    <div id="wrapper">  
        <form action="" id="form-register" method="POST">
            <h1 class="form-heading">SIGN UP</h1>
            <div class="form-group">
                <label class="form-label">Họ tên</label><br>
                <input required type="text" class="form-input" name="name" placeholder="Nhập họ tên">
            </div>
            <div class="form-group">
                <label class="form-label">Tên đăng nhập</label><br>
                <input required type="text" class="form-input" name="user" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group"> 
                <label class="form-label">Mật khẩu</label> <br>         
                <input required type="password" class="form-input" name="pass" placeholder="Nhập mật khẩu">          
            </div>
            <!-- <div class="form-group"> 
                <label class="form-label">Nhập lại mật khẩu</lablel> <br>        
                <input required type="password" class="form-input" placeholder="Nhập lại mật khẩu">          
            </div> -->
            <div class="form-group">
                <label class="form-label">Số điện thoại</label><br>
                <input required type="text" class="form-input" name="phonenumber" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label class="form-label">Địa chỉ</label><br> 
                <input required type="text" class="form-input" name="address" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <lablel class="form-label">Email</label><br>
                <input required type="email" class="form-input" name="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-input" value="3" name="role">
            </div>
            <input id="submit" type="submit" value="SIGN UP" class="form-submit">
        </form>
    </div>
</body>
</html>