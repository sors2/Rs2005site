<?php session_start();?>
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
   <link rel="shortcut icon" href="../../../../../../../../../2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="Feedback_files/main.css">
   <link href="Feedback_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                           <td valign="top"><img src="Feedback_files/edge_a.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                           <td valign="top"><img src="Feedback_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400"></td>
                           <td valign="top"><img src="Feedback_files/edge_d.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="Feedback_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
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
                                                <div style="text-align: left; background: none;"><center><b>Secure Services</b> 
                                                    - You are <?php if (isset($_SESSION['username'])):?>logged in as <font color="#ffbb22"><?php echo $_SESSION['username'];?></font><b>
                                                    <br>Click the links by the top-left padlock for secure menu or logout</b></center>
                                                    <?php else :?> logged in as <font color="#ffbb22"><?php echo $_SESSION['username'];?></font><b>
                                                    <br>Click the links by the top-left padlock for secure menu or login</b></center>
                                                    <?php endif?>			
                                                </div>
                                             </center>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </center>
                              <center>
                                 <br>
                                 <table border="0" width="500px">
                                    <tbody>
                                       <tr>
                                          <!-- Row 1 -->
                                          <td class="e" id="border" bgcolor="black" height="80px" width="233px">
                                             <div style="float: right; text-align: center; width: 196px;">
                                                <div id="table-cell" class="b"
                                                   style="background-image:url('CustomerSupport_files/stoneback.gif');">
                                                   Comment</div>
                                             </div>
                                             <div style="float: right; text-align: center; width: 225px;">
                                                <div class="verticalgap" style="height:5px"></div>
                                                <img src="Feedback_files/comment.jpg" alt="" title="" align="left"
                                                   height="65" width="95">
                                             </div>
                                             <div class="floating-box">Send us comments here about the game or what have
                                                you<br><a href="FeedbackCategories/Comment.php" class="c">Click here</a>
                                             </div>
                                          </td>
                                          <!-- Col 1 -->
                                          <td width="3"></td>
                                          <!-- Col 2 -->
                                          <td class="e" id="border" bgcolor="black" width="233px">
                                             <div style="float: right; text-align: center; width: 196px;">
                                                <div id="table-cell" class="b"
                                                   style="background-image:url('CustomerSupport_files/stoneback.gif');">
                                                   Bug report</div>
                                                <div style="float: right; text-align: center; width: 225px;">
                                                   <div class="verticalgap" style="height:5px"></div>
                                                   <img src="Feedback_files/technical.jpg" alt="" title="" align="left"
                                                      height="65" width="95">
                                                </div>
                                                <div class="floating-box">If you have found a bug whilst loading or
                                                   playing the game<br><a
                                                      href="FeedbackCategories/BugReport/BugReportSelectCategory.php"
                                                      class="c">Click here</a></div>
                                             </div>
                                          </td>
                                          <!-- Col 3 -->
                                       </tr>
                                       <tr>
                                          <td>
                                             <br>
                                          </td>
                                       </tr>
                                       <tr>
                                          <!-- Row 2 -->
                                          <td class="e" id="border" bgcolor="black">
                                             <div style="float: right; text-align: center; width: 196px;">
                                                <div id="table-cell" class="b"
                                                   style="background-image:url('CustomerSupport_files/stoneback.gif');">
                                                   Complaint</div>
                                                <div style="float: right; text-align: center; width: 225px;">
                                                   <div class="verticalgap" style="height:5px"></div>
                                                   <img src="Feedback_files/complaints.png" alt="" title="" align="left"
                                                      height="65" width="95">
                                                </div>
                                                <div class="floating-box">Please let us know of any complaints, so we
                                                   can help<br><a href="FeedbackCategories/Complaint.php"
                                                      class="c">Click here</a></div>
                                             </div>
                                          </td>
                                          <!-- Col 1 -->
                                          <td></td>
                                          <!-- Col 2 -->
                                          <td class="e" id="border" bgcolor="black">
                                             <div style="float: right; text-align: center; width: 196px;">
                                                <div id="table-cell" class="b"
                                                   style="background-image:url('CustomerSupport_files/stoneback.gif');">
                                                   Suggestion</div>
                                                <div style="float: right; text-align: center; width: 225px;">
                                                   <div class="verticalgap" style="height:5px"></div>
                                                   <img src="Feedback_files/suggestions.png" alt="" title=""
                                                      align="left" height="65" width="95">
                                                </div>
                                                <div class="floating-box">Send your suggestions or ideas here
                                                   <br><a href="FeedbackCategories/Suggestion.php" class="c">Click
                                                      here</a>
                                                </div>
                                             </div>
                                          </td>
                                          <!-- Col 3 -->
                                       </tr>
                                       <tr>
                                          <td>
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
                              <img src="Feedback_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="Feedback_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                           </td>
                           <td valign="bottom">
                              <img src="Feedback_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
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