<?php
    include "header.php";
    include "slider.php";
    include "class/user_class.php";
?>
<?php
    $thongtin = new thongtin;
    $show_user = $thongtin -> show_user();

?>

<style>
.Sua {
    display: inline;
    margin: 10px 1px 10px 10px;
    height: 30px;
    width: 50px;
    cursor: pointer;
    background-color: #00AA00;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
.Sua:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;
    
}
.Xoa {
    display: inline;
    margin: 10px 10px 10px 1px;
    height: 30px;
    width: 50px;
    cursor: pointer;
    background-color: #CC0000;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
.Xoa:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;
    
}
</style>

        <div class="admin-content-right">
            <div class="admin-content-right-cartegory_list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Quyền</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                        if($show_user){$i=0;
                            while($result = $show_user->fetch_assoc()){$i++;
                        
                    ?>
                    <tr>
                        <td> <?php echo $i ?> </td>
                        <td> <?php echo $result['id'] ?> </td>
                        <td> <?php echo $result['name'] ?> </td>
                        <td> <?php echo $result['address'] ?> </td>
                        <td> <?php echo $result['phonenumber'] ?> </td>
                        <td> <?php echo $result['email'] ?> </td>
                        <td> <?php echo $result['user'] ?> </td>
                        <td> <?php echo $result['pass'] ?> </td>
                        <td> <?php echo $result['role'] ?> </td>
                        <td><a href="userEdit.php?id=<?php echo $result['id'] ?>"><button class="Sua">Sửa</button></a><a href="userDelete.php?id=<?php echo $result['id'] ?>"><button class="Xoa">Xóa</button></a></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>