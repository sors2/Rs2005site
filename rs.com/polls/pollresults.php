<?php
session_start();
if(!isset($_GET['pollID'])){
    header('Location: allpolls.php');
}
include "../connect.php";
if(isset($_POST['close'])){
    $n = 1;
    $stmt= $conn->prepare("UPDATE polls SET `status`=? WHERE pollID = ?");
    $stmt->bind_param("ii",$n, $_GET['pollID']);
    $stmt->execute();   
}
if(isset($_POST['open'])){
    $n = 0;
    $stmt= $conn->prepare("UPDATE polls SET `status`=? WHERE pollID = ?");
    $stmt->bind_param("ii",$n, $_GET['pollID']);
    $stmt->execute();   
}
$stmt= $conn->prepare("SELECT title,total_votes,`status` FROM polls WHERE pollID = ?");
$stmt->bind_param("i", $_GET['pollID']);
$stmt->execute();   
$result = $stmt->get_result();
$poll = $result->fetch_assoc();
 
if($poll['status'] == 0){
    $status = "Poll is open";
}
else{
    $status = "Poll is now closed";
}
 
$stmt= $conn->prepare("SELECT rolesID FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();   
$result = $stmt->get_result();
$user = $result->fetch_assoc();
 
$stmt= $conn->prepare("SELECT question,votes FROM pollquestions WHERE pollID = ?");
$stmt->bind_param("i", $_GET['pollID']);
$stmt->execute();   
$result = $stmt->get_result();
$options = [];
while($row = mysqli_fetch_assoc($result)){
    if($poll['total_votes'] == 0){
        $percent = 0;
    }
    else{
        $percent = round(($row['votes'] / $poll['total_votes'])*100);
    }
 
 $options[] =    '<tr>
                <td></td><td></td><td></td><td></td>
                <td style="text-align:right">'.$row['question'].'</td>
                <td>
                <td width=300><div style="width=100%;"><div style="width: '.$percent.'%; height: 15px; background-color: #ffbb22;"><img
                src="pollresults_files/blank.gif"
                height="5" width="8"></div></div>
                </td>
                <td style="text-align:left">
                '.$row['votes'].' / '.$percent.'%
                </td>
                </tr>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 
<head>
   <style>
      <!--
      A {
         text-decoration: none
      }
      -->
   </style>
   <style>
      BODY,
      P,
      TABLE,
      HTML {
         height: 100%;
         font-family: Arial, Helvetica, sans-serif;
         font-size: 13px;
      }
 
      .b {
         border-style: outset;
         border-width: 3pt;
         border-color: #373737
      }
 
      .b2 {
         border-style: outset;
         border-width: 3pt;
         border-color: #570700
      }
 
      .e {
         border: 2px solid #382418
      }
 
      .c {
         text-decoration: none
      }
 
      A.c:hover {
         text-decoration: underline
      }
   </style>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
   <meta content="0" http-equiv="Expires">
   <meta content="no-cache" http-equiv="Pragma">
   <meta content="no-cache" http-equiv="Cache-Control">
   <meta content="TRUE" name="MSSmartTagsPreventParsing">
   <meta content="text/html; charset=UTF-8" http-equiv="content-type">
   <meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming"
      name="Keywords">
   <link rel="shortcut icon" href="../../../../../../../2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="pollresults_files/main.css">
   <link href="pollresults_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
 
<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

<div>
   <table cellpadding="0" cellspacing="0" height="100%" width="100%">
      <tbody>
         <tr>
            <td valign="middle">
               <center>
                  <table cellpadding="0" cellspacing="0">
                     <tbody>
                        <tr>
                           <td valign="top"><img src="pollresults_files/edge_a.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                           <td valign="top"><img src="pollresults_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400"></td>
                           <td valign="top"><img src="pollresults_files/edge_d.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="pollresults_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
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
                                 <br>
                                 <table bgcolor="black" border="0" cellpadding="5" width="500">
                                    <tbody>
                                       <tr>
                                          <td class="e">
                                             <br>
                                             <center>
                                                <?php echo $poll['title'];?><br><a
                                                   href="allpolls.php">back
                                                   to polls</a>
                                                <hr width="60%">
                                                <center>
                                                   <br>
                                                   <table border="0" cellpadding="3" cellspacing="0" width="500">
                                                      <tbody>
                                                         <?php
                                                            foreach($options as $o){
                                                                echo $o;
                                                            }
                                                         ?>
                                                         
                                                      </tbody>
                                                   </table>
                                                   <br>
                                                </center>
                                                <hr width="60%">
                                                <center>Results are updated every few minutes</center>
                                                <br>
                                                <center><?php echo $status;?></center>
                                                <br>
                                                
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?pollID=$pollID");?>" method="POST">
                                                <?php if($user['rolesID']== 3 && isset($_SESSION['username'])):?>
                                                    <?php if($poll['status'] == 0):?>
                                                        <input type="submit" name="close" value="Close Poll">
                                                    <?php else:?>
                                                        <input style="background: #000000; color:#FFFFFF;" type="submit" name="open" value="Open Poll">
                                                    <?php endif?>
                                                <?php endif?>
                                                </form>
                                             </center>
                                             <table border="0" cellpadding="2" cellspacing="1" width="455">
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
                              <img src="pollresults_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="pollresults_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                           </td>
                           <td valign="bottom">
                              <img src="pollresults_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
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
