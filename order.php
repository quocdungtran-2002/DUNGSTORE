<?php 
 
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
    <title>Đơn hàng</title>
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
<body>
        <div class="admin-content-right">
            <div class="admin-content-right-cartegory_list"><br><br><br><br><br>    
                <!-- <a href="index.php">Trang chủ</a> -->
                
                <h1 class="table1">Đơn hàng</h1><br>
                    <?php
                    if(isset($_SESSION['iddh'])&&($_SESSION['iddh']>0)){
                    $getshowcart=getshowcart($_SESSION['iddh']);
                    if((isset($getshowcart))&&(count($getshowcart)>0)){
                        // echo var_dump($_SESSION['giohang']);exit;
                    echo'
                        <table class="table1">
                            <tr class="table1">
                                <th class="table1">STT</th>
                                <th class="table1">Tên sản phẩm</th>
                                <th class="table1">Ảnh sản phẩm</th>
                                <th class="table11">Giá sản phẩm</th>
                                <th class="table1">Số lượng</th>
                                <th class="table1">Thành tiền</th>
                                
                            </tr>';
                        $i=0;
                        $tong=0;    
                        foreach($getshowcart as $item){
                            $tt=(int)$item['cart_price']* (int)$item['cart_quantity'];
                            $tong+=$tt;
                        echo'
                        <tr class="table1">
                            <td class="table1">'.($i+1).'</td>
                            <td class="table1">'.$item['product_name'].'</td>
                            <td class="table1"><img src="admin/uploads/'.$item['cart_img'].'" alt=""></td>
                            <td class="table1">'.$item['cart_price'].' '." VND".'</td>
                            <td class="table1">'.$item['cart_quantity'].'</td>  
                            <td class="table1">'.$tt.' '." VND".'</td>
                            
                        </tr>';
                        $i++;
                        }
                    echo '
                        <tr class="table1">
                            <td class="table1" style="text-align: right; padding-right: 10px;" colspan=5>Tổng tiền:</td>
                            <td class="table1">'.$tong.' '." VND".'</td>
                             
                        </tr>    
                    ';
                    echo
                        '</table>'
                    ;}}?>
                    
            </div><br>
            <div class="ttdh">
                <?php
                    if(isset($_SESSION['iddh'])&&($_SESSION['iddh']>0)){
                        $orderinfo=getorderinfo($_SESSION['iddh']);
                        if(count($orderinfo)>0){
                ?>
                <h3 class="table">Mã đơn hàng: <?=$orderinfo[0]['order_code']?></h3>
                      
                    
                <table class="table">
                    
                    <tr class="table">
                        <td class="table">Tên người nhận:<?=$orderinfo[0]['order_name']?> </td>
                    </tr >
                    <tr class="table">
                        <td class="table">Địa chỉ người nhận:<?=$orderinfo[0]['order_address']?></td>
                    </tr>
                    <tr class="table">
                        <td class="table">Email người nhận:<?=$orderinfo[0]['order_email']?></td>
                    </tr>
                    <tr class="table">
                        <td class="table">Số điện thoại người nhận:<?=$orderinfo[0]['order_phone']?></td>
                    </tr>
                    <tr class="table">
                        <td class="table">Phương thức thanh toán: <br><br>
                        <?php 
                            if($orderinfo[0]['order_payment']=="1"){
                                    echo'Thanh toán khi nhận hàng';
                            }else {
                                echo'Thanh toán chuyển khoản';
                                }       
                                    
                            
                        ?>
                        </td>
                    </tr>   
                   
                </table>
                
                    <?php }} ?>
            </div>
            
        </div>
</body>
</html>