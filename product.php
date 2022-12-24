<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dungstore";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm kết nối
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


?>

<?php
    include "admin\class\order.php";
    session_start(); 
    if(isset($_GET["thoat"])&&$_GET["thoat"]=="0") {
        
        unset($_SESSION['username']);
        header('location:index.php');
    }
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    if(isset($_GET["action"])){
        if(isset($_POST["addtocart"])&&($_POST["addtocart"])){
                
            $product_id = $_POST['product_id'];
            // $product_quantity= $_POST['product_quantity'];
            $product_name = $_POST['product_name'];
            $product_img = $_POST['product_img'];
            $product_price = $_POST['product_price'];
            if(isset($_POST['product_quantity'])&&($_POST['product_quantity']>0)){
                $sl= $_POST['product_quantity'];        
            }
            else{
                $sl=1;
            }
            
            $fg=0;
            $i=0;   
            foreach($_SESSION['giohang'] as $item){ 
                if($item[1]===$product_name){
                    $slnew=$sl+$item[4];
                    $_SESSION['giohang'][$i][4]=$slnew;
                    $fg=1;
                }
                $i++;
            }   
            if($fg==0){
                $item = array($product_id,$product_name,$product_img,$product_price,$sl);   
                $_SESSION['giohang'][]=$item;
            }
            header('location: product.php?act=cart');
        }
        
    }
    

    if(isset($_GET["act"])&&$_GET["act"]=="delcart"){
        if(isset($_GET['i'])){
            if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                array_splice($_SESSION['giohang'],$_GET['i'],1);
            }
            
        }else{
            if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
        }
        if((isset($_SESSION['giohang']))&&(count($_SESSION['giohang'])>0)){
            header('location: cart.php?act=cart');
        }
        else{
            header('location: product.php');
        }
    }
    if(isset($_SESSION['username'])){
    if(isset($_GET["act"])&&$_GET["act"]=="thanhtoan"){
        if(isset($_POST["thanhtoan"])&&($_POST["thanhtoan"])){
                


                $tongdonhang = $_POST['total'];
                $name = $_POST['hoten'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $pttt = $_POST['pttt'];
                $user_id = $_POST['user_id'];
                $madh =  "DUNGSTORE".rand(0,99999);
                $iddh = taodonhang($madh,$tongdonhang,$pttt,$user_id,$name,$address,$email,$phone);
                $_SESSION['iddh'] = $iddh;
                // $_SESSION['user_id'] = $user_id;
                // $order_code = $_POST['order_code'];
                // $_SESSION['order_code'] = $order_code;15129 
                // $item = array($product_id,$product_name,$product_img,$product_price,$sl);
                if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                    foreach($_SESSION['giohang'] as $item){
                        addtocart($iddh,$item[0],$item[1],$item[2],$item[3],$item[4]);
                            $selectsql = "SELECT cart_quantity FROM tbl_cart WHERE product_id = '$item[0]'";
                            $result = mysqli_query($conn, $selectsql);
                            $row = mysqli_fetch_assoc($result);
                            $cqtt = $row['cart_quantity'];

                            $selectsql2 = "SELECT product_quantity FROM tbl_product WHERE product_id = '$item[0]'";
                            $result2 = mysqli_query($conn, $selectsql2);
                            $row2= mysqli_fetch_assoc($result2);
                            $pqtt = $row2['product_quantity'];
                            $quantity = $pqtt - $cqtt;
                            $updatesql = "UPDATE tbl_product SET product_quantity = '$quantity' WHERE product_id = '$item[0]'";
                            mysqli_query($conn, $updatesql);
                        /////////////////1111111
                    }
                    unset($_SESSION['giohang']);
                }
        }
        include "order.php";
        
        }
    // if(isset($_GET["act"])&&$_GET["act"]=="updatecart"){
    //     header('location: product.php');
    // }
        
    }
    else{
        echo 'Bạn cần đăng nhập để mua hàng!';
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUNGSTORE</title>

    <link rel="icon" href="./assets/img/d-solid.svg" type="image/x-icon" />

    <!-- Slide -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/js.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
</head>
<body>
    <div class="app">
        <div class="header">
            <div class="header__contact hide-on-mobile-tablet">
                <ul class="header__contact-list">
                    <li class="header__conatct-item">
                        <a href="https://www.facebook.com/nhocs.tran.1" class="header__contact-item-link">
                            <i class="header__contact-icon ti-facebook"></i>
                        </a>
                    </li>
                    <li class="header__conatct-item">
                        <a href="https://www.instagram.com/q.dung308/" class="header__contact-item-link">
                            <i class="header__contact-icon ti-instagram"></i>
                        </a>
                    </li>

                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            About Us
                        </a>
                    </li>

                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            Wishlist
                        </a>
                    </li>

                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            Contact
                        </a>
                    </li>

                </ul>



            </div>
            <input type="checkbox" id="header__menu-input" class="nav-input">
            <input type="checkbox" id="header__menu-bag" class="cart-input">
            <input type="checkbox" id="header__menu-search" class="search-input">
            <input type="checkbox" id="menu__mobile--tablet-check" class="menu__mobile--tablet-input">

            <label for="header__menu-search" class="header__menu-bag-overlay">
            </label>
            <label for="header__menu-bag" class="header__menu-bag-overlay">
            </label>
            <label for="menu__mobile--tablet-check" class="header__menu-bag-overlay">
            </label>

            <div class="header__menu-sreach">
                <div class="header__menu-sreach-close">
                    <label for="header__menu-search" href="#" class="header__menu-sreach-close-link">
                        <i class="nav__bang-sreach-close-icon ti-close"></i>
                    </label>
                </div>

                <div class="header__menu-sreach-nav">
                    <div class="header__menu-sreach-bar-all">
                        <div class="header__menu-sreach-bar">
                            <i class="header__menu-sreach-icon ti-search"></i>
                            <input type="text" class="header__menu-sreach-input" placeholder="Search product...">
                        </div>
                        <div class="header__menu-sreach-category">
                            <select class="header__menu-sreach-category-select" >
                                <option value="0">All Categories</option>
                                <option value="1">Men</option>
                                <option value="2">Speakers</option>
                                <option value="3">Women</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="menu__mobile--tablet l-0">
                <div class="menu__mobile--tablet-header">
                    <label for="menu__mobile--tablet-check" href="#" class="mobile--tablet__link-close">
                        <i class="mobile--tablet__close-icon ti-close"></i>
                    </label>
                </div>
                <div class="menu__mobile--tablet-body">

                    <div class="menu__mobile--tablet-body-top">
                        <div class="menu__mobile--tablet-sreach">
                            <i class="menu__mobile--tablet-sreach-icon ti-search"></i>
                            <input type="text" class="menu__mobile--tablet-sreach-input" placeholder="Search products...">
                        </div>
                        <div class="menu__mobile--tablet-nav">
                            <a href="index.php" class="menu__mobile--tablet-content">MAIN</a>
                            <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                        </div>
                            
                            
                                <div class="menu__mobile--tablet-nav">
                                    <a href="" class="menu__mobile--tablet-content"></a>
                                    <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                                </div>

                            
                        </div>
                    

                    <div class="menu__mobile--tablet-body-bottom">
                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Login</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-lock"></i>
                        </div>

                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Cart</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-bag"></i>
                        </div>

                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Wishlist</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-heart"></i>
                        </div>

                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Langue</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-world"></i>
                        </div>

                        <i class="menu__mobile--tablet-subnav-icon ti-facebook"></i>
                        <i class="menu__mobile--tablet-subnav-icon ti-twitter-alt"></i>
                        <i class="menu__mobile--tablet-subnav-icon ti-instagram"></i>
                    </div>
                </div>
            </div>

            <div class="header__menu-nav-bag">
                <div class="nav__bang-header">
                    <span class="nav__bang-header-cart">Cart </span>
                    <a href="cart.php">
                                <i class="header__navbar-icon ti-bag"></i>
                            </a>
                </div>
            
               
            </div>

            <div id="header__navbar-scroll" class="header__navbar hide-on-mobile-tablet">
                <div class="header__navbar-left">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <label for="header__menu-input" class="header__navbar-item-link">
                                <i class="header__navbar-icon ti-menu"></i>
                            </label>
                        </li>
                        <li  onmouseover="mouseOverMain()" onmouseout="mouseOutMain()" class="header__navbar-item">
                            <a href="index.php" class="header__navbar-item-link header__navbar-item-link-underline">
                                MAIN
                            </a>
                        </li>
                        <?php 
                            $sql = "SELECT * FROM tbl_cartegory";
                            $resultC = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($resultC)){
                            
                            echo'
                        <li  onmouseover="mouseOverMain()" onmouseout="mouseOutMain()" class="header__navbar-item">
                        
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                '.$row['cartegory_name'].'</a>
                            
                        </li>
                        ';}?>
                       

                    </ul>
                </div>
                
                <div class="header__navbar-center">
                     <img src="/assets/img/DUNGSTORE-removebg-preview.png" class="header__navbar-brand-logo" alt=""> 
                </div>
                
                <div class="header__navbar-right">
                    <ul class="header__navbar-list">
                            <?php
                                if(isset($_SESSION['username'])&& !empty( $_SESSION['username'])){  
                                    echo '<li class="header__navbar-item"><a href="" class="header__navbar-item-link header__navbar-item-link-underline">Chào! '.$_SESSION['username'].'</a></li>';
                                    echo '<li class="header__navbar-item"><a href="index.php?thoat=0" class="header__navbar-item-link header__navbar-item-link-underline">Thoát</a></li>';
                                     
                                }else{
                            ?>
                        <li class="header__navbar-item">
                            <a href="login.php" class="header__navbar-item-link header__navbar-item-link-underline">
                                Login
                            </a>
                        </li>
                            <?php } ?>
                        <li class="header__navbar-item">
                            <label for="header__menu-search" href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon ti-search"></i>
                            </label>
                        </li>
    
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon ti-heart"></i>
                            </a>
                        </li>

                        <li class="header__navbar-item">
                            <a href="cart.php">
                                <i class="header__navbar-icon ti-bag"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sub nav -->

                <!-- Main Subnav -->
                <div onmouseover="mouseOverMain()" onmouseout="mouseOutMain()" class="header__navbar-item-subnav header__navbar-main">
                     <div class="grid__row-header">
                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                            <?php 
                            $sql = "SELECT * FROM tbl_cartegory";
                            $resultC = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($resultC)){
                            
                            echo'
                                <div class="subnav-category">'.$row['cartegory_name'].'</div>';?>
                                <?php 
                                $sql1 = "SELECT * FROM tbl_producttype WHERE cartegory_id = '".$row['cartegory_id']."'";
                                $resultP = $conn->query($sql1);
                                while($row1 = mysqli_fetch_assoc($resultP)){
                                echo'
                                <ul class="subnav-category-list">
                                
                                    <li class="subnav-category-item">
                                        <a href="list.php?id='.$row1['producttype_id'].'" class="subnav-category-item-link">
                                        '.$row1['producttype_name'].'
                                        </a>
                                    </li>
                                          
                                </ul>
                                ';}}?> 
                            </div>
                        </div>

                        

                    </div> 
                </div>
                <!-- End Main Subnav -->

              
            </div>

            <!-- NavBar Tablet and Mobile -->
            <div class="header-mobile-tablet">
                <label for="menu__mobile--tablet-check" href="#" class="header-mobile-tablet__icon-link">
                    <i class="ti-menu"></i>
                </label>
                <a href="#" class="header-mobile-tablet__icon-link">
                    <img src="./assets/img/DUNGSTORE-removebg-preview.png" alt="" class="header-mobile-tablet__logo-img"> 
                </a>
                <a href="cart.php">
                                <i class="header__navbar-icon ti-bag"></i>
                            </a>
            </div>

            <div class="header__menu-overlay hide-on-mobile-tablet">
                <div class="grid wide">
                    <label for="header__menu-input" class="header__menu--close-link">
                        <i class="header__menu--close-icon ti-close"></i>
                    </label>
                    <div class="row">
                        <div class="grid__column-menu-left">
                            <ul class="header__menu--list">
                                <li class="header__menu--list-item">
                                <div class="header__menu--list-block">
                                        <a href="index.php" class="header__menu--list-item-link">
                                            MAIN
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>
                                    </div>
                                
                                    <div class="header__menu--list-block">
                                        <a href="" class="header__menu--list-item-link">
                                        
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>

                                        </div>
                                     
                            
                        </div>


                                    </div>
                                </li>
                                
                            </ul>
                        </div>

                       

                        <div class="grid__column-menu-right">
                            <h3 class="grid__column-menu-right-category">CART</h3>
                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Shopping Cart
                                    </a>
                                </li>
                            </ul>
                            <h3 class="grid__column-menu-right-category">MINICART</h3>

                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Top
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Side
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Dark
                                    </a>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>

            <!-- Slide -->
            <!-- <div class="sajid-1 owl-carousel owl-theme header__container">
                <div class="">
                    <img src="./assets/img/banner1.jpg" alt="" class="header__slider-img" >
                    <div class="header__container-ads">
                        
                    </div>
                </div>
                
                <div class="">
                    <img src="./assets/img/banner2.png" alt="" class="header__slider-img">
                    
                </div>
        
                <div class="">
                    <img src="./assets/img/banner3.jpg" alt="" class="header__slider-img header__slider-img-left">
                    
                </div>
            </div>
            <div class="owl-nav">
                <div class="owl-prev-one">
                    <i class="ti-angle-left"></i>
                </div>
                <div class="owl-next-one">
                    <i class="ti-angle-right"></i>
                </div>
            </div> -->
            <!-- End Slide -->

        </div>
        <section class="product">
            <div class="container">
                  <div class="product-content row">
                  <?php
                        if(isset($_GET['id'])){
                            $sql = "SELECT  tbl_product.*,tbl_product_img_desc.product_img_desc 
                            FROM tbl_product INNER JOIN tbl_product_img_desc ON tbl_product.product_id = tbl_product_img_desc.product_id
                            WHERE tbl_product.product_id = '".$_GET['id']."'";

                            $result = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($result)){
                        
                        echo'
                    <form style="display:flex;" action="product.php?action=addcart" method="POST">
                    <div class="product-content-left">
                    
                        <div class="product-content-left-big-img">
                            <img src="admin/uploads/'.$row['product_img'].'" alt="">
                        </div>
                        <div class="product-content-left-small-img">
                            <img src="admin/uploads/'.$row['product_img_desc'].'" alt="">
                        </div>
                    </div>
                    <div class="product-content-right">
                        <div class="product-content-right-product-name">
                            <h1>'.$row['product_name'].'</h1>
                        </div>
                        <div class="product-content-right-product-price">
                            <p>'.$row['product_price'].''." ".'VND</p>
                        </div>
                        <div class="nav__bag--item-quantity">
                            <p style="font-weight: bold;">Số lượng:</p>
                            <input required style="width: 40px; height: 30px; font-size: 20px; text-align: center;" type="number" min=1  name=product_quantity max='.$row['product_quantity'].'><br>  
                            <label for="">Còn lại '.$row['product_quantity'].' sản phẩm </label>  
                        </div><br>
                        <div class="nav__bag-cart-panel">
                            <input style="height: 30px; font-size: 20px;" type="submit" value="Thêm vào giỏ hàng" name="addtocart">
                        </div>
                        
                        <div>
                            <input type="hidden" value="'.$row['product_id'].'" name="product_id">
                                
                            <input type="hidden" value="'.$row['product_name'].'" name="product_name">
                            <input type="hidden" value="'.$row['product_img'].'" name="product_img"> 
                            <input type="hidden" value="'.$row['product_price'].'" name="product_price">
                        </div> 
                        <div class="product-content-right-bottom">
                            <div class="product-content-right-bottom-content-big">
                                <div class="product-content-right-bottom-content-title rơw">
                                    <div class="product-content-right-bottom-content-title-item ">
                                        <p>Chi tiết sản phẩm</p>
                                    </div>
                                </div>
                                <div class="product-content-right-bottom-content">
                                    <div class="product-content-right-bottom-content-chitietsanpham">
                                        <p>'.$row['product_desc'].'</p>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                       
                    </div>
                    </form>
                    ';}}?> 
                  </div>  
            </div>
        </section>

        

        <div class="footer">
            <div class="footer__info">
                <div class="grid wide">
                    <div class="row">
                        <div class="col l-3 m-6 c-5 c-o-1">
                            <h6 class="footer__info-title">COMPANY</h6>
                            <!-- <ul class="footer__info--list">
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        About Us
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Contact
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Store Locations
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Careers
                                    </a>
                                </li>
                            </ul> -->
                        </div>

                        <div class="col l-3 m-6 c-5">
                            <h6 class="footer__info-title">HELP</h6>
                            <!-- <ul class="footer__info--list">
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Order Tracking
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        FAQ’s
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul> -->
                        </div>

                        <div class="col l-3 m-6 c-5 c-o-1">
                            <h6 class="footer__info-title">STORE</h6>
                            <!-- <ul class="footer__info--list">
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Women
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Men
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Speakers
                                    </a>
                                </li>
                            </ul> -->
                        </div>

                        <div class="col l-3 m-6 c-5">
                            <h6 class="footer__info-title">FOLLOW US</h6>
                            <p href="" class="footer__info--list-item-link">
                                And get Free Shipping on all your orders!
                            </p>
                            <ul class="footer__info--list-icon">
                                <li class="footer__info--list-icon-item">
                                    <a href="https://www.facebook.com/nhocs.tran.1" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-facebook"></i>
                                    </a>
                                </li>
                                <!-- <li class="footer__info--list-icon-item">
                                    <a href="" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-twitter-alt"></i>
                                    </a>
                                </li> -->
                                <li class="footer__info--list-icon-item">
                                    <a href="https://www.instagram.com/q.dung308/" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-instagram"></i>
                                    </a>
                                </li>
                                <!-- <li class="footer__info--list-icon-item">
                                    <a href="" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-pinterest-alt"></i>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>


                    <!-- <h4 class="app__container-title pd-top-60">
                        Sign up now & get 10% off
                    </h4>
                    <p class="app__container-introduce">
                        Be the first to know about our new arrivals and exclusive offers.
                    </p>
                    <div class="footer__info-form-sign-up">
                        <input type="text" class="footer__info-form-email-input" placeholder="Your email address">
                        <a href="" class="footer__info-form-sumbit">Sign up</a>
                    </div> -->
                </div>
            </div>

            <div class="footer__policy">
                <div class="grid wide">
                    <div class="row footer__policy-content">
                            <div class="footer__policy-left">
                                <!-- <a href="" class="footer__policy-left-link">Privacy Policy</a>
                                <a href="" class="footer__policy-left-link">Terms & Conditions</a> -->
                            </div>
        
                            <div class="footer__policy-right">
                                <p class="footer__policy-right-copyright">
                                    ©2022 DUNGSTORE - Dũng Trần
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="backtop">
            <i class="backtop__icon ti-arrow-up"></i>
        </div>
    </div> 
</body>
</html>