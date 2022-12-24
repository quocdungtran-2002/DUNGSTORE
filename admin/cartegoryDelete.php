<?php
    include "class/cartegory_class.php";
    $cartegory = new cartegory;
?>
<?php
    $cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id']==NULL){
        echo"<script>windown.location = 'cartegoryList.php'</script>";
    } else{
        $cartegory_id = $_GET['cartegory_id'];
    }
    $DELETE_cartegory = $cartegory -> DELETE_cartegory($cartegory_id);
    
?>