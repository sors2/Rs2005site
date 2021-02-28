<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
    include "../connect.php";
    $n = 1;
    $stmt = $conn->prepare("UPDATE messagecentre SET `remove`= ? WHERE messageID=?");
    $stmt->bind_param("ii",$n,$_GET['messageID']);
    $stmt->execute();
    mysqli_close($conn);
    header("Location: messagecentre.php");
?>
