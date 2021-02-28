<?php 
session_start();
if (isset($_POST["login"])){
    include "connect.php";

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    
    $stmt= $conn->prepare("SELECT userID,user_password,rolesID FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();   
    $result = $stmt->get_result();

    if(mysqli_num_rows($result)== 0){
        die("user not found");
    }

    $user = $result->fetch_assoc();

        if(password_verify($pass,$user['user_password'])){

            $stmt= $conn->prepare("SELECT expire FROM bandetails WHERE userID = ?");
            $stmt->bind_param("i", $user['userID']);
            $stmt->execute();   
            $ban = $stmt->get_result();
            $user_ban = $ban->fetch_assoc();
        
            $current = date("d-m-Y H:i:s");
            if((mysqli_num_rows($ban) == 0) || strtotime($user_ban['duration']) < strtotime($current)){
                session_start();
                $_SESSION['username'] =$username;
                $_SESSION['permission'] = $user['rolesID'];
                $_SESSION['vote'] = "vote";
                $dt = date('Y-m-d H:i:s');
                $statement = $conn->prepare("UPDATE users SET last_activity = ? WHERE userID = ?");
                $statement->bind_param("si",$dt,$user['userID']);
                $statement->execute();
                header('Location: login_frame.php');
            }
            else{
                echo "You are Banned.";
            }
        }  
        else{
            echo "failed";
        }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<html>
   <head>
      <TITLE>RuneScape - the massive online adventure game by Jagex Ltd</TITLE>
      <META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
      <META content="MSHTML 6.00.2800.1505" name=GENERATOR>
   </head>
   <FRAMESET border=0 frameSpacing=0 rows=100% frameBorder=0 cols=130,*>
   <FRAME src="login_frame.php" noResize scrolling=no>
   <FRAME src="securemenu/securemenu.php" noResize>