<?php session_start();?>

<html>
<head>
<STYLE>
<!--
A{text-decoration:none}
-->
</STYLE>
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<meta content="0" http-equiv="Expires">
<meta content="no-cache" http-equiv="Pragma">
<meta content="no-cache" http-equiv="Cache-Control">
<meta content="TRUE" name="MSSmartTagsPreventParsing">
<meta content="text/html;charset=ISO-8859-1" http-equiv="content-type">
<meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming" name="Keywords">
<link rel="shortcut icon" href="favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="css/main.css">
<link href="css/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">

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

<table width=100% height=100% cellpadding=0 cellspacing=0><tr><td valign=middle><center><table cellpadding=0 cellspacing=0><tr><td valign=top><img src=img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td><td valign=top><img src=img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td><td valign=top><img src=img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td></tr></table><table width=600 cellpadding=0 cellspacing=0 border=0 background=img/background2.jpg><tr><td valign=bottom><center><table width=500 bgcolor=black cellpadding=4><tr><td class=e><center>
<div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
                                            <?php if (isset($_SESSION['username'])): ?>
                                                    <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
                                            <?php else : ?>
                                                    <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center>
                                            <?php endif ?>		
                                        </div>
</center>
</td>
</tr>
</tbody>
</table>
</center>
<br>
<br><center><table width=500 bgcolor=black cellpadding=4 border=0><tr><td
class=e>  
<br>
<center><b><b><font color="#FFBB22">You have successfully changed your password details on this account.</font></b></b></center>
<br>
<br>We strongly advise that you read our <a href="../../guides/securetips.html" class="c">Security Tips Guide</a> then <b>once you are sure that your account is secure</b>
<a href="changeyourpassword.php" class="c">change your password here</a> to secure your account.
<br>
<br>To return to secure menu click <a href="../../securemenu/securemenu.php">here</a>



</table><br></center>
</td></tr></table>                                                                 <table cellpadding=0 cellspacing=0>
                                                                        <tr>
                                                                                <td valign=bottom>
                                                                                        <img src=img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                                                                                                This webpage and its contents is copyright 2005 Jagex Ltd<br>
                                                                                                To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html" class=c>Terms+Conditions</a>  +   <a href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy policy</a>
                                                                                        </div>
                                                                                        <img src=img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <img src=img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
                                                                                </td>
                                                                        </tr>
                                                                </table>
</tbody>
</table>
</center>
</td>
</tr>
</tbody>
</table>
</body>
</html>
</html>