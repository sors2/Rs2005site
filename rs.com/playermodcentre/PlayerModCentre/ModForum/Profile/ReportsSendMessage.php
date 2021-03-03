<?php
session_start();
include "../../../../connect.php";
$reportID = $_GET['reportID'];

        // Get the report
        $stmt = $conn->prepare("SELECT replyID,threadID,thread_post,`status`,accepted_by,read_flag FROM reports WHERE reportID=?");
        $stmt->bind_param("i",$reportID);
        $stmt->execute();
        $result = $stmt->get_result();
        $report= $result->fetch_assoc();

        //get the user for either the thread report or post report
        if($report['thread_post'] == 1){
                $stmt = $conn->prepare("SELECT author FROM threads WHERE threadID=?");
                $stmt->bind_param("i",$report['threadID']);
                $stmt->execute();
                $result = $stmt->get_result();
                $user= $result->fetch_assoc();
        }
        else{
                $stmt = $conn->prepare("SELECT author FROM replies WHERE replyID=?");
                $stmt->bind_param("i",$report['replyID']);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
        }

        // get the username
        $stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
        $stmt->bind_param("i", $user['author']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $reciever = $result->fetch_assoc();

if(isset($_POST['submit'])){

        //Set the Sender
        $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $from= $result->fetch_assoc();

        //Set the reciever
        $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
        $stmt->bind_param("i", $_POST['reciever']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $to = $result->fetch_assoc();

        $title = htmlspecialchars($_POST['title']);
        $message = htmlspecialchars(nl2br($_POST["message"]));

        $stmt= $conn->prepare("INSERT INTO messagecentre (toID,fromID,`subject`,`message`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $to['userID'], $from['userID'], $title,$message);
        $stmt->execute();

        mysqli_close($conn);
        header("Location: ../Escalate/ReadReportsView.php?reportID=$reportID");
}
mysqli_close($conn);
?>


<html><head>
<style>
<!--
A{text-decoration:none}
-->
</style>
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<meta content="0" http-equiv="Expires">
<meta content="no-cache" http-equiv="Pragma">
<meta content="no-cache" http-equiv="Cache-Control">
<meta content="TRUE" name="MSSmartTagsPreventParsing">
<meta content="text/html; charset=windows-1252" http-equiv="content-type">
<meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming" name="Keywords">
<link rel="shortcut icon" href="ForumBoard/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="SendMessage_files/main.css">
<link href="SendMessage_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../../../../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../../../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../../../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../../../../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>


<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="SendMessage_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="SendMessage_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="SendMessage_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="SendMessage_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
<div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
<?php if (isset($_SESSION['username'])): ?>
        <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
<?php else : ?>
        <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center><?php endif ?>
</div></center>
</td>
</tr>
</tbody>
</table>
</center>
<br>

<br><center><table bgcolor="black" border="0" cellpadding="4" width="500"><tbody><tr><td class="e"> <center><b>Send Message</b>
<br>
<?php if(isset($_GET['reportID'])):?><?php $reportID = $_GET['reportID'];?>
        <a href="../Escalate/ReadReportsView.php?reportID=<?php echo $reportID;?>" class="c">Back to report view</a>
<?php else:?>
        <a href="../../../../messagecentre/messagecentre.php" class="c">Message Centre</a>
<?php endif?>
 - <a href="../Profile/ForumProfile.php?user=<?php echo $reciever['username'];?>" class="c">Back to forum profile</a></center>
<br>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?reportID=$reportID");?>" method="POST">
<table style="height:50px" border="0" width="200px">
  <tbody><tr><!-- Row 1 -->
     <td align="left">Title:</td><!-- Col 1 -->
     <td align="left"><input style="background-color:white; color:#000000;" name = "title"></td><!-- Col 2 -->
  </tr>
  <tr><!-- Row 2 -->
     <td align="left">Reciever:</td><!-- Col 1 -->
     <td align="left"><input style="background-color:white; color:#000000;" name = "reciever" value="<?php echo $reciever['username'];?>"></td><!-- Col 2 -->
  </tr>
</tbody></table>

<table style="height:50px" border="0" width="100%">
  <tbody><tr><!-- Row 1 -->
     <td></td><!-- Col 1 -->
     <td><b>Date</b></td><!-- Col 2 -->
     <td><b>Message</b></td><!-- Col 3 -->
  </tr>
  <tr><!-- Row 2 -->
     <td valign="top"><img src="SendMessage_files/thread.png" alt="" title="" height="13" width="13"></td><!-- Col 1 -->
     <td valign="top"><?php $date = date("d M Y"); echo $date;?></td><!-- Col 2 -->
     <td><textarea style="width:350px; height:200px; background-color:white; color:#000000;" name = "message"></textarea></td><!-- Col 3 -->
  </tr>
</tbody></table>
<br><input value="Submit" name="submit" type="submit">
</form>
      
      

<table border="0" cellpadding="2" cellspacing="1" width="455">







</table></td>





</tr></tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="SendMessage_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="../../../../forums/ForumBoard/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="../../../../forums/ForumBoard/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="SendMessage_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="SendMessage_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>