<?php
    session_start();
    include '../connect.php';
 
    $messageID = $_GET['messageID'];
    $stmt= $conn->prepare("SELECT * FROM messagecentre WHERE messageID =?");
    $stmt->bind_param("i",$messageID);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = $result->fetch_assoc();
 
    $n = 1;
    $stmt= $conn->prepare("UPDATE messagecentre SET flag = ? WHERE messageID =?");
    $stmt->bind_param("ii",$n,$messageID);
    $stmt->execute();
 
    $dt = strtotime($message["message_date"]);
    $date = date('d M Y h:i', $dt);
    $from_user = $message['fromID'];
        
    if($from_user != 0){
      $stmt= $conn->prepare("SELECT username FROM users WHERE userID =?");
      $stmt->bind_param("i",$from_user);
      $stmt->execute();
      $result = $stmt->get_result();
      $from = $result->fetch_assoc();
    }
    else{
       $from['username'] = "Jagex";
    }

    $message_filtered = htmlspecialchars_decode($message['message']);
    
?>
<html>
 
<head>
   <STYLE>
      <!--
      A {
         text-decoration: none
      }
      -->
   </STYLE>
   <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
   <meta content="0" http-equiv="Expires">
   <meta content="no-cache" http-equiv="Pragma">
   <meta content="no-cache" http-equiv="Cache-Control">
   <meta content="TRUE" name="MSSmartTagsPreventParsing">
   <meta content="text/html;charset=ISO-8859-1" http-equiv="content-type">
   <meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming"
      name="Keywords">
   <link rel="shortcut icon" href="favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="../../css/main.css">
   <link href="../../css/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
 
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">

   <table width=100% height=100% cellpadding=0 cellspacing=0>
      <tr>
         <td valign=middle>
            <center>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=top>
					 <img src="../../img/edge_a.jpg" width=100 height=42 hspace=0 vspace=0></td>
                     <td valign=top>
					 <img src="../../img/edge_c.jpg" width=400 height=42 hspace=0 vspace=0></td>
                     <td valign=top>
					 <img src="../../img/edge_d.jpg" width=100 height=42 hspace=0 vspace=0></td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=../../img/background2.jpg>
                  <tr>
                     <td valign=bottom>
                        <center>
                           <table width=500 bgcolor=black cellpadding=4>
                              <tr>
                                 <td class=e>
                                    <center>
                                        <div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
                                            <?php if (isset($_SESSION['username'])): ?>
                                                    <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
                                            <?php else : ?>
                                                    <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center>
                                            <?php endif ?>		
                                        </div>
                                 </td>
                              </tr>
                              </tbody>
                           </table>
                        </center>
                        <br>
                        <br>
                        <center>
                           <table width=500 bgcolor=black cellpadding=4 border=0>
                              <tr>
                                 <td class=e>
                                    </div>
                                    <table border="0" cellpadding="2" cellspacing="1" width="490">
                                       <center><b>Message Centre - View Message (from Jagex)</b></center>
                                       <center><a href="messagecentre.php" class="c">Back to Inbox (from Jagex)</a>
                                       </center>
                                       <br>
                                       <table border="0" align="center" width="50%">
                                          <tr>
                                             <!-- Row 1 -->
                                             <td><img class="imiddle" title="first" alt="first" src="../../img/first.png"
                                                   hspace="0" height="13" border="0" width="26"></td><!-- Col 1 -->
                                             <td><img class="imiddle" title="previous" alt="previous"
                                                   src="../../img/previous.png" hspace="0" height="13" border="0" width="26">
                                             </td><!-- Col 2 -->
                                             <td>page <input size="3" id="uid" value="1"> of 3</td><!-- Col 3 -->
                                             <td><img class="imiddle" title="next" alt="next" src="../../img/next.png"
                                                   hspace="0" height="13" border="0" width="26"></td><!-- Col 4 -->
                                             <td><img class="imiddle" title="last" alt="last" src="../../img/last.png"
                                                   hspace="0" height="13" border="0" width="26"></td><!-- Col 5 -->
                                          </tr>
                                          <center>
                                             <table>
                                                <tbody>
                                                   <tr>
                                                      <td width="30"></td>
                                                      <br>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </center>
                                          <br>
                                          <table width="100%">
                                             <tbody>
                                                <tr>
                                                   <td width="70%">
                                                      <table width="100%">
                                                         <tbody>
                                                            <tr>
                                                               <td width="30"></td>
                                                               <td align="right" width="60"><b>From:</b></td>
                                                               <td width="10"></td>
                                                               <td>
                                                                  <?php echo $from['username'];?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td></td>
                                                               <td align="right"><b>Subject:</b></td>
                                                               <td></td>
                                                               <td><?php echo $message['subject'];?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td></td>
                                                               <td align="right"><b>Date:</b></td>
                                                               <td></td>
                                                               <td><?php echo $date;?>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                   <td>
                                                      <table width="100%">
                                                         <tbody>
                                                            <tr>
                                                               <td>
                                                                  <a href="deletemessage.php?messageID=<?php echo $messageID;?>"
                                                                     class="c"><img src="../../img/delete.png"
                                                                        style="vertical-align: middle;"
                                                                        alt="Permanently delete this message" border="0"
                                                                        height="11" width="18"></a>
                                                                  <a href="deletemessage.php?messageID=<?php echo $messageID;?>"
                                                                     class="c">Delete</a>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <br>
                                          <center>
                                             <table width="90%">
                                                <tbody>
                                                   <tr>
                                                      <td>
                                                      <?php echo $message_filtered;?>
                                                      </td>
                                                   </tr>
                                             </table><br>
                                          </center>
                                 </td>
                              </tr>
                           </table>
                           <table cellpadding=0 cellspacing=0>
                              <tr>
                                 <td valign=bottom>
                                    <img src=../../img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                                 </td>
                                 <td valign=bottom>
                                    <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                                       This webpage and its contents is copyright 2005 Jagex Ltd<br>
                                       To use our service you must agree to our <a
                                          href="frame2.cgi?page=terms/terms.html" class=c>Terms+Conditions</a> + <a
                                          href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy policy</a>
                                    </div>
                                    <img src=../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                                 </td>
                                 <td valign=bottom>
                                    <img src=../../img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
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
