<?php
    include "header.php";
    include "slider.php";
    include "class/order_class.php";
?>
<?php
    $order = new order;
    $show_order = $order -> show_order();

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
                <h1>Danh sách đơn đặt hàng</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tổng tiền</th> 
                        <th>Thanh toán</th>
                        <th>User_id</th>
                        <th>Tên người đặt</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tình trạng</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                        if($show_order){$i=0;
                            while($result = $show_order->fetch_assoc()){$i++;
                        
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['id'] ?></td>
                        <td><?php echo $result['order_code'] ?></td>
                        <td><?php echo $result['order_total'] ?></td>
                        <td><?php echo $result['order_payment'] ?></td>
                        <td><?php echo $result['user_id'] ?></td>
                        <td><?php echo $result['order_name'] ?></td>
                        <td><?php echo $result['order_address'] ?></td>
                        <td><?php echo $result['order_email'] ?></td>
                        <td><?php echo $result['order_phone'] ?></td>
                        <td><?php echo $result['order_status'] ?></td>
                        <td><a href="orderEdit.php?id=<?php echo $result['id'] ?>"><button class="Sua">Sửa</button></a></td>


                        
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