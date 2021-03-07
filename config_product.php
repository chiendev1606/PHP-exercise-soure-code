<?php 

function CheckIDNameExist($conn, $Name, $Id) {
    try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM product WHERE ProductID = ? or Productname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $Id);
    $stmt->bindParam(2, $Name);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

} catch (PDOException $e) {
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}
return $data;

}

function AddProduct($conn, $Id, $Name, $Status, $Price) {
    try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO product(ProductID,Productname,ProductPrice,Status) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $Id);
    $stmt->bindParam(2, $Name);
    $stmt->bindParam(3, $Price);
    $stmt->bindParam(4, $Status);
    $stmt->execute();
    $conn = null;

} catch (PDOException $e) {
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}


}


function editProduct($conn, $Id, $Name, $Price, $Status)

{
    try {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE product SET Productname = ?, ProductPrice = ? , Status = ? WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $Name , PDO::PARAM_STR);
        $stmt->bindParam(2, $Price , PDO::PARAM_INT);
        $stmt->bindParam(3, $Status, PDO::PARAM_STR);
        $stmt->bindParam(4, $Id, PDO::PARAM_INT);

        
        $stmt->execute();
        $conn = null;

    } catch (PDOException $e) {
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}

}



function getData($conn,$sql) {
try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt= $conn ->prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $conn = null;

} catch (PDOException $e) {
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}
    return $data;
}




?>