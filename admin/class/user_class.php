<?php
    include "./database.php"
?>
<?php

    class thongtin{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }
        public function insert_user($name,$address,$phonenumber,$email,$user,$pass,$role){
            $query = "INSERT INTO tbl_user ( `name`, `address`,`phonenumber`, `email`, `user`, `pass`, `role`) VALUES ('$name','$address','$phonenumber','$email','$user','$pass','$role')";
            $result = $this -> db -> insert($query);   
            header('Location:userList.php');     
            // return $result;
        }



        public function show_user(){
            $query = "SELECT * FROM tbl_user ORDER BY id DESC";
            $result = $this -> db -> select($query);    
            return $result;
        }
        public function GET_user($id){
            $query = "SELECT * FROM tbl_user WHERE id = '$id'";
            $result = $this -> db -> select($query);    
            return $result;
        }
        public function update_user($name,$address,$phonenumber,$email,$user,$pass
        ,$role,$id){
            $query = "UPDATE tbl_user SET name ='$name', address='$address',phonenumber='$phonenumber', email ='$email', user ='$user',pass='$pass', role='$role'  WHERE id = '$id'";
            $result = $this -> db -> update($query);
            header('Location:userList.php');    
            return $result;
        }
        public function DELETE_user($id){
            $query = "DELETE FROM tbl_user WHERE id = '$id' ";
            $result = $this -> db -> delete($query);
            header('Location:userList.php');    
            return $result;
        }
    }

?>