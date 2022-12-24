<?php
    include "header.php";
    include "slider.php";
    include "class/cartegory_class.php";
?>
<?php
    $cartegory = new cartegory;
    $show_cartegory = $cartegory -> show_cartegory();

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
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                        if($show_cartegory){$i=0;
                            while($result = $show_cartegory->fetch_assoc()){$i++;
                        
                    ?>
                    <tr>
                        <td> <?php echo $i ?> </td>
                        <td> <?php echo $result['cartegory_id'] ?> </td>
                        <td> <?php echo $result['cartegory_name'] ?> </td>
                        <td><a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>"><button class="Sua">Sửa</button></a><a href="cartegoryDelete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>"><button class="Xoa">Xóa</button></a></td>
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