<?php



function checkInputEmpty($x)
{
    $result = true;
    if (!empty($x)) {
        $result = false;
    }

    return $result;
}
function checkUserInValid($UserName)
{
    $result = true;
    $pattern = '/^(?=.*[A-Z])(?=.*[0-9])\S{8,}/';
    if (preg_match($pattern, $UserName)) {
        $result = false;
    }
    return $result;
}
function checkPwInValid($UserName)
{
    $result = true;
    $pattern = "#^(?=.*[A-Z])(?=.*\W)(?=.*\d).{8,}$#";
    if (preg_match($pattern, $UserName)) {
        $result = false;
    }
    return $result;
}

function checkPwNotMatch($Pw, $PwRepeat)
{
    $result = true;
    if ($Pw == $PwRepeat) {
        $result = false;
    }
    return $result;
}
function checkEmailInvalid($Email)
{
    $result = true;
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $result = false;
    }
    return $result;
}

function UserNameEmailExist($conn, $UserName, $Email)
{
    
    try {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM userinfo WHERE Username = :username or Email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $UserName, PDO::PARAM_STR);
        $stmt->bindParam(":email", $Email, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;

    } catch (PDOException $e) {
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}
        return $data;
}

function registerUser($conn, $UserName, $Pw, $Email, $Role)
{
    $Pw = md5($Pw);

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO userinfo(Username,Email,Role,Pw) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $UserName, PDO::PARAM_STR);
        $stmt->bindParam(2, $Email, PDO::PARAM_STR);
        $stmt->bindParam(3, $Role, PDO::PARAM_STR);
        $stmt->bindParam(4, $Pw, PDO::PARAM_STR);
        $stmt->execute();
        $conn = null;

    } catch (PDOException $e) {

        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}

}



