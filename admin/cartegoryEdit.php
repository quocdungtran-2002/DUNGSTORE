<?php
    include "header.php";
    include "slider.php";
    include "class/cartegory_class.php";
?>
<?php
    $cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id']==NULL){
        // echo"<script>windown.location = 'cartegoryList.php'</script>";
    } else{
        $cartegory_id = $_GET['cartegory_id'];
    }
    $GET_cartegory = $cartegory -> GET_cartegory($cartegory_id);
    if($GET_cartegory){
        $result = $GET_cartegory -> fetch_assoc();
    }
?>

<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cartegory_name = $_POST['cartegory_name'];
        $update_cartegory = $cartegory -> update_cartegory($cartegory_name,$cartegory_id);
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
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <input required  name="cartegory_name" type="text" placeholder="Nhập tên danh mục" value="<?php echo $result['cartegory_name'] ?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>