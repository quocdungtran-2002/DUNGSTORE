<?php
session_start();
ob_start();
if(isset($_SESSION['role'])&&($_SESSION['role']==2)){
    include "header.php";
    include "slider.php";
    // include "slider.php";
    if(isset($_SESSION['role'])) unset($_SESSION['role']);

}
else{
    header('location:login.php');
}