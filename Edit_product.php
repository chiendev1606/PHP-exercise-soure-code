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

if (!empty($_SERVER['QUERY_STRING'])) {
    $QueryString = $_SERVER['QUERY_STRING'];
    parse_str($QueryString, $arr);

    require_once "./connection_database.php";
    require_once "./config_product.php";
    $sql  = "SELECT * FROM product WHERE ProductID =" . $arr['id'];
    $data = getData($conn, $sql);

    require_once "./validate_edit.php";

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Aptech | Edit Product</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./add_product.css">


</head>
<body>
<div class="product-form">
    <form action="#" method="post">
        <h2 class="text-center">Product</h2>
        <div class="form-group">
            <input type="number" name="Id" class="form-control" placeholder="ID" value='<?php echo $data[0]['ProductID']; ?>' readonly >

        </div>
        <div class="form-group">
            <input type="text" name="Name" class="form-control" placeholder="ProductName" value="<?php echo $data[0]['Productname']; ?>">
            <p class="error-message"><?php echo isset($error['Name']) ? $error['Name'] : " "; ?></p>

        </div>

        <div class="form-group">
            <input type="number" name="Price" class="form-control" placeholder="Price" value="<?php echo $data[0]['ProductPrice']; ?>">
            <p class="error-message"><?php echo isset($error['Price']) ? $error['Price'] : " "; ?></p>

        </div>

        <div class="form-group">
            <select name="Status" >
               <option <?php if ($data[0]['Status'] == "Hiện") {echo 'Selected';} ?> >Hiện</option>
               <option <?php if ($data[0]['Status'] == "Ẩn") {echo 'Selected';} ?> >Ẩn </option>
            </select>
        </div>
        <div><p class="success"><?php if (isset($notify)) {echo $notify;} ?></p></div>
        <div class="form-group">
            <input type="submit" name="product_edit" class="btn btn-primary btn-block" value="Cập nhật thông tin"/>
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




<?php } ?>