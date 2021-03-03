<?php 
    session_start();
    include "../../../../connect.php";

    //Get all the details of the thread
    $stmt = $conn->prepare("SELECT * FROM threads WHERE threadID = ?");
    $stmt->bind_param("i", $_GET['threadID']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $thread= $result->fetch_assoc();

    //Get the userID of the person doing the action
    $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $user= $result->fetch_assoc();

    $t =  $thread['threadID'];
    $page = $thread['page'];
    $n = 0;
    $stmt = $conn->prepare("UPDATE threads SET isSticky = ? WHERE threadID = ?");
    $stmt->bind_param("ii", $n,$_GET['threadID']);
    $stmt->execute(); 

    mysqli_close($conn);
    header("Location: ../../../../forums/ForumThread/forumthread.php?threadID=$t&page=$page");
?>