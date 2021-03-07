<?php

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['userid'])) {
    header("location: " . "./LOGIN.php");
    exit();

}
if ($_SESSION['role'] == "User") {
    header('location:' . "./LIST_PRODUCT_USER.php");
    exit();
}


if(!empty($_SERVER['QUERY_STRING'])){
 $QueryString = $_SERVER['QUERY_STRING']; 
 parse_str($QueryString,$arr);
 
require_once "./connection_database.php";
require_once "./config_product.php";
$sql = "DELETE  FROM product WHERE ProductID =" .$arr['id'];

getData($conn,$sql);
header("location:"."./LIST_PRODUCT.php");
exit();
}

?>