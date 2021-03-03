<?php
session_start();
if(isset($_POST['ban'])){
    include "../../../../connect.php";
    $stmt= $conn->prepare("SELECT userID,username FROM users WHERE username = ?");
    $stmt->bind_param("s", $_GET['user']);
    $stmt->execute();   
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt= $conn->prepare("SELECT userID,username FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();   
    $result = $stmt->get_result();
    $user_mod = $result->fetch_assoc();

    $hours = $_POST['duration2'];
    $current = date("Y-m-d H:i:s");
    $date = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $hours)));
    $note = htmlspecialchars(nl2br($_POST['note2']));

    $stmt= $conn->prepare("INSERT INTO bandetails (userID,rule,ban_by,note,amount,expire) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isisis", $user['userID'], $_POST['rule2'],$user_mod['userID'],$note,$hours,$date);
    $stmt->execute();  

    $u =$user['username'];
    
    header("Location: ../PlayerModTools/PlayerModForumProfile.php?user=$u");
}

if(isset($_POST['mute'])){
    include "../../../../connect.php";

    $stmt= $conn->prepare("SELECT userID,username FROM users WHERE username = ?");
    $stmt->bind_param("s", $_GET['user']);
    $stmt->execute();   
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt= $conn->prepare("SELECT userID,username FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();   
    $result = $stmt->get_result();
    $user_mod = $result->fetch_assoc();

    $hours = $_POST['duration1'];
    $current = date("Y-m-d H:i:s");
    $date = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $hours)));
    $note = htmlspecialchars(nl2br($_POST['note1']));

    $stmt= $conn->prepare("INSERT INTO mutedetails (userID,muted_by,rule,note,amount,expire) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("iissis", $user['userID'],$user_mod['userID'],$_POST['rule1'],$note,$hours,$date);
    $stmt->execute();  

    $u =$user['username'];
    
    header("Location: ../PlayerModTools/PlayerModForumProfile.php?user=$u");

}
?>