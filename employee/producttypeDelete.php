<?php
    include "class/producttype_class.php";
    $producttype = new producttype;
?>
<?php
    $producttype = new producttype;
    $producttype_id = $_GET['producttype_id'];
    $DELETE_producttype = $producttype -> DELETE_producttype($producttype_id);
    
?>