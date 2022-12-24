<?php
    include "header.php";
    include "slider.php";
    include "class/cartegory_class.php";
?>
<?php
    $cartegory = new cartegory;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cartegory_name = $_POST['cartegory_name'];
        $insert_cartegory = $cartegory -> insert_cartegory($cartegory_name);
    }
?>
<style>
    input{
        height: 30px;
        width: 200px;
        margin: 20px 0 20px 0;
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
                    <input required  name="cartegory_name" type="text" placeholder="Nhập tên danh mục">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>