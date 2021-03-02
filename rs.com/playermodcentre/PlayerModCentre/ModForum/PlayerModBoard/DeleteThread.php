<?php 
    session_start();
    include "../../../../connect.php";

    //Get the userID of the person doing the action
    $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $user= $result->fetch_assoc();

    //Delete the thread
    $stmt = $conn->prepare("DELETE FROM threads WHERE threadID=?");
    $stmt->bind_param("i",$_GET['threadID'] );
    $stmt->execute();

    $stmt = $conn->prepare("SELECT category FROM threads WHERE threadID= ?");
    $stmt->bind_param("i", $_GET['threadID']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $thread= $result->fetch_assoc();

    $cat =  urlencode($thread['category']);
    mysqli_close($conn);
    header("Location: ../../../../forums/ForumBoard/forumboard.php?category=$cat");
?>