<?php
    include "header.php";
    include "slider.php";
    include "class/order_class.php";
?>
<?php
    $order = new order;
    $id = $_GET['id'];
    $GET_order = $order -> GET_order($id);
    if($GET_order){
        $result = $GET_order -> fetch_assoc();
    }

    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $id = $_POST['id'];
        $order_code = $_POST['order_code'];
        $order_total = $_POST['order_total'];
        $order_payment = $_POST['order_payment'];
        $user_id = $_POST['user_id'];
        $order_name = $_POST['order_name'];
        $order_address = $_POST['order_address'];
        $order_email = $_POST['order_email'];
        $order_phone = $_POST['order_phone'];
        $order_status = $_POST['order_status'];

        $update_order = $order -> update_order($id,$order_code,$order_total,$order_payment,$user_id,$order_name,$order_address,$order_email,$order_phone,$order_status);
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
                <h1>Tình trạng hóa đơn</h1><br>
                <form action="" method="POST">
                
                <label for=""> Tình trạng đơn hàng</label><br>
                <input required  name="order_status" type="text"  value="<?php echo $result['order_status'] ?>"><br>
                <button type="submit">Cập nhật</button>


                <input   name="id" type="hidden"  value="<?php echo $result['id'] ?>"><br>
                
                <input   name="order_code" type="hidden"  value="<?php echo $result['order_code'] ?>"><br>

                <input   name="order_total" type="hidden"  value="<?php echo $result['order_total'] ?>"><br>

                <input   name="order_payment" type="hidden"  value="<?php echo $result['order_payment'] ?>"><br>

                <input   name="user_id" type="hidden"  value="<?php echo $result['user_id'] ?>"><br>

                <input   name="order_name" type="hidden"  value="<?php echo $result['order_name'] ?>"><br>

                <input   name="order_address" type="hidden"  value="<?php echo $result['order_address'] ?>"><br>

                <input   name="order_email" type="hidden"  value="<?php echo $result['order_email'] ?>"><br>

                <input   name="order_phone" type="hidden"  value="<?php echo $result['order_phone'] ?>"><br>

                
                    
                </form>
            </div>
        </div>
    </section>
</body>
</html>