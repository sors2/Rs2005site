
<?php
session_start();
include "../../connect.php";
$err = array("name_err" => "", "address_err" => "", "zip_err" => "", "country_err" => "", "tele_err" => "", "email_err" => "");

   $stmt= $conn->prepare("SELECT userID FROM users WHERE username = ?");
   $stmt->bind_param("s", $_SESSION['username']);
   $stmt->execute();   
   $result = $stmt->get_result();
   $user = $result->fetch_assoc();

   $stmt= $conn->prepare("SELECT * FROM contactdetails WHERE userID = ?");
   $stmt->bind_param("i", $user['userID']);
   $stmt->execute();   
   $result = $stmt->get_result();
   $details = $result->fetch_assoc();
   
if(isset($_POST['submit'])){
   $name = htmlspecialchars(trim($_POST['real_name']));
   if(preg_match('/\\d/', $name) == 0){
      $address = htmlspecialchars($_POST['address']);
      $post = htmlspecialchars($_POST['post']);
      if(strlen($post) == 4 && is_numeric($post)){
         $country= htmlspecialchars($_POST['country']);
         if(preg_match('/\\d/', $name) == 0){
            $tele = htmlspecialchars($_POST['tele']);
            if(preg_match('/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{4,5})([0-0]{2})?/', $tele) == 1){
               $email = htmlspecialchars($_POST['email']);
               preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',$email,$matches);
               if(!empty($matches)){

                  $stmt= $conn->prepare("SELECT userID FROM users WHERE username = ?");
                  $stmt->bind_param("s", $_SESSION['username']);
                  $stmt->execute();   
                  $result = $stmt->get_result();
                  $user = $result->fetch_assoc();

                  if(isset($details)){
                     $stmt = $conn->prepare("UPDATE contactdetails SET `name`=?,`address`=?,zip=?,country=?,telephone=?,email=? WHERE userID=?");
                     $stmt->bind_param('ssisssi',$name,$address,$post, $country,$tele,$email,$user['userID']);
                     $stmt->execute();
                  }
                  else{
                     $stmt = $conn->prepare("INSERT INTO contactdetails (userID,`name`,`address`,zip,country,telephone,email) VALUES (?, ?, ?, ?, ?, ?, ?)");
                     $stmt->bind_param('ississs',$user['userID'],$name,$address,$post, $country,$tele,$email);
                     $stmt->execute();
                  }

                  header("Location: ContactDetailsSet.php");
               }
               else{
                  $err['email_err'] = "Invalid email address.";
               }
            }
            else{
               $err['tele_err'] = "Invalid phone number.";
            }
         }
         else{
            $err['country_err'] = "Invalid country.";
         }
      }
      else{
         $err['zip_err'] = "Invalid post/zip code.";
      }
  }
  else{
     $err['name_err'] = "Please enter a real name.";
  }
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
   <link rel="shortcut icon"
      href="file:///C:/Users/XPS/Desktop/RuneScape_website/RuneScape_website/2003/Forums/work/work/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="ContactDetailsEdit_files/main.css">
   <link href="ContactDetailsEdit_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                           <td valign="top"><img src="ContactDetailsEdit_files/edge_a.jpg" height="43" hspace="0"
                                 vspace="0" width="100"></td>
                           <td valign="top"><img src="ContactDetailsEdit_files/edge_c.jpg" height="42" hspace="0"
                                 vspace="0" width="400"></td>
                           <td valign="top"><img src="ContactDetailsEdit_files/edge_d.jpg" height="43" hspace="0"
                                 vspace="0" width="100"></td>
                        </tr>
                     </tbody>
                  </table>
                  <table background="ContactDetailsEdit_files/background2.jpg" border="0" cellpadding="0"
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
                                             <center><b>Update Contact Details</b></center>
                                             <br>
                                             <div style="float: left; text-align: left;">
                                                Use this form to set/update your personal Contact Details.
                                                <br>
                                                <br>These details will <b>never</b> be displayed back to you, they are
                                                only ever used confidentially to Jagex Staff
                                                when dealing with your account.
                                                <br>
                                                <br>Please be absolutely sure that you only ever enter or change
                                                <br>your details at <b>Runescape.com</b>
                                                <br>
                                                <br>
                                             </div>
                                             <br><br>
                                             <br>
                                             <table border="0" cellpadding="2" cellspacing="1" width="455">
                                             </table>
                                             <br>
                                             <table bgcolor="#111111" border="0" cellpadding="2px" cellspacing="3px;"
                                                width="500px">
                                                <tbody>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                   <tr>
                                                      <!-- Row 1 -->
                                                      <td align="left" width="86px;">Your real name:</td>
                                                      <!-- Col 1 -->
                                                      <td align="left"><input size="70" value="<?php if(isset($details['name'])){echo $details['name'];}?>" name="real_name"></td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 2 -->
                                                      <td align="left">Address:</td>
                                                      <!-- Col 1 -->
                                                      <td align="left"><textarea style="width:380px;" name="address"><?php if(isset($details['address'])){echo $details['address'];}?></textarea></td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 3 -->
                                                      <td align="left">Post/Zipcode:</td>
                                                      <!-- Col 1 -->
                                                      <td align="left"><input value="<?php if(isset($details['zip'])){echo $details['zip'];}?>" name="post"></td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 4 -->
                                                      <td align="left">Country:</td>
                                                      <!-- Col 1 -->
                                                      <td align="left">
                                                         <select name="country"
                                                            style="height:18px; width:330px; font-size:12px;">
                                                            <option value="Canada">Canada</option>
                                                            <option value="Czech">Czech</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                         </select>
                                                      </td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 5 -->
                                                      <td align="left">Telephone:</td>
                                                      <!-- Col 1 -->
                                                      <td align="left"><input value="<?php if(isset($details['telephone'])){echo $details['telephone'];}?>" name="tele"></td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 6 -->
                                                      <td align="left">Email:</td>
                                                      <!-- Col 1 -->
                                                      <td align="left"><input name="email" value="<?php if(isset($details['email'])){echo $details['email'];}?>" size="50"></td>
                                                      <!-- Col 2 -->
                                                   </tr>
                                                   <tr>
                                                      <!-- Row 7 -->
                                                      <td></td>
                                                      <!-- Col 1 -->
                                                      <td>
                                                         <div style="margin-left:-90px;"><input value="Submit"
                                                               type="submit" name="submit"></div>
                                                      </td>
                                                      <td><font color="#ffbb22"><?php echo $err['name_err'];?><?php echo $err['zip_err'];?><?php echo $err['country_err'];?><?php echo $err['tele_err'];?><?php echo $err['email_err'];?></font></td>
                                                      <!-- Col 2 -->
                                                   </tr>
   </form>
                                                </tbody>
                                             </table>
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
                              <img src="ContactDetailsEdit_files/edge_g2.jpg" height="82" hspace="0" vspace="0"
                                 width="100">
                           </td>
                           <td valign="bottom">
                              <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">
                                 This webpage and its contents is copyright 2005
                                 Jagex Ltd<br>
                                 To use our service you must agree to our <a
                                    href="file:///C:/Users/XPS/Desktop/RuneScape_website/RuneScape_website/2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                    class="c">Terms+Conditions</a> + <a
                                    href="file:///C:/Users/XPS/Desktop/RuneScape_website/RuneScape_website/2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                    class="c">Privacy policy</a>
                              </div>
                              <img src="ContactDetailsEdit_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                                 width="400">
                           </td>
                           <td valign="bottom">
                              <img src="ContactDetailsEdit_files/edge_h2.jpg" height="82" hspace="0" vspace="0"
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