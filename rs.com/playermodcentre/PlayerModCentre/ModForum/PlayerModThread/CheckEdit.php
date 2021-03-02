<?php 
session_start();

if (isset($_POST["add"])){
    include "../../../../connect.php";

    $stmt = $conn->prepare("SELECT * FROM replies WHERE replyID = ?");
    $stmt->bind_param("i", $_GET['replyID']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $reply= $result->fetch_assoc();

    $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $user= $result->fetch_assoc();

    $type = "Edit";
    $statement = $conn->prepare("INSERT INTO moderatorreplylog (`type`,issued_by, replyID,threadID,author,dateReply,reply,last_edit,edited_by, originalPost,`hidden`,`page` ,images) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bind_param("siiiisssiiiis",$type, $user['userID'],$reply['replyID'],$reply['threadID'],$reply['author'],$reply['dateReply'],$reply['reply'],$reply['last_edit'],$reply['edited_by'],$reply['originalPost'],$reply['hidden'],$reply['page'],$reply['images']);
    if(!$statement->execute()){
        die("did not update");
    }

    $images = json_encode($images);
    $stmt = $conn->prepare("UPDATE replies SET reply=?,last_edit=?, edited_by=? ,WHERE replyID=?");
    $stmt->bind_param("ssisi",$message,$date,$user['userID'],$_GET['replyID']);
    $stmt->execute();

    $threadID = $reply['threadID'];
    $page =  $reply['page'];
    mysqli_close($conn);
    header("Location: ../../../../forums/ForumThread/forumthread.php?threadID=$threadID&page=$page");
}
?>