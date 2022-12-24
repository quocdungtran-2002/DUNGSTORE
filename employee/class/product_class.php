<?php
    include "./database.php"
?>
<?php

    class product{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
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
        public function show_producttype_Ajax($cartegory_id){
            $query = "SELECT * FROM tbl_producttype WHERE cartegory_id = '$cartegory_id'";
            $result = $this -> db -> select($query);    
            return $result;
        }
        

        //
        public function show_product(){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
            $result = $this -> db -> select($query);    
            return $result;
        }

        public function DELETE_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id' ";
            $result = $this -> db -> delete($query);
            header('Location:productList.php');    
            return $result;
        }

        //
        // public function DELETE_product_img_desc($product_img_desc){
        //     $query = "DELETE FROM tbl_product_img_desc WHERE product_id = '$product_id' ";
        //     $result = $this -> db -> delete($query);
        //     // header('Location:productList.php');    
        //     return $result;
        // }
        //
        public function GET_product($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> select($query);    
            return $result;
        }
        //
        public function GET_producttype($producttype_id){
            $query = "SELECT * FROM tbl_producttype WHERE producttype_id = '$producttype_id'";
            $result = $this -> db -> select($query);    
            return $result;
        }

        public function insert_product(){
            $product_name = $_POST['product_name'];
            $product_code = $_POST['product_code'];
            $cartegory_id = $_POST['cartegory_id'];
            $producttype_id = $_POST['producttype_id'];
            $product_quantity = $_POST['product_quantity'];
            $product_price = $_POST['product_price'];
            $product_price_new = $_POST['product_price_new'];
            
            $product_desc = $_POST['product_desc'];
            $product_img = $_FILES['product_img']['name'];
            $filetarget = basename($_FILES['product_img']['name']);
            $filetype = strtolower(pathinfo($product_img, PATHINFO_EXTENSION));
            $filesize = $_FILES['product_img']['size'];

            if(file_exists("uploads/$filetarget")){
                $alert = "File đã tồn tại";
                return $alert;
            }
            // else{
            //     if($filetype != "jbg" && $filetype != "png" && $filetype !="jbeg"){
            //         $alert = "Chỉ chọn FILE .jbg  .png  .jbeg";
            //         return $alert;
            //     }
            //     else{
            //         if($filesize > 1000000){
            //             $alert = "Chỉ chọn FILE dưới 1MB";
            //             return $alert;
            //         }
                    else{
                        move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
                        $query = "INSERT INTO tbl_product (
                        product_name,
                        product_code,
                        cartegory_id,
                        producttype_id,
                        product_quantity,
                        product_price,
                        product_price_new,
                        
                        product_desc,
                        product_img)
                        VALUES (
                            '$product_name',
                            '$product_code',
                            '$cartegory_id',
                            '$producttype_id',
                            '$product_quantity',
                            '$product_price',
                            '$product_price_new',
                            
                            '$product_desc',
                            '$product_img')";
                        $result = $this -> db -> insert($query);
                        if($result){
                            $query = "SELECT * FROM tbl_product ORDER by product_id DESC LIMIT 1";$result = $this -> db -> select($query) -> fetch_assoc();
                            $product_id = $result['product_id'];
                            $filename = $_FILES['product_img_desc']['name'];
                            $filetmp = $_FILES['product_img_desc']['tmp_name'];

                            foreach ($filename as $key => $value)
                            {   
                                move_uploaded_file($filetmp[$key],"uploads/".$value);
                                $query = "INSERT INTO tbl_product_img_desc (product_id,product_img_desc) VALUES ('$product_id','$value')";
                                $result = $this -> db -> insert($query);
                            }
                        }


                   


                    }
                    
                // }
            // }

            
             header('Location:productList.php');     
            return $result;
        }














        
        
        
        


        public function update_producttype($producttype_name,$producttype_id){
            $query = "UPDATE tbl_producttype SET producttype_name = '$producttype_name',cartegory_id = '$cartegory_id' WHERE producttype_id = '$producttype_id' ";
            $result = $this -> db -> update($query);
            header('Location:producttypeList.php');    
            return $result;
        }
        
    }

?>


















        
        