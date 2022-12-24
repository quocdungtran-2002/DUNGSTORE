<?php
    include "header.php";
    include "slider.php";
    include "class/user_class.php";
?>
<?php
    $thongtin = new thongtin;
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        // echo"<script>windown.location = 'cartegoryList.php'</script>";
    } else{
        $id = $_GET['id'];
    }
    $GET_user = $thongtin -> GET_user($id);
    if($GET_user){
        $result = $GET_user -> fetch_assoc();
    }
?>

<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
        $update_user = $thongtin -> update_user($name,$address,$phonenumber,$email,$user,$pass,$role,$id);
    }
?>


<style>
input{
        height: 30px;
        width: 200px;
        margin: 10px 0 20px 0;
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
            <h1>Sửa tài khoản</h1>
                <form action="" method="POST">
                    <label for="">Họ và tên </label><br>
                    <input   name="name" type="text" placeholder="Họ và tên" value="<?php echo $result['name'] ?>"><br>
                    <label for="">Địa chỉ</label><br>
                    <input  name="address" type="text" placeholder="Đại chỉ" value="<?php echo $result['address'] ?>"><br>
                    <label  for="">Số điện thoại</label><br>
                    <input required name="phonenumber" type="text" placeholder="Đại chỉ" value="<?php echo $result['phonenumber'] ?>"><br>
                    <label for="">Email</label><br>
                    <input  name="email" type="email" placeholder="Email" value="<?php echo $result['email'] ?>"><br>
                    <label for="">Tên tài khoản <span style="color:red;">*</span></label><br>
                    <input required  name="user" type="text" placeholder="Tên tài khoản" value="<?php echo $result['user'] ?>"><br>
                    <label for="">Mật khẩu<span style="color:red;">*</span></label><br>
                    <input required  name="pass" type="text" placeholder="Mật khẩu" value="<?php echo $result['pass'] ?>"><br>
                    <label for="">Quyền <span style="color:red;">*</span></label><br>
                    <input required  name="role" type="text" placeholder="Loại quyền" value="<?php echo $result['role'] ?>"><br>
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>