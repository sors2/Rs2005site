<?php
include "connect.php";
 // Get the userID
 if(isset($_SESSION['username'])){
    $query = ("SELECT userID, rolesID FROM users WHERE username = ?");      
    if (!$stmt = mysqli_prepare($conn, $query))
    {
        echo "Error: ".$stmt->error;
        exit();
    }
    if(!$stmt->bind_param("s",$_SESSION['username']))
    {
        echo "Error: ".$stmt->error;
        exit();
    }
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    } else {
        echo "Error: ".$stmt->error;
    }
    $stmt->close();

    // Check the ban details of the user
    $n = 1;
    $query = ("SELECT expire FROM bandetails WHERE userID = ? AND `type` = ? ORDER BY `expire` DESC LIMIT 1");     
    if (!$stmt = mysqli_prepare($conn, $query))
    {
        echo "Error: ".$stmt->error;
        exit();
    }
    if(!$stmt->bind_param("ii",$user['userID'],$n))
    {
        echo "Error: ".$stmt->error;
        exit();
    }
}
?>