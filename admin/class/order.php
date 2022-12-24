<?php
include "connectdb.php";
    function taodonhang($madh,$tongdonhang,$pttt,$user_id,$name,$address,$email,$phone){
        $conn=connectdb();
        $sql= "INSERT INTO tbl_order (order_code,order_total,order_payment,user_id,order_name,order_address,order_email,order_phone) VALUES ('".$madh."','".$tongdonhang."','".$pttt."','".$user_id."','".$name."','".$address."','".$email."','".$phone."')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;
    }

    function addtocart($cart_iddh,$product_id,$product_name,$cart_img,$cart_price,$cart_quantity){
        $conn=connectdb();
        $sql= "INSERT INTO tbl_cart (cart_iddh,product_id,product_name,cart_img,cart_price,cart_quantity) VALUES ('".$cart_iddh."','".$product_id."','".$product_name."','".$cart_img."','".$cart_price."','".$cart_quantity."')";
        $conn->exec($sql);
    }

    function getshowcart($iddh){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE cart_iddh =".$iddh);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $kq=$stmt->fetchAll(); 
        return $kq;
    }  

    function getorderinfo($iddh){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE id =".$iddh);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $kq=$stmt->fetchAll(); 
        return $kq;
    } 
?>