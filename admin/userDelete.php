<?php
    include "class/user_class.php";
    $thongtin = new thongtin;
?>
<?php
    $thongtin = new thongtin;
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo"<script>windown.location = 'userList.php'</script>";
    } else{
        $id = $_GET['id'];
    }
    $DELETE_user = $thongtin -> DELETE_user($id);
    
?>