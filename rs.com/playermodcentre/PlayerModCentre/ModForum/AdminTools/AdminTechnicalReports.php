<?php 
session_start();
include "../../../../connect.php";

if(!isset($_GET['page'])){
        $page = 1;
}
else{
        $page = $_GET['page'];
}
$result= mysqli_query($conn, "SELECT * FROM technical");
$num_per_pages = mysqli_num_rows($result);
$posts_per_page = 15;
if(mysqli_num_rows($result) > 0)
{
        $total_results  = mysqli_num_rows($result);
        $num_per_pages = ceil($total_results/$posts_per_page);
        $start_num = ($page-1) * $posts_per_page;
}
else{
        $num_per_pages  = 1;
        $start_num = 0;
}
   

$result = mysqli_query($conn,"SELECT * FROM technical ORDER BY `status` LIMIT $start_num,$posts_per_page");
$bans=[];
while($row = mysqli_fetch_assoc($result))
{   
   $stmt = $conn->prepare("UPDATE technical SET `page` = ? WHERE techID = ?");
   $stmt->bind_param("ii", $page,$row['techID']);
   $stmt->execute(); 

    $stmt = $conn->prepare("SELECT username FROM users WHERE userID =?");
    $stmt->bind_param("i",$row['userID']);
    $stmt->execute();
    $result2 = $stmt->get_result();
    $user = $result2->fetch_assoc();

    $date = strtotime($row['date']);
    $date_format = date('d M Y', $date);

    $status = "Pending";
    if($row['status'] == 1){
        $status = "Squashed";
    }

    
    $bans[]= '<tr>
                <td align="left" width="100px">'.$user['username'].'
                <td align="left" width="200px">'.$date_format.'</td>
                <td align="left" width="200px">'.$row['title'].'</td>
                <td align="left" width="100px">'.$status.'</td>
                <td></td><!-- Col 4 -->
                <td align="right"><a href="AdminTechnicalReportView.php?techID='.$row['techID'].'">View</a></td><!-- Col 5 -->
                </tr>';
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
<link rel="shortcut icon" href="../../../../../../../../../../2003/Forums/work/work/favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="AdminToolsReports&amp;MarkedMessages_files/main.css">
<link href="AdminToolsReports&amp;MarkedMessages_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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


<table cellpadding="0" cellspacing="0" height="100%" width="100%"><tbody><tr><td valign="middle"><center><table cellpadding="0" cellspacing="0"><tbody><tr><td valign="top"><img src="AdminToolsReports&amp;MarkedMessages_files/edge_a.jpg" height="43" hspace="0" vspace="0" width="100"></td><td valign="top"><img src="AdminToolsReports&amp;MarkedMessages_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400"></td><td valign="top"><img src="AdminToolsReports&amp;MarkedMessages_files/edge_d.jpg" height="43" hspace="0" vspace="0" width="100"></td></tr></tbody></table><table background="AdminToolsReports&amp;MarkedMessages_files/background2.jpg" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td valign="bottom"><center><table bgcolor="black" cellpadding="4" width="500"><tbody><tr><td class="e"><center>
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
<center><br><table bgcolor="black" border="0" cellpadding="5" width="500"><tbody><tr><td class="e">  
 

<div style="height:5px;"></div><center><img src="../PlayerModTools/PlayerModQuote_files/refresh.png" width="13" height="13" alt="" title="" /> <b>Admin Tools - Technical Reports</b>
<br><a href="AdminTools.php">Back to Admin Tools</a></center>
<br><div style="float:left; text-align:left;"><b>Technical Reports:</b>
<table style="height:100px" border="0" width="500px">
  <tbody>
  <tr><!-- Row 1 -->
                <td align="left" width="100px"><b>Username</b></td>
                <td align="left" width="100px"><b>Date</b></td>
                <td align="left" width="300px"><b>Title</b></td>
                <td align="left" width="100px"><b>Status</b></td>
    </tr>
      <?php 
        foreach($bans as $b){
            echo $b;
        }
      ?>
</tbody></table>
   <center><table border="0" width="233px">
  <tbody>
  <tr><!-- Row 1 -->
  <?php
        $next = $page + 1;
        $prev = $page - 1;
        if($num_per_pages == $page && $page > 1)
        {
                echo '<br><div style="margin-bottom: 4%; margin-top: 1%; padding-left:30%;"><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?page=1"> <img src="AdminToolsReports&amp;MarkedMessages_files/first.png" width="26" height="13" alt="" title="" /></a></span><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=' . $prev . '"> <img src="AdminToolsReports&amp;MarkedMessages_files/previous.png" width="26" height="13" alt="" title="" /> </a></span><span style="float:left; margin-left:2%;"> page </span><span style="float: left; text-align: center; border :2px solid rgb(222,222,222); border-style: inset; margin-left: 1%; margin-right: 1%; width: 6%;">' . $page . '</span><span style="float : left" >of '.$num_per_pages.'</span></div>';     
        }
        elseif($page == 1)
        {
                if($num_per_pages > 1)
                {
                        echo '<br><div style=" margin-bottom: 4%; padding-left:40%; margin-top: 1%;"><span style="float:left; margin-left:2%;"> page </span><span style="float: left; text-align: center; border :2px solid rgb(222,222,222); border-style: inset; margin-left: 1%; margin-right: 1%; width: 6%;">' . $page . '</span><span style="float : left" >of '.$num_per_pages.'</span><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=' . $next . '"><img src="AdminToolsReports&amp;MarkedMessages_files/next.png" width="26" height="13" alt="" title="" /></a></span><span style="float: left; text-align: center; margin-left: 3%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=' . $num_per_pages. '"><img src="AdminToolsReports&amp;MarkedMessages_files/last.png" width="26" height="13" alt="" title="" /></a></span></div>'; 
                }
                else{
                        echo '<br><div style="margin-bottom: 4%; margin-top: 1%;"><span style="float:left; margin-left:40%; ">page </span><span style="float: left; text-align: center; border :2px solid rgb(222,222,222); border-style: inset; margin-left: 1%; margin-right: 1%; width: 5%;">' . $page . '</span><span style="float : left" >of '.$num_per_pages.'</span></div>';
                }
        }       
        else{
                echo '<br><div style=" margin-bottom: 4%; padding-left:30%; margin-top: 1%;"><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=1"><img src="AdminToolsReports&amp;MarkedMessages_files/first.png" width="26" height="13" alt="" title="" /></a></span><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=' . $prev . '"> <img src="AdminToolsReports&amp;MarkedMessages_files/previous.png" width="26" height="13" alt="" title="" /> </a></span><span style="float:left; margin-left:2%;"> page </span><span style="float: left; text-align: center; border :2px solid rgb(222,222,222); border-style: inset; margin-left: 1%; margin-right: 1%; width: 6%;">' . $page . '</span><span style="float : left" >of '.$num_per_pages.'</span><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=' . $next . '"><img src="AdminToolsReports&amp;MarkedMessages_files/next.png" width="26" height="13" alt="" title="" /></a></span><span style="float: left; text-align: center; margin-left: 1%; margin-right: 1%; width: 6%;"><a style =" margin-bottom: 10%; " href="AdminTechnicalReports.php?&page=' . $num_per_pages. '"><img src="AdminToolsReports&amp;MarkedMessages_files/last.png" width="26" height="13" alt="" title="" /></a></span></div>';     
        }
?>
    </tr>
</tbody></table>   

<table border="0" cellpadding="2" cellspacing="1" width="455">







</table></center></div></td>




	</tr>






</tbody></table><br></center>
</td></tr></tbody></table>                                                                 <table cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td valign="bottom">
                                                                                        <img src="AdminToolsReports&amp;MarkedMessages_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                                                        
                        This webpage and its contents is copyright 2005 
Jagex Ltd<br>
                                                                        
                        To use our service you must agree to our <a href="../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html" class="c">Terms+Conditions</a>  +   <a href="../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html" class="c">Privacy policy</a>
                                                                                        </div>
                                                                                        <img src="AdminToolsReports&amp;MarkedMessages_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                                                                                </td>
                                                                                <td valign="bottom">
                                                                                        <img src="AdminToolsReports&amp;MarkedMessages_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                                                                                </td>
                                                                        </tr>
                                                                </tbody></table>
</center></td></tr></tbody>
</table>







</body></html>