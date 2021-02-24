<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    session_start();
    include '../connect.php';
 
    if(!isset($_GET['page'])){
        $page = 1;
    }
    else{
            $page = $_GET['page'];
    }
 
    $stmt = $conn->prepare("SELECT userID FROM users WHERE username =?");
    $stmt->bind_param("s",$_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
 
    $stmt = $conn->prepare("SELECT * FROM messagecentre WHERE toID = ?");
    $stmt->bind_param("s",$user['userID']);
    $stmt->execute();
    $result = $stmt->get_result();
 
    $posts_per_page = 15;
    if(mysqli_num_rows($result) > 0)
    {
            $total_results  = mysqli_num_rows($result);
            $num_per_pages = ceil($total_results/$posts_per_page);
    }
 
    $num_per_pages = 1;
   $start_num = ($page-1) * $posts_per_page;
 
   $n = 0;
   $stmt = $conn->prepare("SELECT * FROM messagecentre WHERE toID = ? AND `remove` = ? LIMIT $start_num,$posts_per_page");
   $stmt->bind_param("ii",$user['userID'],$n);
   $stmt->execute();
   $result = $stmt->get_result();
   $messages = [];
   while($row = mysqli_fetch_array($result)){
        $dt = strtotime($row["message_date"]);
        $date = date('d M Y', $dt);
        $messages[] =  '<tr> <!-- Row 1 -->
                        <td width="5px;"></td>
                        <!-- Col 1 -->
                        <td><img class="imiddle" title="last" alt="last"
                            src="msgcenter_files/thread.png" border="0" height="13"
                            hspace="0" width="13"></td>
                        <!-- Col 2 -->
                        <td></td>
                        <!-- Col 3 -->
                        <td height="3px;" style="width:85px;">'.$date.'</td>
                        <!-- Col 4 -->
                        <td></td>
                        <!-- Col 5 -->
                        <td width="195px;"><a href="viewmessage.php?messageID='.$row['messageID'].'" class=c>'.$row['subject'].'</a></td>
                        <!-- Col 6 -->
                        <td width="45px;"></td>
                        <!-- Col 7 -->
                        <td align="center">
                        <div style="margin-left:-5px; position: static;"><a href="deletemessage.php?messageID='.$row['messageID'].'"><img
                                src="msgcenter_files/delete.png" width="18" height="11"
                                alt="" title="" /></a></div>
                        </td>
                        <!-- Col 8 -->
                        <td width="45px;"></td>
                        <!-- Col 9 -->
                        </tr>';
   }
 
 
?>
 
<html>
 
<head>
   <style>
      <!--
      A {
         text-decoration: none
      }
      -->
   </style>
   <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
   <meta content="0" http-equiv="Expires">
   <meta content="no-cache" http-equiv="Pragma">
   <meta content="no-cache" http-equiv="Cache-Control">
   <meta content="TRUE" name="MSSmartTagsPreventParsing">
   <meta content="text/html; charset=windows-1252" http-equiv="content-type">
   <meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming"
      name="Keywords">
   <link rel="shortcut icon" href="../RuneScape_website/RS.com/aff/runescape/messagecentre/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="msgcenter_files/main.css">
   <link href="msgcenter_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
 
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">
<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>
   <table cellpadding="0" cellspacing="0" height="100%" width="100%">
      <tbody>
         <tr>
            <td valign="middle">
               <center>
                  <table cellpadding="0" cellspacing="0">
                     <tbody>
                        <tr>
                           <td valign="top"><img src="msgcenter_files/edge_a.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                           <td valign="top"><img src="msgcenter_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400"></td>
                           <td valign="top"><img src="msgcenter_files/edge_d.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="msgcenter_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
                     width="600">
                     <tbody>
                        <tr>
                           <td valign="bottom">
                              <center>
                                 <table bgcolor="black" cellpadding="4" width="500">
                                    <tbody>
                                       <tr>
                                          <td class="e">
                                             <center>
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
                              <center>
                                 <br><br>
                                 <table bgcolor="black" border="0" cellpadding="4" width="500">
                                    <tbody>
                                       <tr>
                                          <td class="e">
                                             <center><b>Index of messages from Jagex</b></center>
                                             <br>
                                             <table border="0" cellpadding="2" cellspacing="1" width="490">
                                             </table>
                                             <center>
                                             </center>
                                             <table align="center" border="0" width="50%">
                                                <tbody>
                                                   <tr>
                                                   <center>
                                                   <?php
                                                        $u = $_SESSION['username'];
                                                        $next = $page + 1;
                                                        $prev = $page - 1;
                                                        if($num_per_pages == $page && $page > 1)
                                                        {
                                                                echo '<a href="messagecentre.php?user='.$u.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="messagecentre.php?user='.$u.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="messagecentre.php?user='.$u.'&page=' . $next. '"><img src="" width="26" height="13" alt="" title="" /> </a><a href="messagecentre.php?user='.$u.'&page=' . $num_per_pages. '"><img src="" width="26" height="13" alt="" title="" /></a>';     
                                                        }
                                                        elseif($page == 1)
                                                        {
                                                                if($num_per_pages > 1)
                                                                {
                                                                        echo '<img src="" width="26" height="13" alt="" title="" />page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.' <a href="messagecentre.php?user='.$u.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="messagecentre.php?user='.$u.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>'; 
                                                                }
                                                                else{
                                                                        echo 'page <input size="3" id="uid" value="' . $page .'"> of '.$num_per_pages.'';
                                                                }
                                                        }       
                                                        else{
                                                            echo '<a href="messagecentre.php?user='.$u.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="messagecentre.php?user='.$u.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="messagecentre.php?user='.$u.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="messagecentre.php?user='.$u.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>';     
                                                        }
                                                    ?>
                                                    </center>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <br>
                                             <table style="height:35px;" bgcolor="black" cellpadding="2" width="500">
                                                <tbody>
                                                   <tr>
                                                      <!-- Row 1 -->
                                                      <td></td>
                                                      <!-- Col 1 -->
                                                      <td class="b" align="center"
                                                         background="msgcenter_files/stoneback.gif" bgcolor="#474747"
                                                         width="115px;">Date</td>
                                                      <!-- Col 2 -->
                                                      <td></td>
                                                      <!-- Col 3 -->
                                                      <td class="b" align="center"
                                                         background="msgcenter_files/stoneback.gif" bgcolor="#474747"
                                                         width="245px;">Message Subject</td>
                                                      <!-- Col 4 -->
                                                      <td></td>
                                                      <!-- Col 5 -->
                                                      <td class="b" align="center"
                                                         background="msgcenter_files/stoneback.gif" bgcolor="#474747"
                                                         width="96px;">Action</td>
                                                      <!-- Col 6 -->
                                                      <td></td>
                                                      <!-- Col 7 -->
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <div style="margin-top:5px"></div>
                                             <table border="0" bgcolor="black" cellpadding="2" width="500">
                                                   <?php
                                                        if(isset($messages)){
                                                            foreach($messages as $m){
                                                                echo $m;
                                                            }
                                                        }
                                                   ?>                                               
                                             </table>
                                             <table>
                                                <tbody>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <br>
                              </center>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <table cellpadding="0" cellspacing="0">
                     <tbody>
                        <tr>
                           <td valign="bottom">
                              <img src="msgcenter_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="../RuneScape_website/RS.com/aff/runescape/messagecentre/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="../RuneScape_website/RS.com/aff/runescape/messagecentre/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="msgcenter_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                           </td>
                           <td valign="bottom">
                              <img src="msgcenter_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </center>
            </td>
         </tr>
      </tbody>
   </table>
</body>
 
</html>
