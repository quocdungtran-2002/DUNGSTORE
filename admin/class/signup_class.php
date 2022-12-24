<?php
    include "./admin/database.php"
?>
<?php

    class signup{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }
        public function insert_info($name,$user,$pass,$phonenumber,$address,$email,$role){
            $query = "INSERT INTO tbl_user (name,user,pass,phonenumber,address,email,role) VALUES ('$name','$user','$pass','$phonenumber','$address','$email','$role')";
            $result = $this -> db -> insert($query);   
            // header('Location:cartegoryList.php');     
            return $result;
        }
     
    }

?>