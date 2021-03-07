<?php 
session_start();

if(!isset($_SESSION['username'])){
   header('Location: ../../../../title.php');
}

if(isset($_SESSION['title']) && isset($_SESSION['report'])){
   unset($_SESSION['title']);
   unset($_SESSION['report']);
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
   <link rel="shortcut icon" href="../../../../../../../../../../../../../2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="BugReportSelectCategory_files/main.css">
   <link href="BugReportSelectCategory_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                           <td valign="top"><img src="BugReportSelectCategory_files/edge_a.jpg" height="43" hspace="0"
                                 vspace="0" width="100"></td>
                           <td valign="top"><img src="BugReportSelectCategory_files/edge_c.jpg" height="42" hspace="0"
                                 vspace="0" width="400"></td>
                           <td valign="top"><img src="BugReportSelectCategory_files/edge_d.jpg" height="43" hspace="0"
                                 vspace="0" width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="BugReportSelectCategory_files/background2.jpg" border="0" cellpadding="0"
                     cellspacing="0" width="600">
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
                                 <table bgcolor="black" border="0" cellpadding="5" width="500">
                                    <tbody>
                                       <tr>
                                          <td class="e">
                                             <center><b>Report a bug!</b></center>
                                             <br>
                                             <table border="0" cellpadding="2" cellspacing="1" width="455"
                                                style="height:0px">
                                             </table>
                                             <table border="0" width="500px" style="height:26px">
                                                <tbody>
                                                   <tr>
                                                      <!-- Row 1 -->
                                                      <td bgcolor="35210F" height="26">
                                                         <font color="#FFBB22">Choose a Category</font>
                                                      </td>
                                                      <!-- Col 1 -->
                                                      <td>&gt;</td>
                                                      <!-- Col 2 -->
                                                      <td bgcolor="35210F" height="26">Check Common Bugs</td>
                                                      <!-- Col 3 -->
                                                      <td>&gt;</td>
                                                      <!-- Col 4 -->
                                                      <td bgcolor="35210F" height="26">Check Mistaken Cases</td>
                                                      <!-- Col 5 -->
                                                      <td>&gt;</td>
                                                      <!-- Col 6 -->
                                                      <td bgcolor="35210F" height="26">Complete Report</td>
                                                      <!-- Col 7 -->
                                                      <td>&gt;</td>
                                                      <!-- Col 8 -->
                                                      <td bgcolor="35210F" height="26">Review Report</td>
                                                      <!-- Col 9 -->
                                                      <td>&gt;</td>
                                                      <!-- Col 10 -->
                                                      <td bgcolor="35210F" height="26">Submit</td>
                                                      <!-- Col 11 -->
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <div style="float:left; text-align:left;">
                                             </div>
                                             <br>
                                             <table border="0" width="100%" style="height:300px">
                                                <tbody>
                                                   <tr>
                                                      <!-- Row 1 -->
                                                      <td>
                                                         <center>
                                                            <h3>
                                                               <center>Select a Category</center>
                                                            </h3>
                                                         </center>
                                                      </td>
                                                      <!-- Col 1 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 2 -->
                                                      <td>
                                                         <div style="float:left; text-align:left;">
                                                            Welcome to the report
                                                            a bug page. We work hard to make sure the game is as bug
                                                            free as
                                                            possible and rely on user reports to keep it that way. In
                                                            order to
                                                            continue please choose the category you feel most describes
                                                            the problem
                                                            you've encountered. If you simply want help on a quest or
                                                            want to
                                                            comment on the service we provide, please use the
                                                            appropriate forms
                                                            linked to from the main page.
                                                            <br>
                                                            <br>
                                                            The types of things we consider to be bugs are:
                                                            <br>
                                                            <br>
                                                            <ul>
                                                               <li>Points in a quest where you can't continue due to a
                                                                  quest becoming impossible to complete</li>
                                                               <li>Map areas where you can get stuck or that don't look
                                                                  quite right</li>
                                                               <li>Graphical glitches such as animations not playing
                                                                  properly</li>
                                                               <li>Spelling and grammatical errors (submit these under
                                                                  the map area or quest in which they occur)</li>
                                                            </ul>
                                                            Please do not send a report through this system if you are
                                                            simply stuck
                                                            in a quest and don't know what to do next. If this is the
                                                            case then
                                                            please send a query to Customer Support who will be able to
                                                            assist you
                                                            with your problem. Please DO NOT submit RuneScape Classic
                                                            bugs. Our
                                                            testers will ONLY be reviewing RuneScape bugs.
                                                         </div>
                                                      </td>
                                                      <!-- Col 1 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 3 -->
                                                      <td>
                                                         <center>
                                                             
                                                            Choose a category
                                                            <form action="BugReportCheckCommonBugs.php" method="POST">
                                                            <br>
                                                            <select name="category">
                                                               <option value="-1"></option>
                                                               <option value="Quest">Quest</option>
                                                               <option value="Skill">Skill</option>
                                                               <option value="Map Area">Map Area</option>
                                                               <option value="Graphics">Graphics</option>
                                                               <option value="Other">Other</option>
                                                               <option value="Website">Website</option>
                                                               <option value="Audio">Audio</option>
                                                               <option selected="selected" value="Minigames">Minigames</option>
                                                            </select>
                                                            <br>
                                                            <br><input value="Continue" name="submit" type="submit">
                                                            </form>
                                                         </center>
                                                      </td>
                                                      <!-- Col 1 -->
                                                   </tr>
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
                              <img src="BugReportSelectCategory_files/edge_g2.jpg" height="82" hspace="0" vspace="0"
                                 width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="../../../../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="../../../../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="BugReportSelectCategory_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400">
                           </td>
                           <td valign="bottom">
                              <img src="BugReportSelectCategory_files/edge_h2.jpg" height="82" hspace="0" vspace="0"
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