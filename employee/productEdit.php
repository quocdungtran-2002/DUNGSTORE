<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>
<?php
    $product = new product;
    $product_id = $_GET['product_id'];
    $GET_product = $product -> GET_product($product_id);
    if($GET_product){
        $resultP = $GET_product -> fetch_assoc();
    }

    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $insert_product = $product -> insert_product($_POST,$_FILES);
    }
?>


<style>
     .product-size{
        display: flex;  
    }
    p{
        margin-top: 10px;
    }
</style>
<div class="admin-content-right">
<div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color:red;">*</span></label>
                    <input name="product_name" required type="text" 
                    value= "<?php echo $resultP['product_name'] ?>">
                    <label for="">Nhập mã sản phẩm <span style="color:red;">*</span></label>
                    <input name="product_code" required type="text" 
                    value= "<?php echo $resultP['product_code'] ?>">
                    <label for="">Chọn danh mục <span style="color:red;">*</span></label>
                    <select name="cartegory_id" id="cartegory_id">
                
                        <?php
                            $show_cartegory = $product -> show_cartegory();
                            if($show_cartegory) {while($result = $show_cartegory -> fetch_assoc()){   
                        ?>
                        <option 
                        <?php if($resultP['cartegory_id']==$result['cartegory_id']) {echo "SELECTED";} ?>
                        value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php
                            }}
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm <span style="color:red;">*</span></label>
                    <select name="producttype_id" id="producttype_id">
                        
                                               
                    </select>
                    <label for="">Số lượng sản phẩm <span style="color:red;">*</span></label>
                    <input name="product_quantity" required type="number" 
                    value= "<?php echo $resultP['product_quantity'] ?>" >
                    <label for="">Giá sản phẩm <span style="color:red;">*</span></label>
                    <input name="product_price" required type="text"
                    value= "<?php echo $resultP['product_price'] ?>" >
                    <label for="">Giá khuyến mãi <span style="color:red;">*</span></label>
                    <input name="product_price_new" required type="text" 
                    value= "<?php echo $resultP['product_price_new'] ?>" >
                    <label for="">Mô tả sản phẩm <span style="color:red;">*</span></label>
                    <textarea name="product_desc" required id="editor1" cols="30" rows="10" 
                    value= "" ><?php echo $resultP['product_desc'] ?></textarea>
                    <label for="">Ảnh sản phẩm <span style="color:red;">*</span></label>
                    <span style="color:red";> <?php if(isset($insert_product)) {
                        echo ($insert_product);
                    } ?> </span>
                    <input name="product_img" required type="file">
                    <label for="">Ảnh mô tả <span style="color:red;">*</span></label>
                    <input name="product_img_desc[]" required  multiple type="file">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' ,{
            filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
            filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
        
    </script>

    <script>
        $(document).ready(function(){
            $("#cartegory_id").change(function(){
                var x = $(this).val()
                $.get("productAdd_Ajax.php",{cartegory_id:x},function(data){
                    $("#producttype_id").html(data);
                })
            })
        })
    </script>

</html>