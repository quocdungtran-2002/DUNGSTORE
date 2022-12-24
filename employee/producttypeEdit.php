<?php
    include "header.php";
    include "slider.php";
    include "class/producttype_class.php";
?>
<?php
    $producttype = new producttype;
    $producttype_id = $_GET['producttype_id'];
    $GET_producttype = $producttype -> GET_producttype($producttype_id);
    if($GET_producttype){
        $resultP = $GET_producttype -> fetch_assoc();
    }

    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cartegory_id = $_POST['cartegory_id'];
        $producttype_name = $_POST['producttype_name'];
        $insert_producttype = $producttype -> insert_producttype($cartegory_id,$producttype_name);
    }
?>


<style>
input{
        height: 30px;
        width: 200px;
        margin: 10px 0 20px 0;
    }
    button{
    display: block;
    margin-top: 10px;
    height: 30px;
    width: 100px;
    cursor: pointer;
    background-color: brown;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
button:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;
}



</style>

<div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Thêm loại sản phẩm</h1><br>
                <form action="" method="POST">
                    <select name="cartegory_id" id="">
                        <option value="#">--Chọn Danh mục--</option>
                        <?php
                        $show_cartegory = $producttype ->show_cartegory();
                        if($show_cartegory){while($result = $show_cartegory -> fetch_assoc()){

                        ?>
                        <option <?php if($resultP['cartegory_id']==$result['cartegory_id']) {echo "SELECTED";} ?> value="<?php echo $result['cartegory_id']?>"><?php echo $result['cartegory_name']?></option>
                        <?php
                        }}
                        ?>
                    </select><br><br>
                    <input required  name="producttype_name" type="text" placeholder="Nhập tên loại sản phẩm"
                    value= "<?php echo $resultP['producttype_name'] ?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>