<?php 
session_start();
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
<link rel="shortcut icon" href="file:///C:/Users/XPS/Desktop/rs-website/2005/work/Rev1/SecureServices/SecureMenu/SecureMenuCategories/Forums/Forums/ForumOptions/UserProfile/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="Admintoolsforumprofile_files/main.css">
<link href="Admintoolsforumprofile_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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


<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="Admintoolsforumprofile_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="Admintoolsforumprofile_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="Admintoolsforumprofile_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="Admintoolsforumprofile_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
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
<br><center><table bgcolor="black" border="0" cellpadding="4" width="500"><tbody><tr><td class="e">  
  <center><b>Forum Profile - Username</b>
  <br><a href="file:///C:/Users/XPS/Desktop/rs-website/2005/work/Rev1/SecureServices/SecureMenu/SecureMenuCategories/Forums/Forums/ForumOptions/UserProfile/backtoforums">Back to admin tools</a>
  <br><div style="text-align: left; background: none;">
  <br><b>Forum Moderator Tools:</b>
  <br><a href="file:///C:/Users/XPS/Desktop/rs-website/2005/work/Rev1/SecureServices/SecureMenu/SecureMenuCategories/Forums/Forums/ForumOptions/UserProfile/muteban">Mute/Ban</a>
  <br><b><font color="#FFFFFF"></font></b><font color="#FFFFFF">

<br><b>This user has made 1 posts; 0.00 per day. 
<br><input class="" name="jump" value="Turn Off Smileys" type="submit">
<br>
<br>Threads posted in by Username:</b>
<br>
<br>
<table border="0" width="490px">
  <tbody><tr><!-- Row 1 -->
     <td align="left"><b>Status</b></td><!-- Col 1 -->
     <td align="left" width="40%"><b>Thread</b></td><!-- Col 2 -->
     <td align="left"><b>Forum</b></td><!-- Col 3 -->
     <td align="center" width="20%"><b>Last post</b></td><!-- Col 4 -->
     <td></td><!-- Col 5 -->
  </tr>
  <tr><!-- Row 2 -->
     <td align="left"><img src="Admintoolsforumprofile_files/locked.png" alt="" title="" height="13" width="13"> Locked 
	 <br><img src="Admintoolsforumprofile_files/stickied.png" alt="" title="" height="13" width="13"> Stickied</td><!-- Col 1 -->
     <td align="left" width="40%"><a href="http://www.06scape.com/title.ws">Changing Screen Resolution?</a></td><!-- Col 2 -->
     <td align="left"><a href="http://www.06scape.com/title.ws">Tech Support</a></td><!-- Col 3 -->
     <td align="center" width="20%">2006-01-06 19:01:42</td><!-- Col 4 -->
     <td><a href="http://www.06scape.com/title.ws">View</a></td><!-- Col 5 -->
  </tr>
</tbody></table>



</font></div></center></td></tr></tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="Admintoolsforumprofile_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="file:///C:/Users/XPS/Desktop/rs-website/2005/work/Rev1/SecureServices/SecureMenu/SecureMenuCategories/Forums/Forums/ForumOptions/UserProfile/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="file:///C:/Users/XPS/Desktop/rs-website/2005/work/Rev1/SecureServices/SecureMenu/SecureMenuCategories/Forums/Forums/ForumOptions/UserProfile/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="Admintoolsforumprofile_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="Admintoolsforumprofile_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>