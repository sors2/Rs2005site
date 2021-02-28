

<?php
session_start();
include "../connect.php";  
$user = $_SESSION['username'];
$user_row = mysqli_query($conn, "SELECT * FROM users WHERE username ='$user'");
while($row = mysqli_fetch_assoc($user_row))
{
      $dt = strtotime($row['last_password']);
      $last_password = date('d M Y', $dt);
      $recovery_questions = "Recovery Questions not yet set!";
      if($row['recovery_questions'] != 0){
        $recovery_questions ="Recovery Questions set!";
      }
      $dt = strtotime($row['last_activity']);
      $last_visit = date('d M Y', $dt);

      $userID = $row['userID'];

      $message_rows = mysqli_query($conn, "SELECT * FROM messagecentre WHERE toID = '{$userID}' AND flag = 0");
      $unread = mysqli_num_rows($message_rows);

      $posts = mysqli_query($conn, "SELECT replyID FROM replies WHERE dateReply > '{$row['last_activity']}'");
      $posts = mysqli_num_rows($posts);
      $threads = mysqli_query($conn, "SELECT threadID FROM threads WHERE date_posted > '{$row['last_activity']}'");
      $threads = mysqli_num_rows($threads);
      $posts = $posts + $threads;
}

$online = mysqli_query($conn, "SELECT * FROM users 
                        WHERE last_activity
                        BETWEEN TIMESTAMP( DATE_SUB( NOW() , INTERVAL 5 MINUTE ) ) AND TIMESTAMP( NOW() )");
$total_online = mysqli_num_rows($online);

mysqli_close($conn);
?>

<!DOCTYPE HTML
   PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>

<HEAD>
   <META content="IE=10.000" http-equiv="X-UA-Compatible">


</head>
   
   </script>
   <STYLE>
      <!--
      A {
         text-decoration: none
      }
      -->
   </STYLE>
   <STYLE>
      BODY,
      P,
      TD {
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
   </STYLE>
   <META http-equiv="content-type" content="text/html; charset=UTF-8">
   <TITLE>RuneScape - the massive online adventure game by Jagex Ltd</TITLE>
   <META http-equiv="Expires" content="0">
   <META http-equiv="Pragma" content="no-cache">
   <META http-equiv="Cache-Control" content="no-cache">
   <META name="MSSmartTagsPreventParsing" content="TRUE">
   <META name="Keywords"
      content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming">
   <LINK href="../../../../../../../../NSX/Desktop/rs-website/2003/Forums/work/work/favicon.ico" rel="shortcut icon">
   <LINK href="securemenu_files/main.css" rel="stylesheet" type="text/css" media="all">
   <LINK href="securemenu_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
   <META name="GENERATOR" content="MSHTML 10.00.9200.16384">
</HEAD>

<BODY text="white" style="margin: 0px;" bgcolor="black" link="#90c040" alink="#90c040" vlink="#90c040">
   <TABLE width="100%" height="100%" cellspacing="0" cellpadding="0">
      <TBODY>
         <TR>
            <TD valign="middle">
               <CENTER>
                  <TABLE cellspacing="0" cellpadding="0">
                     <TBODY>
                        <TR>
                           <TD valign="top"><IMG width="100" height="43" src="securemenu_files/edge_a.jpg" vspace="0"
                                 hspace="0"></TD>
                           <TD valign="top"><IMG width="400" height="42" src="securemenu_files/edge_c.jpg" vspace="0"
                                 hspace="0"></TD>
                           <TD valign="top"><IMG width="100" height="43" src="securemenu_files/edge_d.jpg" vspace="0"
                                 hspace="0"></TD>
                        </TR>
                     </TBODY>
                  </TABLE>
                  <TABLE width="600" background="securemenu_files/background2.jpg" border="0" cellspacing="0"
                     cellpadding="0">
                     <TBODY>
                        <TR>
                           <TD valign="bottom">
                              <CENTER>
                                 <TABLE width="500" bgcolor="black" cellpadding="4">
                                    <TBODY>
                                       <TR>
                                          <TD class="e">
                                             <CENTER>
                                                <div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
                                                    <?php if (isset($_SESSION['username'])): ?>
                                                            <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
                                                    <?php else : ?>
                                                            <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center>
                                                    <?php endif ?>		
                                                </div>
                                               
                                             </CENTER>
                                          </TD>
                                       </TR>
                                    </TBODY>
                                 </TABLE>
                              </CENTER>
                              <CENTER>
                                 <BR>
                                 <TABLE width="400" bgcolor="black" border="0" cellpadding="25">
                                    <TBODY>
                                       <TR>
                                          <TD class="e">
                                             <CENTER>
                                                <DIV style="margin-top: -10px;"><B>Secure Services Menu</B>
                                                </DIV>
                                             </CENTER>
                                             <BR>
                                             <TABLE width="460" border="0">
                                                <TBODY>
                                                   <TR>
                                                      <!-- Row 1 -->
                                                      <TD height="28" align="left"
                                                         background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;">
                                                            <B>Membership</B></DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Account
                                                               Management</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 2 -->
                                                      <TD width="85" align="left"><IMG alt=""
                                                            src="securemenu_files/membership.png"></TD>
                                                      <!-- Col 1 -->
                                                      <TD width="150" align="left" valign="top">
                                                         <DIV class="floating-box">You are not a member and are
                                                            missing out! <BR><BR>
                                                            <A class="c" href="../membership/subscribe.htm">Subscribe
                                                               Now!</A>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                      <TD colspan="2">
                                                         <CENTER>
                                                            <DIV class="floating-box2">
                                                               &nbsp;Last password change:<?php echo $last_password?> <BR>
                                                               <A class="c"
                                                                  href="../accountmanagement/changeyourpassword/changeyourpassword.php">Change
                                                                  your password</A> <BR><BR>
                                                               <FONT color="#ffbb22"><?php echo $recovery_questions;?>
                                                               </FONT>
                                                               <BR>To set recovery questions, <BR>
                                                               <A class="c"
                                                                  href="../accountmanagement/setrecoveryquestions/setrecoveryquestions.php">click
                                                                  here.</A> <BR><BR>
                                                               <DIV style="margin-top: -8px;">
                                                                  <FONT color="#ffbb22">Contact Details not set!</FONT>
                                                               </DIV>
                                                               <A class="c"
                                                                  href="../accountmanagement/contactdetails/ContactDetails.htm">Set
                                                                  new contact details</A>
                                                            </DIV>
                                                         </CENTER>
                                                      </TD>
                                                      <!-- Col 3 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 3 -->
                                                      <TD align="left" colspan="2">
                                                         <DIV class="verticalgap" style="height: 5px;"></DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" colspan="2"></TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 4 -->
                                                      <TD height="28" align="left"
                                                         background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Customer
                                                               Support</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Message
                                                               Centre</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 5 -->
                                                      <TD align="left"><IMG alt=""
                                                            src="securemenu_files/customer_support.png"></TD>
                                                      <!-- Col 1 -->
                                                      <TD align="left">
                                                         <DIV class="floating-box3">Questions? <BR>
                                                            <A class="c"
                                                               href="../customersupport/customersupport.php">Contact
                                                               our staff</A>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                      <TD width="85" align="left"><IMG alt=""
                                                            src="securemenu_files/message_centre.png"></TD>
                                                      <!-- Col 3 -->
                                                      <TD align="left">
                                                         <DIV class="floating-box4">You have <?php if($unread == 1):?><?php echo $unread;?> unread messages <?php else:?><?php echo $unread;?> unread message <?php endif?>
                                                            in your message centre. <BR><BR>
                                                            <A class="c" href="../messagecentre/messagecentre.php">View
                                                               your messages from Jagex</A>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 4 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 6 -->
                                                      <TD align="left" colspan="2">
                                                         <DIV class="verticalgap" style="height: 42px;"></DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" colspan="2"></TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 7 -->
                                                      <TD height="28" align="left"
                                                         background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Forums</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Personal
                                                               Hiscores</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 8 -->
                                                      <TD align="left"><IMG alt="" src="securemenu_files/forums.png">
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="left">
                                                         <DIV class="floating-box5">Last visited forums on: <?php if($last_visit == NULL):?> N/A <?php else:?><?php echo $last_visit;?><?php endif?>
                                                            <BR><?php if($posts == 1):?> 1 new post <?php else:?><?php echo $posts;?> new posts<?php endif?>
                                                            <BR><?php if($total_online == 1):?> 1 user <?php else:?><?php echo $total_online;?> users<?php endif?> on the forums
                                                            <BR><BR><A class="c"
                                                               href="../forums/EnterForumsPage.php">Enter
                                                               Forums</A>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                      <TD>
                                                         <DIV style="margin-top: 10px;"><IMG alt=""
                                                               src="securemenu_files/p_hiscores.png"></DIV>
                                                      </TD>
                                                      <!-- Col 3 -->
                                                      <TD align="left">
                                                         <DIV class="floating-box6">
                                                            <A class="c"
                                                               href="../personalhiscores/personalhiscores.htm">View</A>
                                                            your personal hiscore tables, see how you rank compared
                                                            to your friends!
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 4 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 9 -->
                                                      <TD align="left" colspan="2">
                                                         <DIV class="verticalgap" style="height: 42px;"></DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" colspan="2"></TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 10 -->
                                                      <TD height="28" align="left"
                                                         background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Polls</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="right" background="securemenu_files/smstoneheading.png"
                                                         valign="middle" style="background-repeat: no-repeat;"
                                                         colspan="2" alt="">
                                                         <DIV style="width: 212px; text-align: center;"><B>Player
                                                               Mod Centre</B>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                   </TR>
                                                   <TR>
                                                      <!-- Row 11 -->
                                                      <TD>
                                                         <DIV style="margin-top: 33px;"><IMG alt=""
                                                               src="securemenu_files/vote.png"></DIV>
                                                      </TD>
                                                      <!-- Col 1 -->
                                                      <TD align="left">
                                                         <DIV class="floating-box7">You haven't voted in the
                                                            latest poll! Have your say, vote now! <BR><BR>
                                                            <A class="c" href="../polls/latestpoll.htm">View
                                                               latest poll</A> <BR>
                                                            <A class="c" href="../polls/allpolls.htm">View
                                                               all polls</A>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 2 -->
                                                      <TD valign="top"><IMG alt=""
                                                            src="securemenu_files/pmod_centre.png"></TD>
                                                      <!-- Col 3 -->
                                                      <TD align="left">
                                                         <DIV class="floating-box8">You are <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] > 1):?> a player 
                        moderator.<br><a href="../playermodcentre/playermodcentre.php">View Player Mod Centre</a> <?php else:?> not a player moderator.<?php endif?><BR><BR>To learn more about player
                                                            moderators,
                                                            <a href="../guides/guides/playermods.htm" class="c">click
                                                               here</A>
                                                         </DIV>
                                                      </TD>
                                                      <!-- Col 4 -->
                                                   </TR>
                                                </TBODY>
                                             </TABLE>
                                             <TABLE width="455" border="0" cellspacing="1" cellpadding="2"></TABLE>
                                          </TD>
                                       </TR>
                                    </TBODY>
                                 </TABLE>
                                 <BR>
                              </CENTER>
                           </TD>
                        </TR>
                     </TBODY>
                  </TABLE>
                  <TABLE cellspacing="0" cellpadding="0">
                     <TBODY>
                        <TR>
                           <TD valign="bottom"><IMG width="100" height="82" src="securemenu_files/edge_g2.jpg"
                                 vspace="0" hspace="0">
                           </TD>
                           <TD valign="bottom">
                              <DIV align="center" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px;">
                                 This webpage and its contents is copyright
                                 2005 Jagex Ltd<BR>
                                 To use our service you
                                 must agree to our <A class="c"
                                    href="../../../../../../../../NSX/Desktop/rs-website/2003/Forums/work/work/frame2.cgi?page=terms/terms.html">Terms+Conditions</A>
                                 + <A class="c"
                                    href="../../../../../../../../NSX/Desktop/rs-website/2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html">Privacy
                                    policy</A>
                              </DIV>
                              <IMG width="400" height="42" src="securemenu_files/edge_c.jpg" vspace="0" hspace="0">
                           </TD>
                           <TD valign="bottom"><IMG width="100" height="82" src="securemenu_files/edge_h2.jpg"
                                 vspace="0" hspace="0">
                           </TD>
                        </TR>
                     </TBODY>
                  </TABLE>
               </CENTER>
            </TD>
         </TR>
      </TBODY>
   </TABLE>
</BODY>

</HTML>