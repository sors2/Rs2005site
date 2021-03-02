<?php
session_start();
$err = array("poll_error" => "", "title_error" => "");
if(isset($_POST['submit'])){
        if(empty($_POST['q1']) && empty($_POST['q2']) && empty($_POST['q3']) && empty($_POST['q4']) && empty($_POST['q5']) && empty($_POST['q6'])
         && empty($_POST['q7']) && empty($_POST['q8']) && empty($_POST['q9'])){
                $err['poll_error'] = "Choose at least one option.";
        }
        elseif(empty($_POST['title'])){
                $err['title_error'] = "Must choose a title.";
        }
        else{
                include "../../../../connect.php";
                $stmt = $conn->prepare("INSERT INTO polls (title) VALUES (?)");
                $stmt->bind_param("s",$_POST['title']);
                $stmt->execute();
                $last_id = $conn->insert_id;
  
                $options=[];
                $options[] = $_POST['q1'];
                $options[] = $_POST['q2'];
                $options[] = $_POST['q3'];
                $options[] = $_POST['q4'];
                $options[] = $_POST['q5'];
                $options[] = $_POST['q6'];
                $options[] = $_POST['q7'];
                $options[] = $_POST['q8'];
                $options[] = $_POST['q9'];
                $results=[];
                for($i = 0; $i < sizeof($options); $i++){
                        if(!empty($options[$i])){
                                $question = $options[$i];
                                $stmt = $conn->prepare("INSERT INTO pollquestions (pollID,question) VALUES (?,?)");
                                $stmt->bind_param("is",$last_id,$question);
                                $stmt->execute();
                        }
                        
                }
        }
}
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
<link rel="shortcut icon" href="../../../../Forums/Forums/ForumThread/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="AdminTools_files/main.css">
<link href="AdminTools_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="AdminTools_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="AdminTools_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="AdminTools_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="AdminTools_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
<div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
<?php if (isset($_SESSION['username'])): ?>
        <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
<?php else : ?>
        <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center>
<?php endif ?>
		
</center>
</td>
</tr>
</tbody>
</table>
</center>
<br>

<br><center><table bgcolor="black" border="0" cellpadding="4" width="500"><tbody><tr><td class="e"> <center><b>Scape05 - View All Users<b>
<br><b>Admin Tools</b>
<br><a href="AdminTools.php" class="c">Back to Admin Tools</a><br>
 </div>
 <br>
 <table border="0" width="100%">
    <tbody>
        <tr><!-- Row 1 -->
            <td class="e" align="center" style="padding-top:1em; padding-bottom:1em;">
            <center><b>Add options for the new poll</b></center><br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                Choose a title: <input name="title" value="" size=50><br><br><br>
                Option1: <input name="q1" value="" size =20><br><br>
                Option2: <input name="q2" value="" size =20><br><br>
                Option3: <input name="q3" value="" size =20><br><br>
                Option4: <input name="q4" value="" size =20><br><br>
                Option5: <input name="q5" value="" size =20><br><br>
                Option6: <input name="q6" value="" size =20><br><br>
                Option7: <input name="q7" value="" size =20><br><br>
                Option8: <input name="q8" value="" size =20><br><br>
                Option9: <input name="q9" value="" size =20><br><br>
                <center><b>NOTE:</b> This will overwrite the latest poll currently</center><br>
                <input style="background: #000000; color:#FFFFFF;" type="submit" name="submit" value="Add Poll">
                </form>
            </td>
        </tr>
    </tbody>
</table>
<br>
<center><a href="AdminTools.php" class="c">Back to Admin Tools</a>
<br>
<center>

 
 
 <div style="clear: both;"></div>
                                            
</center></center></center></td></tr></tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="AdminTools_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="../../../../Forums/Forums/ForumThread/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="../../../../Forums/Forums/ForumThread/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="AdminTools_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="AdminTools_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>