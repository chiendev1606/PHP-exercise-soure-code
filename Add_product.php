<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['userid'])) {
    header("location: " . "./LOGIN.php");
    exit();

}

if ($_SESSION['role'] == "Admin") {

    ?>

<?php require_once "./vallidate_add.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Aptech | Add Product </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./add_product.css">


</head>
<body>
<div class="product-form">
    <form action="#" method="post">
        <h2 class="text-center">Product</h2>
        <div class="form-group">
            <input type="number" name="Id" class="form-control" placeholder="ID" value='<?php echo isset($Id) ? $Id : " "; ?>' >
            <p class="error-message"><?php echo isset($error['Id']) ? $error['Id'] : " "; ?></p>

        </div>
        <div class="form-group">
            <input type="text" name="Name" class="form-control" placeholder="Product Name" value="<?php echo isset($Name) ? $Name : " "; ?>">
            <p class="error-message"><?php echo isset($error['Name']) ? $error['Name'] : " "; ?></p>

        </div>

        <div class="form-group">
            <input type="number" name="Price" class="form-control" placeholder="Price" value="<?php echo isset($Price) ? $Price : " "; ?>">
            <p class="error-message"><?php echo isset($error['Price']) ? $error['Price'] : " "; ?></p>

        </div>

        <div class="form-group">
            <select name="Status" id="product">
               <option <?php if (isset($Status) && $Status == "Hiện") {echo 'Selected';} ?> >Hiện</option>
               <option <?php if (isset($Status) && $Status == "Ẩn") {echo 'Selected';} ?> >Ẩn </option>
            </select>
        </div>
        <div><p class="success"><?php if (isset($notify)) {echo $notify;} ?></p></div>
        <div class="form-group">
            <input type="submit" name="product_addnew" class="btn btn-primary btn-block" value="Thêm sản phẩm"/>
        </div>
        <div class="form-group">
            <button type=button class="btn btn-primary" onclick="window.open('./LIST_PRODUCT.php','_self');">DANH SÁCH SẢN PHẨM</button>


        </div>
        <div class="form-group">
            <button type="button" class="btn btn-danger" onclick='window.open("./logout.php","_self");'> đăng xuất</button>


        </div>


    </form>

</div>
</body>
</html>

 <?php } else { ?>
 <?php

    header("location:" . "./LIST_PRODUCT_USER.php");

} ?>