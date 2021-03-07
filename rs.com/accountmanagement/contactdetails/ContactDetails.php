<?php
session_start();
include "../../connect.php";

$stmt= $conn->prepare("SELECT userID FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();   
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt= $conn->prepare("SELECT * FROM contactdetails WHERE userID= ?");
$stmt->bind_param("i", $user['userID']);
$stmt->execute();   
$result = $stmt->get_result();
$details = $result->fetch_assoc();
mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<style>
<!--
A{text-decoration:none}
-->
</style>
<style>
BODY, P, TD
{ 
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
<link rel="shortcut icon" href="../../../../../2003/Forums/work/work/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="ContactDetails_files/main.css">
<link href="ContactDetails_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="ContactDetails_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="ContactDetails_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="ContactDetails_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="ContactDetails_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
<div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
                                            <?php if (isset($_SESSION['username'])): ?>
                                                    <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
                                            <?php else : ?>
                                                    <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center>
                                            <?php endif ?>		
                                        </div></center>
</td>
</tr>
</tbody>
</table>
</center>
<center><br><table bgcolor="black" border="0" cellpadding="5" width="500"><tbody><tr><td class="e">  
 


      
      

<center><b>Your Contact Details</b></center><br><div style="float: left; text-align: left;">Use
 this page to view, update, or create contact details for your account. We may
 ask you for these details when dealing with billing or password support
 requests for your account. 
</div><br><br><table border="0" cellpadding="2" cellspacing="1" width="455">









</table><table align="center" border="0" width="275px">
  <tbody><tr width="60" align="left"><!-- Row 1 -->
     <td colspan="2" bgcolor="78A763"><font color="#000000"><b>Contact Details</b></font></td><!-- Col 1 -->
  </tr>
  <tr align="left"><!-- Row 2 -->
     <td bgcolor="CBCBCB" width="85"><font color="#000000"><b>Your name</b></font></td><!-- Col 1 -->
     <td bgcolor="CBCBCB" valign="top"><font color="#000000"><?php if(isset($details['name'])){echo $details['name'];}?></font></td><!-- Col 2 -->
  </tr>
  <tr align="left"><!-- Row 3 -->
     <td bgcolor="A7A7A7"><font color="#000000"><b>Address
	 <br></b></font></td><!-- Col 1 -->
     <td bgcolor="A7A7A7"><font color="#000000"><?php if(isset($details['address'])){echo $details['address'];}?></font></td><!-- Col 2 -->
  </tr>
  <tr align="left"><!-- Row 4 -->
     <td bgcolor="CBCBCB"><font color="#000000"><b>Post/zip code</b></font></td><!-- Col 1 -->
     <td bgcolor="CBCBCB"><font color="#000000"><?php if(isset($details['zip'])){echo $details['zip'];}?></font></td><!-- Col 2 -->
  </tr>
  <tr align="left"><!-- Row 5 -->
     <td bgcolor="A7A7A7"><b><font color="#000000">Country</font></b></td><!-- Col 1 -->
     <td bgcolor="A7A7A7"><font color="#000000"><?php if(isset($details['country'])){echo $details['country'];}?></font></td><!-- Col 2 -->
  </tr>
  <tr align="left"><!-- Row 4 -->
     <td bgcolor="CBCBCB"><font color="#000000"><b>Telephone</b></font></td><!-- Col 1 -->
     <td bgcolor="CBCBCB"><font color="#000000"><?php if(isset($details['telephone'])){echo $details['telephone'];}?></font></td><!-- Col 2 -->
  </tr>
  <tr align="left"><!-- Row 5 -->
     <td bgcolor="A7A7A7"><b><font color="#000000">Email</font></b></td><!-- Col 1 -->
     <td bgcolor="A7A7A7"><font color="#000000"><?php if(isset($details['email'])){echo $details['email'];}?></font></td><!-- Col 2 -->
  </tr>
<tr>
<td colspan="2"><center>
<br><a href="ContactDetailsEdit.php"><input value="Edit Contact Details" type="button"></a></center></td>
</tr></tbody></table></td>




	</tr>






</tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="ContactDetails_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="ContactDetails_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="ContactDetails_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>