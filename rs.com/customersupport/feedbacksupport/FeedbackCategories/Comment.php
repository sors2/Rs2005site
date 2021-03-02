<?php
session_start();
if(isset($_POST['submit'])){
        include "../../../connect.php";
        $message = nl2br(htmlspecialchars($_POST['message']));

        $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
        $stmt->bind_param("s",$_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();;

        $category = "Comments";
        $date = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("INSERT INTO feedback (category, userID,`message`) VALUES (?,?,?)");
        $stmt->bind_param("ssis", $category, $date, $user['userID'],$message);
        $stmt->execute();

        header("Location: QuerySubmit.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript">
function textLengthText(){
        var text = document.getElementById("charlimit_text").value;
        var length = 1500 - text.length;
        document.getElementById("charlimit_count").innerHTML = length;
}
</script>
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
<link rel="shortcut icon" href="../../../../../../../../../../2003/Forums/work/work/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="Comment_files/main.css">
<link href="Comment_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../../../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../../../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>

<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="Comment_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="Comment_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="Comment_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="Comment_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
<div style="text-align: left; background: none;"><center><b>Secure Services</b> 
- You are <?php if (isset($_SESSION['username'])):?>logged in as <font color="#ffbb22"><?php echo $_SESSION['username'];?></font><b>
<br>Click the links by the top-left padlock for secure menu or logout</b></center>
<?php else :?> logged in as <font color="#ffbb22"><?php echo $_SESSION['username'];?></font><b>
<br>Click the links by the top-left padlock for secure menu or login</b></center>
<?php endif?>
		
			
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
                <div style="float: left; text-align: left;">Use this form to comment on our game, or for other comments you may have.
                <br>If your query is not a comment, please <a href="../Feedback.php" class="c">select another category</a>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <br>Your comment:
                <br><textarea style="width:500px; height:150px;" id="charlimit_text" name="message" onkeyup="textLengthText();"></textarea>
                <br><center>You have <span id="charlimit_count" style="display: inline;">1500</span> characters remaining for your message...
                <br><input value="Submit Query" type="submit" name = "submit"></center>
                </div>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<table border="0" cellpadding="2" cellspacing="1" width="455"></td>




	</tr>






</tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="Comment_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="Comment_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="Comment_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>