<?php
session_start();
echo date("d-m-Y H:i:s");
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
<link rel="shortcut icon" href="file:///C:/Users/XPS/Desktop/rs-website/2003/Forums/work/work/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="Admintoolsforumprofileoptions_files/main.css">
<link href="Admintoolsforumprofileoptions_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../../../../frame_files/lock.gif">
        </div>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../../../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../../../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
    </div>
<div>

<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="Admintoolsforumprofileoptions_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="Admintoolsforumprofileoptions_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="Admintoolsforumprofileoptions_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="Admintoolsforumprofileoptions_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
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
		
</div></center>
</td>
</tr>
</tbody>
</table>
</center>
<center><br><table bgcolor="black" border="0" cellpadding="5" width="500"><tbody><tr><td class="e">  
 

<center><b>Forum Profile - <?php echo $_GET['user'];?> - Admin Tools</b>
<br><a href="../PlayerModTools/PlayerModForumProfile.php?user=<?php echo $_GET['user'];?>">Back to forum profile</a></center>
<br>
<br><div style="float:left; text-align:left;"><b>Mute:
<br>
<form action="ProcessBan.php?user=<?php echo $_GET['user'];?>" method="POST">
<br></b>Mark to unmute user <input type="checkbox">
<br>
<br>
Mute length: <select name="duration1"><option selected="selected">4</option><option>8</option><option>16</option><option>32</option><option>48</option></select> hours
<br>
<br>
<select name = "rule1"><option selected="selected">Choose an option</option><option>This is awesome, check it out!</option><option>Flaming</option><option>Ignoring Forum Specific Rules</option><option>Encouraging other to break the rules</option><option>Scamming and staff impersonation</option><option>Real-life issues / breaking real-world laws</option><option>Scam/hack websites (malicious intent)</option><option>Seriously offensive or threatening language</option><option>Sharing or requesting personal information</option>Option<option></option></select>
<br>
<br><b>&emsp;Give a brief reason why this user is being muted.</b>
<br>
<br>
<textarea style="width: 100%; height: 150px; background-color:#FFFFFF; color:#000000" name="note1"></textarea>
<input value="Mute" name="mute" type="submit">
<br>
<br><b>Ban:</b>
<br>
<br>Mark to unban user <input type="checkbox">
<br>
<br>Ban from forums: <select name="duration2"><option selected="selected">4</option><option>8</option><option>16</option><option>32</option><option>48</option><option>72</option><option>96</option><option>permanent</option></select> hours
<br>
<br>Rule breached: <select name="rule2"><option selected="selected">Choose rule...</option>
<option>Offensive Language</option>
<option>ItemScamming</option>
<option>Password Scamming</option>
<option>Cheating/Bug Abuse</option>
<option>Scape05 Staff impersonations</option>
<option>Account Sharing/Trading</option>
<option>Macroing</option>
<option>Multiple Logging In</option>
<option>Encouraging Others to Break Rules</option>
<option>Misuse Of Customer Support</option>
<option>Advertising/Website</option>
<option>Real World Item Trading</option>
</select>
<br>
<br>
<b>&emsp;Give a brief reason why this user is being banned.</b>
<br>
<br>
<textarea style="width: 100%; height: 150px; background-color:#FFFFFF; color:#000000" name="note2"></textarea>
<br><input value="Ban" name="ban" type="submit"></div>
</form>
</td>
</tr>
</tbody>
</table> 
      

<table border="0" cellpadding="2" cellspacing="1" width="455">







</tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="Admintoolsforumprofileoptions_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="file:///C:/Users/XPS/Desktop/rs-website/2003/Forums/work/work/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="file:///C:/Users/XPS/Desktop/rs-website/2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="Admintoolsforumprofileoptions_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="Admintoolsforumprofileoptions_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>