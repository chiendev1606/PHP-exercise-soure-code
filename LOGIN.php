<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userid']) && isset($_SESSION['role'])) {
    header("location: " . "./Add_product.php");
    exit();

} else {
    ?>


<?php require_once "./validate_login.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./register.css">
    <title> Login | System </title>
</head>

<body>
    <div class="login-form">
        <form action="#" method="post">
            <h2 class="text-center"> Login </h2>
            <div class="form-group">
                <div class="NameInput"> Username </div>
                <input type="text" name="UserName" class="form-control" value="<?php if (isset($UserName)) {echo $UserName;} ?>">
                <p class="error-message">
                    <?php echo isset($error["Username"]) ? $error["Username"] : " "; ?> </p>
            </div>
            <div class="form-group">
                <div class="NameInput"> Password </div>
                <input type="password" name="Pw" class="form-control" value="">
                <p class="error-message">
                    <?php echo isset($error["Pw"]) ? $error["Username"] : " "; ?> </p>

            </div>

            <div class="form-group">
                <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block"> LOGIN </button>
                <button type="button" class="btn btn-primary btn-block" onclick="window.open('./REGISTER.php','_self');">  CREATE ACCOUNT </button>
            </div>
        </form>
    </div>
</body>

</html>

<?php } ?>
