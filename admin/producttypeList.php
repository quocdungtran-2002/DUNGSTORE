<?php
    include "header.php";
    include "slider.php";
    include "class/producttype_class.php";
?>
<?php
    $producttype = new producttype;
    $show_producttype = $producttype -> show_producttype();

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
                <h1>Danh sách loại sản phẩm</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Loại sản phẩm</th> 
                        <th>Danh mục</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                        if($show_producttype){$i=0;
                            while($result = $show_producttype->fetch_assoc()){$i++;
                        
                    ?>
                    <tr>
                        <td> <?php echo $i ?> </td>
                        <td> <?php echo $result['producttype_id'] ?> </td>
                        <td> <?php echo $result['cartegory_name'] ?> </td>
                        <td> <?php echo $result['producttype_name'] ?> </td>
                        <td><a href="producttypeEdit.php?producttype_id=<?php echo $result['producttype_id'] ?>"><button class="Sua">Sửa</button></a><a href="producttypeDelete.php?producttype_id=<?php echo $result['producttype_id'] ?>"><button class="Xoa">Xóa</button></a></td>
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