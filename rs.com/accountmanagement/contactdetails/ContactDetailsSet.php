<?php 
    session_start();
?>
<script>
setTimeout(function(){
  window.location = "ContactDetails.php";
}, 5000);
</script>
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
   <link rel="shortcut icon" href="../../../../../2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="ContactDetailsSet_files/main.css">
   <link href="ContactDetailsSet_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                           <td valign="top"><img src="ContactDetailsSet_files/edge_a.jpg" height="43" hspace="0"
                                 vspace="0" width="100"></td>
                           <td valign="top"><img src="ContactDetailsSet_files/edge_c.jpg" height="42" hspace="0"
                                 vspace="0" width="400"></td>
                           <td valign="top"><img src="ContactDetailsSet_files/edge_d.jpg" height="43" hspace="0"
                                 vspace="0" width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="ContactDetailsSet_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
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
                                             <br>
                                             <center>Your contact details have been set as you requested.
                                                <br><a href="ContactDetails.htm" class="c">Please wait while we redirect
                                                   you...</a>
                                             </center>
                                             <br>
                                             <br>
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
                              <img src="ContactDetailsSet_files/edge_g2.jpg" height="82" hspace="0" vspace="0"
                                 width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="ContactDetailsSet_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400">
                           </td>
                           <td valign="bottom">
                              <img src="ContactDetailsSet_files/edge_h2.jpg" height="82" hspace="0" vspace="0"
                                 width="100">
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