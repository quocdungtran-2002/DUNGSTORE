<?php
    include "class/product_class.php";
    $product = new product ;    
    $cartegory_id = $_GET['cartegory_id'];
?>


<?php
    $show_producttype_Ajax = $product -> show_producttype_Ajax($cartegory_id);
    if($show_producttype_Ajax) {while($result = $show_producttype_Ajax -> fetch_assoc()){   
?>
   <option value="<?php echo $result['producttype_id'] ?>"><?php echo $result['producttype_name'] ?></option>
<?php
    }}
?>