<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>
<?php
    $product = new product;
    $show_product = $product -> show_product();

?>

<style>
.Sua {
    display: inline;
    margin: 10px 1px 10px 10px;
    height: 30px;
    width: 50px;
    cursor: pointer;
    background-color: #00AA00;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
.Sua:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;
    
}
.Xoa {
    display: inline;
    margin: 10px 10px 10px 1px;
    height: 30px;
    width: 50px;
    cursor: pointer;
    background-color: #CC0000;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
.Xoa:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;
    
}
</style>    


        <div class="admin-content-right">
            <div class="admin-content-right-cartegory_list">
                <h1>Danh sáchsản phẩm</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Mã sản phẩm</th> 
                        <th>Số lượng sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <!-- <th>Size sản phẩm</th> -->
                        <th>Mô tả sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                        if($show_product){$i=0;
                        while($result = $show_product->fetch_assoc()){$i++;
                        
                    ?>
                    <tr>
                        <td> <?php echo $i ?> </td>
                        <td> <?php echo $result['product_name'] ?> </td>
                        <td> <?php echo $result['product_code'] ?> </td>
                        <td> <?php echo $result['product_quantity'] ?> </td>
                        <td> <?php echo $result['product_price'] ?> </td>
                        <td> <?php echo $result['product_price_new'] ?> </td>
                    
                        <td> <?php echo $result['product_desc'] ?> </td>
                        <td> <?php echo $result['product_img'] ?> </td>
                        <td><a href="productEdit.php?product_id=<?php echo $result['product_id'] ?>"><button class="Sua">Sửa</button></a><a href="productDelete.php?product_id=<?php echo $result['product_id'] ?>"><button class="Xoa">Xóa</button></a></td>
                    </tr> 
                    <?php
                            }
                         }
                    ?> 
                </table>
            </div>
        </div>
    </section>
</body>
</html>