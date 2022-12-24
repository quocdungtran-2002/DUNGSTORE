<?php
    include "./database.php"
?>
<?php

    class producttype{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }
        public function insert_producttype($cartegory_id,$producttype_name){
            $query = "INSERT INTO tbl_producttype (cartegory_id,producttype_name) VALUES ('$cartegory_id','$producttype_name')";
            $result = $this -> db -> insert($query);
            header('Location:producttypeList.php');     
            return $result;
        }
        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this -> db -> select($query);    
            return $result;
        }
        public function show_producttype(){
            // $query = "SELECT * FROM tbl_producttype ORDER BY producttype_id DESC";
            $query = "SELECT  tbl_producttype.*,tbl_cartegory.cartegory_name 
            FROM tbl_producttype INNER JOIN tbl_cartegory ON tbl_producttype.cartegory_id = tbl_cartegory.cartegory_id
            ORDER BY tbl_producttype.producttype_id DESC";
            $result = $this -> db -> select($query);    
            return $result;
        }
        public function GET_producttype($producttype_id){
            $query = "SELECT * FROM tbl_producttype WHERE producttype_id = '$producttype_id'";
            $result = $this -> db -> select($query);    
            return $result;
        }


        public function update_producttype($producttype_name,$producttype_id){
            $query = "UPDATE tbl_producttype SET producttype_name = '$producttype_name',cartegory_id = '$cartegory_id' WHERE producttype_id = '$producttype_id' ";
            $result = $this -> db -> update($query);
            header('Location:producttypeList.php');    
            return $result;
        }
        public function DELETE_producttype($producttype_id){
            $query = "DELETE FROM tbl_producttype WHERE producttype_id = '$producttype_id' ";
            $result = $this -> db -> delete($query);
            header('Location:producttypeList.php');    
            return $result;
        }
    }

?>


















        
        