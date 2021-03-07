<?php

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['userid'])) {
    header("location: " . "./LOGIN.php");
    exit();

}

?>
<?php
require_once "./connection_database.php";
require_once "./config_product.php";
$sql = "SELECT * FROM product";
$DataTable = getData($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prodcut list</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="List.css">
</head>

<body>
   <p>
   <small>Xin chào <b><?php echo $_SESSION['username']; ?></b></small> <br>
   <small>Lân đăng nhập cuối cùng là <b><?php echo date("  H:i:s, d-m-Y", $_COOKIE['lastlogin']); ?></b></small>
   <button type="button" class="btn btn-danger" onclick='window.open("./logout.php","_self");'> đăng xuất</button>
   </p>
   <table class="table table-striped table-dark">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
         </tr>
      </thead>
      <tbody>
     <?php
$i = 1;
foreach ($DataTable as $value) {
    $xhtml = '<tr>
      <th scope="row" class=' . $i . '>' . $i . '</th>
      <td>' . $value['ProductID'] . '</td>
      <td>' . $value['Productname'] . '</td>
      <td>' . $value['ProductPrice'] . '</td>
      <td>' . $value['Status'] . '</td>
      </tr>';
    echo $xhtml;
    $i++;
    ?>
      <?php
}
?>






      </tbody>
   </table>

</body>

</html>