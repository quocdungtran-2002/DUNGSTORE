<?php
    include "header.php";
    include "slider.php";
    include "class/user_class.php";
?>
<?php
    $thongtin = new thongtin;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
        $insert_user = $thongtin -> insert_user($name,$address,$phonenumber,$email,$user,$pass,$role);
    }
?>
<style>
    input{
        height: 30px;
        width: 200px;
        margin: 20px 0 20px 0;
    }
    button{
    display: block;
    margin-top: 10px;
    height: 30px;
    width: 100px;
    cursor: pointer;
    background-color: brown;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
button:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;
}
</style>

<div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Thêm tài khoản</h1>
                <form action="" method="POST">
                    <label for="">Họ và tên </label><br>
                    <input required  name="name" type="text" placeholder="Họ và tên"><br>
                    <label for="">Địa chỉ</label><br>
                    <input required name="address" type="text" placeholder="Đại chỉ"><br>
                    <label  for="">Số điện thoại</label><br>
                    <input required name="phonenumber" type="number" placeholder="Số điện thoại"><br>
                    <label for="">Email</label><br>
                    <input required name="email" type="email" placeholder="Email"><br>
                    <label for="">Tên tài khoản <span style="color:red;">*</span></label><br>
                    <input required  name="user" type="text" placeholder="Tên tài khoản"><br>
                    <label for="">Mật khẩu<span style="color:red;">*</span></label><br>
                    <input required  name="pass" type="text" placeholder="Mật khẩu"><br>
                    <label for="">Loại quyền <span style="color:red;">*</span></label><br>
                    <input required  name="role" type="text" placeholder="Loại quyền">
                    <label for="">1:admin &nbsp &nbsp 2:nhân viên &nbsp &nbsp 3:khách hàng</label>
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>