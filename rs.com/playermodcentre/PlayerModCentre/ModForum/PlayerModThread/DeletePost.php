<?php 
    session_start();
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

    $type = "Delete";
    $statement = $conn->prepare("INSERT INTO moderatorreplylog (`type`,issued_by, replyID,threadID,author,dateReply,reply,last_edit,edited_by, originalPost,`hidden`,`page`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bind_param("siiiisssiiii",$type, $user['userID'],$reply['replyID'],$reply['threadID'],$reply['author'],$reply['dateReply'],$reply['reply'],$reply['last_edit'],$reply['edited_by'],$reply['originalPost'],$reply['hidden'],$reply['page']);
    if(!$statement->execute()){
        die("did not update");
    }

    $threadID = $reply['threadID'];
    $page = $reply['page'];
    $n = 1;
    $stmt = $conn->prepare("UPDATE threads SET total_posts = total_posts - ? WHERE threadID = ?");
    $stmt->bind_param("ii", $n,$threadID );
    $stmt->execute(); 

    $stmt = $conn->prepare("DELETE FROM replies WHERE replyID=?");
    $stmt->bind_param("i",$_GET['replyID']);
    $stmt->execute();

    mysqli_close($conn);
    header("Location: ../../../../forums/ForumThread/forumthread.php?threadID=$threadID&page=$page");
?>