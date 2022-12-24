<?php
    include "class/product_class.php";
    $product = new product;
    // $productimg = new productimg;
?>
<?php
    $product = new product;
    $product_id = $_GET['product_id'];
    $DELETE_product = $product -> DELETE_product($product_id);
    
    // $productimg = new product_img;
    // $product_img_desc = $_GET['product_img_desc'];
    // $DELETE_product_img_desc = $productimg -> DELETE_product_img_desc($product_img_desc);
    
?>