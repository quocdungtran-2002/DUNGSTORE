<?php
    session_start();  
    if(isset($_GET["thoat"])&&$_GET["thoat"]=="0") {
        
        unset($_SESSION['username']);
        header('location:index.php');
    }
    
    
?>
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
                        <!-- <li onmouseover="mouseOverShop()" onmouseout="mouseOutShop()"  class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                Shop
                            </a>
                        </li>

                        <li onmouseover="mouseOverProduct()" onmouseout="mouseOutProduct()" class="header__navbar-item">
                            <a href="list.html" class="header__navbar-item-link header__navbar-item-link-underline">
                                Product
                            </a>
                        </li>

                        <li onmouseover="mouseOverPages()" onmouseout="mouseOutPages()" class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                Pages
                            </a>
                        </li>

                        <li onmouseover="mouseOverJournal()" onmouseout="mouseOutJournal()"  class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                Journal
                            </a>
                        </li> -->

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

                        <!-- <div class="grid__column-menu-right">
                            <h3 class="grid__column-menu-right-category">CATALOG</h3>
                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 1
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 2
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 3
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 4
                                    </a>
                                </li>
                            </ul>
                            <h3 class="grid__column-menu-right-category">FILTERS</h3>

                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Top
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Sidebar
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Slide Out
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="grid__column-menu-right" >
                            <h3 class="grid__column-menu-right-category">CATALOG OPTIONS</h3>
                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Darker Background
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Width – Regular
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Animation – Zoom Only
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Load More – Scroll
                                    </a>
                                </li>
                            </ul>
                            <h3 class="grid__column-menu-right-category">SHOP PAGES</h3>

                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        My account – 1 Col
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Wishlist
                                    </a>
                                </li>
                            </ul>
                        </div>-->

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
            <div class="sajid-1 owl-carousel owl-theme header__container">
                <div class="">
                    <img src="./assets/img/banner1.jpg" alt="" class="header__slider-img" >
                    <div class="header__container-ads">
                        <!-- <span class="header__container-ads-sale">Spring/Summer '19</span>
                        <h1 class="header__container-ads-name-product">The Weekent  <br> Getaway</h1>
                        <p class="header__container-ads-shop-now">Browse styles</p> -->
                    </div>
                </div>
                
                <div class="">
                    <img src="./assets/img/banner2.png" alt="" class="header__slider-img">
                    <!-- <div class="header__container-ads">
                        <span class="header__container-ads-sale">50% OFF</span>
                        <h1 class="header__container-ads-name-product">New Cocktail <br> Dresses</h1>
                        <p class="header__container-ads-shop-now">Shop Now</p>
                    </div> -->
                </div>
        
                <div class="">
                    <img src="./assets/img/banner3.jpg" alt="" class="header__slider-img header__slider-img-left">
                    <!-- <div class="header__container-ads header__container-ads-left">
                        <span class="header__container-ads-sale">Summer '19</span>
                        <h1 class="header__container-ads-name-product">Night Summer <br> Dresses</h1>
                        <p class="header__container-ads-shop-now">Shop Now</p>
                    </div> -->
                </div>
            </div>
            <div class="owl-nav">
                <div class="owl-prev-one">
                    <i class="ti-angle-left"></i>
                </div>
                <div class="owl-next-one">
                    <i class="ti-angle-right"></i>
                </div>
            </div>
            <!-- End Slide -->

        </div>

        <div class="app__container">
            <div class="app__container-product">
                <div class="grid wide">
                    <div class="row ">
                        <div class="col l-4 m-12 c-12 ">
                            <div class="product-item__wrap">
                                <div class="container__product-item" style="background-image: url(./assets/img/anhNU4.jpg);">
                                    <h2 class="container__product-title-content">Footbal <br><br> Clothes </h2>
                                    <a href="#" class="container__product-content-button">Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col l-4 m-12 c-12">
                            <div class="product-item__wrap">
                                <div class="container__product-item" style="background-image: url(./assets/img/anhNu2.jpg);">
                                    <h2 class="container__product-title-content">Choose <br> your <br> price</h2>
                                    <a href="#" class="container__product-content-button">Choose Yours</a>
                                </div>
                            </div>
                        </div>

                        <div class="col l-4 m-12 c-12">
                            <div class="product-item__wrap">
                                <div class="container__product-item" style="background-image: url(./assets/img/anhNu3.jpg);">
                                    <h2 class="container__product-title-content">Clearance Sale</h2>
                                    <p class="container__product-content-sale">Up to 70% Off & Free Shipping</p>
                                    <a href="#" class="container__product-content-button">Browse sales</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app__container-selling">
                <div class="grid wide">
                    <h4 class="app__container-title">
                        Best Selling
                    </h4>
                    <p class="app__container-introduce">
                        Những mẫu sản phẩm bán chạy đang được các <br> tín đồ bóng đá ưa chuộng nhất.
                    </p>
                    <div class="row ">
                        <div class="col l-4 m-4 c-12">
                            <div class="container__selling-item">
                                <img src="./assets/img/wika1.jpg" alt="" class="container__selling-img1">
                                <img src="./assets/img/wika1-1.jpg" alt="" class="container__selling-img2">
                                <ul class="container__selling-interactive-list">
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon ti-heart  "></i>
                                        </a>
                                        <span class="selling-interactive-item-content">Add to Wishlis</span>
                                    </li>
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon interactive-icon-not-hover ti-bag"></i>
                                        </a>
                                        <span class="selling-interactive-item-content">View Product</span>
                                    </li>
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon interactive-icon-not-hover ti-arrows-corner icon-rotate"></i>
                                        </a>
                                        <span class="selling-interactive-item-content">Quick View</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Giày Công Phượng P191</a><br><br>
                            <p class="container__selling-price">450000 VND</p>
                        </div>

                        <div class="col l-4 m-4 c-12">
                            <div class="container__selling-item">
                                <img src="./assets/img/wika2.jpg" alt="" class="container__selling-img1">
                                <img src="./assets/img/wika2-1.jpg" alt="" class="container__selling-img2">
                                <ul class="container__selling-interactive-list">
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon ti-heart  "></i>
                                        </a>
                                        <span class="selling-interactive-item-content">Add to Wishlis</span>
                                    </li>
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon interactive-icon-not-hover ti-bag"></i>
                                        </a>
                                        <span class="selling-interactive-item-content">View Product</span>
                                    </li>
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon interactive-icon-not-hover ti-arrows-corner icon-rotate"></i>
                                        </a>
                                        <span class="selling-interactive-item-content">Quick View</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Giày Công Phượng P192</a><br><br>
                            <p class="container__selling-price">450000 VND</p>
                        </div>

                        <div class="col l-4 m-4 c-12 container__selling-product-item">
                            <div class="container__selling-item">
                                <img src="./assets/img/wika3.jpg" alt="" class="container__selling-img1">
                                <img src="./assets/img/wika3-1.jpg" alt="" class="container__selling-img2">
                                <p class="product__new">New</p>
                                <ul class="container__selling-interactive-list">
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon ti-heart  "></i>
                                        </a>
                                        <span class="selling-interactive-item-content">Add to Wishlis</span>
                                    </li>
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon interactive-icon-not-hover ti-bag"></i>
                                        </a>
                                        <span class="selling-interactive-item-content">View Product</span>
                                    </li>
                                    <li class="container__selling-interactive-item">
                                        <a href="" class="container__selling-interactive-link">
                                            <i class="container__selling-interactive-icon interactive-icon-not-hover ti-arrows-corner icon-rotate"></i>
                                        </a>
                                        <span class="selling-interactive-item-content">Quick View</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Giày Công Phượng P193</a><br><br>
                            <p class="container__selling-price">450000 VND</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide testimoonials -->

            
            <div class="container__testimoonials">
                <div class="sajid-2 owl-carousel owl-theme">
                
                    <div class="">
                        <h2 class="container__testimoonials-title">Proverb</h2>
                        <p class="container__testimoonials-text">"WORK HARD, HAVE FUN, MAKE HISTORY".</p>
                        <div class="container__testimoonials-staff">
                            <img src="https://th.bing.com/th/id/OIP.ZD8ZbndDDUpyE1A8razskAHaEK?pid=ImgDet&rs=1" alt="" class="container__testimoonials-staff-img">
                            <div class="container__testimoonials-staff-info">
                                <p class="container__testimoonials-staff-name">Jeff Bezos</p>
                                <p class="container__testimoonials-staff-position">Businessman</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="">
                        <h2 class="container__testimoonials-title">Proverb</h2>
                        <p class="container__testimoonials-text">"SOMETIMES WHEN YOU INNOVATE, YOU MAKE MISTAKES. IT IS BEST TO ADMIT THEM QUICKLY, AND GET ON WITH IMPROVING YOURS OTHER INNOVATIONS".</p>
                        <div class="container__testimoonials-staff">
                            <img src="https://th.bing.com/th/id/OIP.BwynLPcPYvfAOjamc1sgKQHaFj?w=251&h=188&c=7&r=0&o=5&dpr=1.3&pid=1.7"  alt="" class="container__testimoonials-staff-img">
                            <div class="container__testimoonials-staff-info">
                                <p class="container__testimoonials-staff-name">Steve Jobs</p>
                                <p class="container__testimoonials-staff-position">Businessman</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="owl-nav">
                    <div class="owl-prev-two">
                        <i class="ti-angle-left"></i>
                    </div>
                    <div class="owl-next-two">
                        <i class="ti-angle-right"></i>
                    </div>
                </div>
            </div>
            
            <div class="container__trending">
                <div class="grid wide">
                    <h4 class="app__container-title">
                        Trending 
                    </h4>
                    <p class="app__container-introduce">
                        Những mẫu quần áo bóng đá <br> với thiết kế thời thượng. mẫu mã đẹp mắt.
                    </p>
                    <div class="row ">
                        <div class="col l-3 m-6 c-10 c-o-1">
                            <div class="container__trending-item">
                                <img src="./assets/img/wika4-1.jpg" alt="" class="container__trending-img1">
                                <img src="./assets/img/wika4-2.jpg" alt="" class="container__trending-img2">
                                <ul class="container__trending-interactive-list">
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-heart  "></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item interactive-item-borded">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-bag"></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-arrows-corner icon-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Quần áo Công Phượng P191</a><br><br>
                            <p class="container__selling-price">120000 VND</p>
                        </div>

                        <div class="col l-3 m-6 c-10 c-o-1">
                            <div class="container__trending-item">
                                <img src="./assets/img/wika5-1.jpg" alt="" class="container__trending-img1">
                                <img src="./assets/img/wika5-2.jpg" alt="" class="container__trending-img2">
                                <ul class="container__trending-interactive-list">
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-heart  "></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item interactive-item-borded">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-bag"></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-arrows-corner icon-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Quần áo Công Phượng P192</a><br><br>
                            <p class="container__selling-price">120000 VND</p>
                        </div>

                        <div class="col l-3 m-6 c-10 c-o-1">
                            <div class="container__trending-item">
                                <img src="./assets/img/wika6-1.jpg" alt="" class="container__trending-img1">
                                <img src="./assets/img/wika6-2.jpg" alt="" class="container__trending-img2">
                                <!-- <p class="product__new">New</p> -->
                                <ul class="container__trending-interactive-list">
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-heart  "></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item interactive-item-borded">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-bag"></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-arrows-corner icon-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Quần áo Công Phượng P193</a><br><br>
                            <p class="container__selling-price">120000 VND</p>
                        </div>

                        <div class="col l-3 m-6 c-10 c-o-1">
                            <div class="container__trending-item">
                                <img src="./assets/img/wika7-1.jpg" alt="" class="container__trending-img1">
                                <img src="./assets/img/wika7-2.jpg" alt="" class="container__trending-img2">
                                <!-- <p class="product__sale">-25%</p> -->
                                <ul class="container__trending-interactive-list">
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-heart  "></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item interactive-item-borded">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-bag"></i>
                                        </a>
                                    </li>
                                    <li class="container__trending-interactive-item">
                                        <a href="" class="container__trending-interactive-link">
                                            <i class="container__trending-interactive-icon ti-arrows-corner icon-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="container__selling-name">Quần áo Công Phượng P194</a><br><br>
                            <span class="container__selling-prices">
                                <p class="container__selling-price">120000 VND</p>
                                <!-- <p class="container__selling-price-old">$48.00</p> -->
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container__visit">
                <div class="grid wide">
                    <h4 class="app__container-title">
                        Visit Us
                    </h4>
                    <p class="app__container-introduce">
                        Hãy ghé qua các cửa hàng của chúng tôi để tìm hiểu những câu chuyện đằng sau các sản phẩm, tham gia một buổi tạo kiểu cá nhân hoặc mua sắm trực tiếp những sản phẩm mới nhất.
                    </p>
                    <img src="./assets/img/he-thong-cua-hang.jpg" alt="" class="container__visit-img">
                </div>
            </div>
        </div>

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
                            <ul class="footer__info--list">
                                 
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                    
                                    </a>
                                </li>
                                 
                            </ul>
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