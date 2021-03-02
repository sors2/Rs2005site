<?php

session_start();
    include "../../../../connect.php";
    $users = '<select style="width=10%;" name="users"><option selected="selected" value="selected">Find User...</option>';
    $result = mysqli_query($conn,"SELECT username FROM users");
    while($row = mysqli_fetch_assoc($result))
    {   
        $users = $users . '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
    $viewed_user= "";
    $selected_user="";
    $users = $users . '</selected>';
?>
<?php
 $result = mysqli_query($conn,"SELECT username,date_created,last_activity FROM users LIMIT 10");
 while($row = mysqli_fetch_assoc($result))
 {   
    $details[]= '<tr">
                <td align="left">'.$row['username'].'
                <td align="left" width="150px">'.$row['date_created'].'</td>
                <td align="left" width="150px">'.$row['last_activity'].'</td>
                <td></td><!-- Col 3 -->
                <td></td><!-- Col 4 -->
                <td align="right"><a href="../Profile/ForumProfile.php?user='.$row['username'].'">View</a></td><!-- Col 5 -->
                </tr>';
            }
?>

<?php
if(isset($_POST['view'])){
  
    $stmt = $conn->prepare("SELECT username,date_created,last_activity FROM users WHERE username = ?");
    $stmt->bind_param("s",$_POST['users']);
    $stmt->execute();
    $result = $stmt->get_result();
    $view = $result->fetch_assoc();
    $viewed_user = '<td class = e>
                    <table width=100%>
                    <tbody>
                    <tr>
                    <td align="left"><b>Username</b></td>
                    <td align="left" width="200px"><b>Creation Date</b></td>
                    <td align="left" width="100px"><b>Last Activity</b></td>
                    <td></td>
                    <tr>
                    </tr>
                    <tr>
                    <td align="left">'.$view['username'].'
                    <td align="left" width="150px">'.$view['date_created'].'</td>
                    <td align="left" width="150px">'.$view['last_activity'].'</td>
                    <td></td><!-- Col 3 -->
                    <td></td><!-- Col 4 -->
                    <td align="right"><a href="../Profile/ForumProfile.php?user='.$view['username'].'">View</a></td><!-- Col 5 -->
                    </tr>
                    </tbody>
                    </table>
                    </td>';
    $selected_user = '<b>Details on '.$view['username'].'</b>';
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
        <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center><?php endif ?>
		
</center>
</td>
</tr>
</tbody>
</table>
</center>
<br>

<br><center><table bgcolor="black" border="0" cellpadding="4" width="500"><tbody><tr><td class="e"> <center><b>Scape05 - View All Users<b>
<br><b>Admin Tools</b>
<br><a href="AdminTools.php" class="c">Back to Admin Tools</a>
<br>
<br>Select a user to view their profile:
<br>



 </div>
 <br>
 <table border="0" width="100%">
  <tbody><tr><!-- Row 1 -->
     <td class="e" align="center" style="padding-top:1em; padding-bottom:1em;">
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
     <?php 
        echo $users;
     ?><input type="submit" style="background: #000000; color:#FFFFFF; margin-left:1em;" value="View" name="view">
     </form>
     </td><!-- Col 1 -->
     </tr>
     </tbody>
</table>
<br>
     <?php echo $selected_user;?>
     
     <table border="0" width="100%" style="margin-top:1em;">
  <tbody><tr>
  <?php echo $viewed_user?>
  </tr>
  </tbody>
  </table>
 <table  width="100%" style="margin-top:1em; id ="contents">
  <tbody style="border-right: #382418 2px solid;
  border-top: #382418 2px solid;
  border-left: #382418 2px solid;
  border-bottom: #382418 2px solid;">
  <tr><!-- Row 1 -->
                <td class="contents" align="left"><b>Username</b></td>
                <td align="left" width="200px"><b>Creation Date</b></td>
                <td align="left" width="100px"><b>Last Activity</b></td>
                <td></td>
    </tr>
    <?php
        foreach($details as $d){
            echo $d;
        }
    ?>
</tbody></table>
  
 <br>
  <center><a href="AdminTools.php" class="c">Back to Admin Tools</a>
<br>
<center>
<br><font color="#888888">Quick find code: 1-2-1234-12345</font>
 
 
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