<?php
   session_start();

   include "../connect.php";

   $result = mysqli_query($conn,"SELECT * FROM polls ORDER BY `date` DESC");
   $polls=[];
   while($row = mysqli_fetch_assoc($result)){
      $dt = strtotime($row["date"]);
      $date = date('d M Y', $dt);

      include "../ban.php";
      if(isset($_SESSION['username'])){
         if ($stmt->execute()) {
            $result4 = $stmt->get_result();
            if(mysqli_num_rows($result)){
               $ban = $result4->fetch_assoc();
               $current = date("Y-m-d H:i:s");
               if($ban['expire'] > $current){
                  $banned = "set";
               }
            }
         }
         $stmt->close();
      }

      $stmt= $conn->prepare("SELECT id FROM pollhistory WHERE pollID = ? AND userID = ?");
      $stmt->bind_param("ii", $row['pollID'],$user['userID']);
      $stmt->execute();   
      $result3 = $stmt->get_result();

         $link ="";
         if($user['rolesID'] == 3 || $row['status'] == 1 || (mysqli_num_rows($result3) > 0) || isset($banned) ){
            $link ="pollresults.php?pollID=".$row['pollID'];
         }
         else{
            $link ="latestpoll.php?pollID=".$row['pollID'];
         }

      $polls[] = '<tr>
                  <td align="left"><a
                  href="'.$link.'"
                  class="c">'.$row['title'].'</a></td>
                  <td align="left">'. $date.'</td>
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
   <link rel="shortcut icon" href="file:///C:/Users/XPS/Desktop/rs-website/2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="allpolls_files/main.css">
   <link href="allpolls_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>

<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">

   <table cellpadding="0" cellspacing="0" height="100%" width="100%">
      <tbody>
         <tr>
            <td valign="middle">
               <center>
                  <table cellpadding="0" cellspacing="0">
                     <tbody>
                        <tr>
                           <td valign="top"><img src="allpolls_files/edge_a.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                           <td valign="top"><img src="allpolls_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400"></td>
                           <td valign="top"><img src="allpolls_files/edge_d.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="allpolls_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
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
                                             <div style="height:5px"></div>
                                             <center><b>Polls</b></center>
                                             <table border="0" width="100%">
                                                <tbody>
                                                   <tr>
                                                      <!-- Row 1 -->
                                                      <td align="left"><b>Title</b></td>
                                                      <!-- Col 1 -->
                                                      <td align="left"><b>Date</b></td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                  <?php
                                                      if(isset($polls)){
                                                         foreach($polls as $p){
                                                            echo $p;
                                                         }
                                                      }
                                                  ?>
                                                </tbody>
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
                              <img src="allpolls_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="file:///C:/Users/XPS/Desktop/rs-website/2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="file:///C:/Users/XPS/Desktop/rs-website/2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="allpolls_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                           </td>
                           <td valign="bottom">
                              <img src="allpolls_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
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