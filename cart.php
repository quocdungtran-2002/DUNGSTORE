<?php
session_start();    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dungstore";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm kết nối
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>



<?php
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOPPING CART</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: #000;
    outline: none;
}
h1{
    text-align:center;
}
    th ,tr ,td{
    border: 1px solid #000;
    
}
.admin-content-right-cartegory_list table{
    width: 100%;
    text-align: center;
    margin-top: 20px;
}
table{
    border-collapse: collapse;
}
hr{
    margin-top:200px;
}
.info{
    margin-left: 100px;  
    width: 500px;
}
#update{
    margin-left: 1430px;
}
img{
    max-width: 60px;
     max-height:60px;   
}
.ttdh table, h3{
    width: 30%;
    margin-left: 10px;
}
.info{
    height: 30px;
    padding: 10px;
    margin: 10px;
}
.table{
    border: none;
    font-size: 18px;
    padding: 10px;
}
.table1{
    padding: 10px;
    font-size: 18px;    
}
</style>
<body >
        <div class="admin-content-right">
            <div class="admin-content-right-cartegory_list">
                <a href="index.php">Trang chủ</a>
                <h1>SHOPPING CART</h1>
                    <?php 
                    if(isset($_SESSION['username'])){
                        $username= $_SESSION['username'];
                        $sql = "SELECT* FROM tbl_user WHERE user = '$username'";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result)){
                    if((isset($_SESSION['giohang']))&&(count($_SESSION['giohang'])>0)){
                        // echo var_dump($_SESSION['giohang']);exit;
                    echo'
                        <table class="table1">
                            <tr class="table1">
                                <th class="table1">STT</th>
                                <th class="table1">Tên sản phẩm</th>
                                <th class="table1">Ảnh sản phẩm</th>
                                <th class="table1">Giá sản phẩm</th>
                                <th class="table1">Số lượng</th>
                                <th class="table1">Thành tiền</th>
                                <th class="table1">Tùy biến</th>
                            </tr>';
                        $i=0;
                        $tong=0;  
                          
                        foreach($_SESSION['giohang'] as $item){
                            $tt=(int)$item[3]* (int)$item[4];
                            
                            $tong+=$tt;
                        echo'
                        <tr class="table1">
                            <td class="table1">'.($i+1).'</td>
                            <td class="table1">'.$item[1].'</td>
                            <td class="table1"><img src="admin/uploads/'.$item[2].'" alt=""></td>
                            <td class="table1">'.$item[3].' '." VND".'</td>
                            <td class="table1">'.$item[4].'</td> 
                            <td class="table1">'.$tt.' '." VND".'</td>
                            <td class="table1"><a href="product.php?act=delcart&i='.$i.'">Xóa</a></td>
                        </tr>';
                        $i++;
                        }
                    echo '
                        <tr class="table1">
                            <td class="table1" style="text-align: right; padding-right: 10px;" colspan=5>Tổng tiền:</td>
                            <td class="table1">'.$tong.' '." VND".'</td>
                            <td class="table1"></td>
                        </tr>    
                    ';
                    echo
                        '</table>'; 
                    
                    echo'
                    <br>
                    <a href="product.php">Tiếp tục mua sắm</a>  |  <a href="product.php?act=delcart">Xóa giỏ hàng</a>
            </div><br><br><br>
            <div class="ttdh">
                <h3>THÔNG TIN ĐẶT HÀNG</h3><br>
                <form action="product.php?act=thanhtoan" method="POST">
                    <input type="hidden" name="user_id" value="'.$row['id'].'">
                    <input type="hidden" name="tongdonhang" value="<?=$tong?>">
                <table>
                    <tr class="table">
                        <td class="table">Họ tên:<input class="info" type="hidden" name="hoten" placeholder="Nhập họ tên" value="'.$row['name'].'">
                            <lable >'.$row['name'].'</lable>
                        </td>     
                    </tr>
                    <tr class="table">
                        <td class="table">Địa chỉ:<input class="info" type="hidden" name="address" placeholder="Nhập địa chỉ" value="'.$row['address'].'">
                            <lable >'.$row['address'].'</lable>
                        </td>
                    </tr>
                    <tr class="table">
                        <td class="table">Email:<input class="info" type="hidden" name="email" placeholder="Nhập email" value="'.$row['email'].'">
                        <lable >'.$row['email'].'</lable>
                        </td>
                    </tr>
                    <tr class="table">
                        <td class="table"> Số điện thoại:<input class="info" type="hidden" name="phone" placeholder="Nhập số điện thoại" value="'.$row['phonenumber'].'">
                            <lable >'.$row['phonenumber'].'</lable>
                        </td>
                    </tr>
                    <tr class="table">
                        <td class="table">Phương thức thanh toán: <br>
                            <input type="radio" name="pttt" value="1"> Thanh toán khi nhận hàng <br>
                            <input type="radio" name="pttt" value="2"> Thanh toán chuyển khoản <br>
                        </td>
                    </tr>
                    <tr class="table">
                        <td class="table"><input type="submit" value="Thanh toán" name="thanhtoan"></td>
                    </tr>
                    <input type="hidden" value="'.$tong.'" name="total">
                </table>
                </form>';
                }
                    else{
                        echo'
                        <div style="font-size: 50px; text-align: center;padding: 250px;">
                         Giỏ hàng trống
                         </div>'
                    ;}}}else{
                    
                    if((isset($_SESSION['giohang']))&&(count($_SESSION['giohang'])>0)){
                        // echo var_dump($_SESSION['giohang']);exit;
                    echo'
                        <table>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Tùy biến</th>
                            </tr>';
                        $i=0;
                        $tong=0;    
                        foreach($_SESSION['giohang'] as $item){
                            $tt=(int)$item[3]* (int)$item[4];
                            $tong+=$tt;
                        echo'
                        <tr>
                            <td>'.($i+1).'</td>
                            <td>'.$item[1].'</td>
                            <td><img src="admin/uploads/'.$item[2].'" alt=""></td>
                            <td>'.$item[3].' '." VND".'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$tt.' '." VND".'</td>
                            <td><a href="product.php?act=delcart&i='.$i.'">Xóa</a></td>
                        </tr>';
                        $i++;
                        }
                    echo '
                        <tr>
                            <td style="text-align: right; padding-right: 10px;" colspan=5>Tổng tiền:</td>
                            <td>'.$tong.' '." VND".'</td>
                            <td></td>
                        </tr>    
                    ';
                    echo
                        '</table>'; 
                    
                    echo'
                    <br>
                    <a href="product.php">Tiếp tục mua sắm</a>  |  <a href="product.php?act=delcart">Xóa giỏ hàng</a>
            </div><br>
            <div class="ttdh">
                <h3>THÔNG TIN ĐẶT HÀNG</h3><br>
                <form action="product.php?act=thanhtoan" method="POST">
                    
                    <input type="hidden" name="tongdonhang" value="<?=$tong?>">
                <table >
                    <tr>
                        <td>Họ tên:<input class="info" type="text" name="hoten" placeholder="Nhập họ tên" >
                        
                        </td>     
                    </tr>
                    <tr>
                        <td>Địa chỉ:<input class="info" type="text" name="address" placeholder="Nhập địa chỉ" >
                        
                        </td>
                    </tr>
                    <tr>
                        <td>Email:<input class="info" type="email" name="email" placeholder="Nhập email" >
                     
                        </td>
                    </tr>
                    <tr>
                        <td> Số điện thoại:<input class="info" type="text" name="phone" placeholder="Nhập số điện thoại" >
                         
                        </td>
                    </tr>
                    <tr>
                        <td>Phương thức thanh toán: <br>
                            <input type="radio" name="pttt" value="Thanh toán khi nhận hàng"> Thanh toán khi nhận hàng <br>
                            <input type="radio" name="pttt" value="Thanh toán chuyển khoản"> Thanh toán chuyển khoản <br>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Thanh toán" name="thanhtoan"></td>
                    </tr>
                    <input type="hidden" value="'.$tong.'" name="total">
                </table>
                </form>';
                }
                    else{
                        echo'
                        <div style="font-size: 35px; text-align: center;padding: 250px;">
                         Giỏ hàng trống
                         </div>'
                    ;}}?>
                    
            </div>
            
        </div>
</body>
</html>