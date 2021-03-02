<?php
session_start();
$threadID = $_GET['threadID'];
if (isset($_POST["add"])){
    include "../../../../connect.php";

    //Get the deatils on the thread
    $stmt = $conn->prepare("SELECT * FROM threads WHERE threadID = ?");
    $stmt->bind_param("i", $_GET['threadID']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $thread= $result->fetch_assoc();

    //Get the ID of the user making the action
    $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $user= $result->fetch_assoc();

    //store the log of the action as a pre-edit
    $type = "Pre-Edit";
    $statement = $conn->prepare("INSERT INTO moderatorthreadlog (`type`,issued_by, threadID,category,title,author,`date`,last_author,last_reply,total_posts, isSticky,isLocked, `hidden`,`page`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bind_param("siissisisiiiii",$type, $user['userID'],$thread['threadID'],$thread['category'],$thread['title'],$thread['author'],$thread['date_posted'],$thread['last_author'],$thread['last_reply'],$thread['total_posts'],$thread['isSticky'],$thread['isLocked'],$thread['hidden'],$thread['page']);
    if(!$statement->execute()){
        die("did not update");
    }

    //Update the new edited title
    $message = htmlspecialchars(nl2br($_POST["message"]));
    $title = htmlspecialchars(nl2br($_POST["title"]));
    $stmt = $conn->prepare("UPDATE threads SET title=? WHERE threadID=?");
    $stmt->bind_param("si",$title,$_GET['threadID']);
    $stmt->execute();

    //update the original post
    $date = date("Y-d-m H-i-s");
    $stmt = $conn->prepare("UPDATE replies SET reply=?,last_edit=?,edited_by=? WHERE threadID=? AND originalPost = 1");
    $stmt->bind_param("sssi",$message,$date,$_SESSION['username'],$_GET['threadID']);
    $stmt->execute();

    //get the ID again (As it has been updated)
    $stmt = $conn->prepare("SELECT * FROM threads WHERE threadID = ?");
    $stmt->bind_param("i", $_GET['threadID']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $thread= $result->fetch_assoc();

    //Store the log of the action as a post-edit
    $type = "Post-Edit";
    $statement = $conn->prepare("INSERT INTO moderatorthreadlog (`type`,issued_by, threadID,category,title,author,`date`,last_author,last_reply,total_posts, isSticky,isLocked, `hidden`,`page`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bind_param("siissisisiiiii",$type, $user['userID'],$thread['threadID'],$thread['category'],$thread['title'],$thread['author'],$thread['date_posted'],$thread['last_author'],$thread['last_reply'],$thread['total_posts'],$thread['isSticky'],$thread['isLocked'],$thread['hidden'],$thread['page']);
    if(!$statement->execute()){
        die("did not update");
    }

    $page = $thread['page'];
    mysqli_close($conn);
    header("Location: ../../../../forums/ForumBoard/forumboard.php?category=$cat&page=$page");
}
if (isset($_POST["cancel"])){
    header("Location: ../../../../forums/ForumBoard/forumboard.php?category=$cat&page=$page");
}
?>