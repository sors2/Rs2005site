<?php
session_start();
$err = array("user_err" => "", "notuser_err" => "", "duplicate_err" => "");
if(isset($_POST['submit'])){
        include "../../connect.php";
        $stmt = $conn->prepare("SELECT userID FROM users WHERE username =?");
        $stmt->bind_param("s",$_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_details = $result->fetch_assoc();

        if(mysqli_num_rows($result) == 0){
                $err["user_err"] = "Username not found.";
        }
        else{
                $user = $_POST['username'];
                if($_POST['type'] == 1 || $_POST['type'] == 2){

                        $stmt = $conn->prepare("SELECT userID FROM tracker WHERE userID =?");
                        $stmt->bind_param("i",$user_details['userID']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if(mysqli_num_rows($result) == 1)
                        {
                                $err["duplicate_err"] = "A request is already issued by this username";
                        }
                         

                        header("Location: recoveryquestions/recoveryquestions.php?user=$user");
                }
                else{
                        if(isset($_SESSION['username']) && strcmp($_SESSION['username'],$user) == 0){
                
                                 header("Location: ../../accountmanagement/setrecoveryquestions/setrecoveryquestions.php?");   
                        }
                        else{
                                echo "here";
                                $err["notuser_err"] = "You must be logged into the account for that query.";
                        }
                }
        }
}       
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<style>
<!--
A{text-decoration:none}
-->
</style>
<style>
BODY, P, TABLE, HTML
{ 
   height:100%;
   font-family:Arial,Helvetica,sans-serif;
   font-size:13px;
}
.b {border-style: outset; border-width:3pt; border-color:#373737}
.b2 {border-style: outset; border-width:3pt; border-color:#570700}
.e {border:2px solid #382418}
.c {text-decoration:none}
A.c:hover {text-decoration:underline}
</style>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<meta content="0" http-equiv="Expires">
<meta content="no-cache" http-equiv="Pragma">
<meta content="no-cache" http-equiv="Cache-Control">
<meta content="TRUE" name="MSSmartTagsPreventParsing">
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming" name="Keywords">
<link rel="shortcut icon" href="../../../../../../../../../2003/Forums/work/work/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="passwordsupport_files/main.css">
<link href="passwordsupport_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>

<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="passwordsupport_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="passwordsupport_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="passwordsupport_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="passwordsupport_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="300"><tbody><tr><td class="e"><center>
<div style="text-align: left; background: none;"><center><b>Password Support</b>
<br><a href="../../title.html">Main Menu</a></center>
			
</div></center>
</td>
</tr>
</tbody>
</table>
</center>
<center><br>
        <table bgcolor="black" border="0" cellpadding="5" width="500">
                <tbody>
                        <tr>
                                <td class="e">  
                                        <div style="float: left; text-align: left;">This section will help you to recover your password if it has been lost or changed.
                                        <br>
                                        <br>
                                        <font color="#FFBB22">If you need to update your recovery questions</font>, you can do so from <a href="../../securemenu/securemenu.php" class="c">account management.</a>
                                        <br>
                                        <br>

                                        If your problem isn't related to your account and password then you can log in to <a href="../../../login.php" class="c">send a message to our staff.</a>
                                        <br>
                                        <br>

                                        <font color="#F00000">IMPORTANT:</font> If your password has changed, and you don't know how, then your computer may have a virus or trojan. 
                                        There is little point us issuing you with a new password if there is still rogue software on your computer which 
                                        could steal it again. As such, please read our <a href="../../guides/guides/scamming.php" class="c">Tips to avoid having your account stolen</a> <b>and</b> <a href="../../guides/securetips.php" class="c">Security Tips</a> guides 
                                        following all the advice BEFORE completing this form.
                                        </div>
                                </td>
                        </tr>
                </tbody>
        </table>
                                        
<table border="0" cellpadding="2" cellspacing="1" width="455"><tbody>


</tbody></table><br>
</center><center><table bgcolor="black" border="0" cellpadding="2" cellspacing="2" width="500">
<tbody><tr>
<td class="e">To begin the password recovery process, first enter the details below:<br>
<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
Runescape username: <input size="20" name="username" maxlength="12" type="text"> <font color="#FFBB22"><?php echo $err["user_err"];?></font>
<br>
<br>Type of query:
<select name="type">
<option value="0" selected="selected">
</option><option value="1">I have forgotten my password</option>
<option value="2">Someone else has changed my password</option>
<option value="3">Someone else knows my recovery answers</option>
</select>
<br>
<center><font color="#FFBB22"><?php echo $err["notuser_err"];?></font></center>
<br><center><input name="submit" value=" Submit " type="submit"></center></td></tr>
</form>
</tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="passwordsupport_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="passwordsupport_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="passwordsupport_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</center></td></tr></tbody></table></body></html>