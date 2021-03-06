<?php
session_start();
$errors = array("tracker_err" =>"");
if(isset($_POST['continue'])){
    
        include "../../connect.php";
        $stmt = $conn->prepare("SELECT passID,trackerID,progress FROM tracker WHERE trackerID =?");
        $stmt->bind_param("s",$_POST['tracker']);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0){
            $tracker = $result->fetch_assoc();

            $tracker_code = $tracker['trackerID'];
            if($tracker['progress'] == 1){
                    header("Location: ViewPasswordSupport/RequestSent.php?trackerID=$tracker_code");
            }
            if($tracker['progress'] == 2){
                    header("Location: ViewPasswordSupport/RequestRecieved.php?trackerID=$tracker_code");
            }
            if($tracker['progress'] == 3){
                    header("Location: ViewPasswordSupport/RequestRead.php?trackerID=$tracker_code");
            }
            if($tracker['progress'] == 4){
                    header("Location: ViewPasswordSupport/RequestReview.php?trackerID=$tracker_code");
            }
            if($tracker['progress'] == 5){
                    if($tracker['status'] == 1){
                            header("Location: ViewPasswordSupport/RequestAccepted.php?trackerID=$tracker_code");
                    }
                    else{
                            header("Location: ViewPasswordSupport/RequestDenied.php?trackerID=$tracker_code");
                    }
                    
            }
        }
        else{
            $errors["tracker_err"] = "Tracker ID not found";
        }
        mysqli_close($conn);
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
   <link rel="shortcut icon" href="../../../../../../../../../2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="tracker_files/main.css">
   <link href="tracker_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                           <td valign="top"><img src="tracker_files/edge_a.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                           <td valign="top"><img src="tracker_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400"></td>
                           <td valign="top"><img src="tracker_files/edge_d.jpg" height="43" hspace="0" vspace="0"
                                 width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="tracker_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
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
                                                <div style="text-align: left; background: none;">
                                                   <center><b>Password Support Tracker</b>
                                                      <br><a
                                                         href="../../../../../../../../../../RSWebsite/2005/2005/template/mainmenu">Main
                                                         Menu</a>
                                                   </center>
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
                                             <center>Please enter your tracker ID below, and press 'continue'
                                                to view the status of your password support request
                                                <br>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                <br>Tracker ID: <input size="32" name="tracker">
                                                <font color="#FFBB22"><?php echo '<br><br>'.$errors['tracker_err'].'<br>';?></font>
                    
                                                <br><input
                                                      value="Continue" type="submit" name="continue" >
                                             </center>
                                             <table border="0" cellpadding="2" cellspacing="1" width="455">
                                            </form>                 
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
                              <img src="tracker_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
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
                              <img src="tracker_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                           </td>
                           <td valign="bottom">
                              <img src="tracker_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
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