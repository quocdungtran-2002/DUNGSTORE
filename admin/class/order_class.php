<?php
    include "./database.php"
?>
<?php

    class order{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }
        // public function insert_order($id,$order_code,$order_total,$order_payment,$user_id,$order_name,$order_address,$order_email,$order_phone,$order_status){
        //     $query = "INSERT INTO tbl_order (id,order_code,order_total,order_payment,user_id,order_name,order_address,order_email,order_phone,order_status) VALUES ('$id','$order_code','$order_total','$order_payment','$user_id','$order_name','$order_address','$order_email','$order_phone','$order_status')";
        //     $result = $this -> db -> insert($query);
        //     header('Location:orderList.php');     
        //     return $result;
        // }
        public function show_order(){
            $query = "SELECT * FROM tbl_order ORDER BY id DESC";
            $result = $this -> db -> select($query);    
            return $result;
        }
        // public function show_producttype(){
        //     // $query = "SELECT * FROM tbl_producttype ORDER BY producttype_id DESC";
        //     $query = "SELECT  tbl_producttype.*,tbl_cartegory.cartegory_name 
        //     FROM tbl_producttype INNER JOIN tbl_cartegory ON tbl_producttype.cartegory_id = tbl_cartegory.cartegory_id
        //     ORDER BY tbl_producttype.producttype_id DESC";
        //     $result = $this -> db -> select($query);    
        //     return $result;
        // }
        public function GET_order($id){
            $query = "SELECT * FROM tbl_order WHERE id = '$id'";
            $result = $this -> db -> select($query);    
            return $result;
        }


        public function update_order($id,$order_code,$order_total,$order_payment,$user_id,$order_name,$order_address,$order_email,$order_phone,$order_status){
            $query = "UPDATE tbl_order SET order_code = '$order_code', order_total = '$order_total', order_payment = '$order_payment' , user_id = '$user_id' , order_name = '$order_name' , order_address = '$order_address' , order_email = '
            $order_email' , order_phone = '$order_phone' , order_status = '$order_status' WHERE id = '$id' ";
            $result = $this -> db -> update($query);
            header('Location:orderList.php');    
            return $result;
        }
        public function DELETE_order($id){
            $query = "DELETE FROM tbl_order WHERE id = '$id' ";
            $result = $this -> db -> delete($query);
            header('Location:orderList.php');    
            return $result;
        }
    }

?>


















        
        