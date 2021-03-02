<?php
    session_start();
    $banID = htmlspecialchars_decode($_GET['banID']);
    include '../../../../connect.php';

    $stmt= $conn->prepare("SELECT * FROM bandetails WHERE banID =?");
    $stmt->bind_param("i",$_GET['banID']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = mysqli_fetch_assoc($result)){
        $dt = strtotime($row["expire"]);
        $expire= date('d M Y h:i', $dt);

        $dt = strtotime($row["date"]);
        $date = date('d M Y h:i', $dt);

        $amount = $row['amount'];
        
        $stmt= $conn->prepare("SELECT username FROM users WHERE userID =?");
        $stmt->bind_param("i",$row['userID']);
        $stmt->execute();
        $result2 = $stmt->get_result();
        $user = $result2->fetch_assoc();

        $stmt= $conn->prepare("SELECT username FROM users WHERE userID =?");
        $stmt->bind_param("i",$row['ban_by']);
        $stmt->execute();
        $result3 = $stmt->get_result();
        $ban_by = $result3->fetch_assoc();
        
        $details = '<tr>
        <td width="30"></td>
        <br>
        </tr></tbody></table></center>
        <br><table width="100%"><tbody><tr>
        <td width="70%"><table width="100%">
        <tbody><tr><td width="30"></td><td align="right" width="60"><b>Username:</b></td><td width="10"></td><td>
        '.$user['username'].'
        </td></tr>
        <tr><td></td><td align="right"><b>Rule:</b></td><td></td><td>'.$row['rule'].'
        </td></tr><tr><td></td><td align="right"><b>Banned By:</b></td><td></td><td>'.$ban_by['username'].'
        </td></tr>
        <tr><td></td><td align="right"><b>Date:</b></td><td></td><td>'.$date.'
        </td></tr>';

        $message =htmlspecialchars_decode($row['note']);
        $message = '<td>'.$message.'</td>';

        $stmt= $conn->prepare("SELECT appealID FROM banappeals WHERE userID =?");
        $stmt->bind_param("i",$row['userID']);
        $stmt->execute();
        $result2 = $stmt->get_result();
        $appeal = $result2->fetch_assoc();


    }
?>

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
<link href="AdminTools_files/forum-3.css" rel="stylesheet" type="AdminTools_files/css" media="all">
</head>
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">

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


<table width=100% height=100% cellpadding=0 cellspacing=0><tr><td valign=middle><center><table cellpadding=0 cellspacing=0><tr><td valign=top><img src=../../../../messagecentre/img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td><td valign=top><img src=../../../../messagecentre/img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td><td valign=top><img src=../../../../messagecentre/img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td></tr></table><table width=600 cellpadding=0 cellspacing=0 border=0 background=../../../../messagecentre/img/background2.jpg><tr><td valign=bottom><center><table width=500 bgcolor=black cellpadding=4><tr><td class=e><center>
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

<br><center><table width=500 bgcolor=black cellpadding=4 border=0><tr><td
class=e>  
 

  
</div>
<table border="0" cellpadding="2" cellspacing="1" width="490">
<center><b>Ban Appeal - View Appeal</b></center>
<center><a href="AdminToolsBanAppealsView.php?appealID=<?php echo $appeal['appealID'];?>" class="c">Back to Ban Appeals</a></center>
<br>
<center>This player is muted for <?php echo $amount;?> hours</center><br>
<center>Ban expires on : <?php echo $expire;?> </center>
<?php

echo $details;

?>
</tbody></table></td>
<td><table width="100%">
<tbody><tr><td>
</td></tr>
</tbody></table></td>
</tr></tbody></table>
<center><table width="90%"><tbody><tr>
<?php
    echo $message;
?>
</tr>
</table><br></center>
</td></tr></table>                                                                 <table cellpadding=0 cellspacing=0>
                                                                        <tr>
                                                                                <td valign=bottom>
                                                                                        <img src=../../../../messagecentre/img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                                                                                                This webpage and its contents is copyright 2005 Jagex Ltd<br>
                                                                                                To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html" class=c>Terms+Conditions</a>  +   <a href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy policy</a>
                                                                                        </div>
                                                                                        <img src=../../../../messagecentre/img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <img src=../../../../messagecentre/img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
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
