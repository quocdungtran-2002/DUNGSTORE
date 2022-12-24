<?php
    include "class/order_class.php";
    $order = new order;
?>
<?php
    $order = new order;
    $id = $_GET['id'];
    $DELETE_order = $order -> DELETE_order($id);
    
?>