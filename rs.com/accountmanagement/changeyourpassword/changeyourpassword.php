<?php
session_start();
$current_password = $new_password = $new_confirmed = "";
$err_array = array('current_err' => '', 'password_err1' => '', 'password_err2' => '');
if(isset($_POST['submit'])){

    include "../../connect.php";

    $current_password = $_POST['current'];
    $new_password = $_POST['new'];
    $new_confirmed = $_POST['new2'];

    $user = $_SESSION['username'];
    $user_row = mysqli_query($conn, "SELECT * FROM users WHERE username ='$user'");
    while($row = mysqli_fetch_assoc($user_row))
    {
        if(password_verify($current_password,$row['user_password'])){
            if(strcmp($new_password,$current_password != 0) && !$new_password == ""){
                if(strcmp($new_password,$new_confirmed) == 0){
                  
                    $stmt = $conn->prepare("SELECT userID,user_password,past_passwords FROM users WHERE username = ?");
                    $stmt->bind_param("s",$user);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user_past = $result->fetch_assoc();

                        $stmt = $conn->prepare("SELECT * FROM pastpasswords WHERE pastID= ?");
                        $stmt->bind_param("i",$user_past['past_passwords']);
                        $stmt->execute();
                        $result2 = $stmt->get_result();
                        $past_passwords = $result2->fetch_assoc();

                        $stmt = $conn->prepare("UPDATE pastpasswords SET password2 = ? WHERE pastID = ? ");
                        $stmt->bind_param("si",$past_passwords['password1'],$past_passwords['pastID']);
                        $stmt->execute();

                        $stmt = $conn->prepare("UPDATE pastpasswords SET password1 = ? WHERE pastID = ? ");
                        $stmt->bind_param("si",$user_past['user_password'],$past_passwords['pastID']);
                        $stmt->execute();
                
                
                    $pass = password_hash($new_password, PASSWORD_DEFAULT);
                    $date = date("Y-m-d");
                    $statement = $conn->prepare("UPDATE users SET user_password=?,last_password=? WHERE userID=?");
                    $statement->bind_param("ssi",$pass,$date,$user_past['userID']);
                    $statement->execute();
                    mysqli_close($conn);
                    header("Location: approvedpasswordchange.php");  
                }
                else{
                    $err_array['password_err2'] = "Passwords must match";
                }
            }
            else{
                $err_array['password_err1'] = "Invalid password";
            }
        }
        else{
            $err_array['current_err'] = 'Invalid password';
        }
    } 
    mysqli_close($conn);
}
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
   <link media="all" type="text/css" rel="stylesheet" href="css/main.css">
   <link href="css/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>

<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">
<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
                  <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
                      <div style="float: left;">
                          <IMG width=44 height=59 src="../../frame_files/lock.gif">
                      </div>
                      <?php if(isset($_SESSION['username'])):?>
                      <div style="float: left; padding-top: 8%; margin:left: 1%;">
                          <A href="../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
                          <A href="../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
                      </div>
                      <?php else:?>
                              <br>
                              <br>
                              <A href="../../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
                      <?php endif?>
                  </div>
              <div>
   <table width=100% height=100% cellpadding=0 cellspacing=0>
      <tr>
         <td valign=middle>
            <center>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=top><img src=img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td>
                     <td valign=top><img src=img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td>
                     <td valign=top><img src=img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=img/background2.jpg>
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
                                    </center>
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
                                    <center> Password Change Form</center></b>
                                    <br>
                                    Use this form if you want to change your RuneScape Password for logging into the
                                    game and our website. Alternatively, click <a
                                       href="../../securemenu/securemenu.html" class="c">here</a> to return to the
                                    secure menu.
                                    <br>
                                    <br>
                                    Please be absolutely sure that you only ever enter or change your
                                    password at RuneScape.com
                                    <br>
                                    <br>
                                    Please note that passwords must be between 5 and 20 characters long. We recommend
                                    you use a mixture of numbers and letters in your password to make it harder for
                                    someone to guess.
                                    <br>
                                    <br>
                                    <font size="4">
                                       <font color="#FFFFFF">Change Password</font>
                                    </font><br>
                                    <font color="#FFFFFF">
                                       <br>
                                       <br>
                                       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                       <div style="margin-top:-10px;">
                                       <div style="text-align:left;"><span style="float:left; width: 40%;">Enter your current password:</span><input style="float:left; width:30%;" type="password" size="2" id="uid" name="current" value="<?=$current_password?>">&nbsp<span style="color:gold; style="margin-left:5%; width:25%;" class="error"><?php echo $err_array['current_err']; ?></span></div>
                                        <br><br>
                                        <div style="text-align:center;"><span style="float:left; text-align:left; width: 40%;">Enter your new password:</span><input style="float:left; width:30%;" type="password" size="2" id="uid" name="new" value="<?=$new_password?>">&nbsp<span style="color:gold; style="text-align:left; width:25%;" class="error"><?php echo $err_array['password_err1']; ?></span></div>
                                        <br><br>
                                        <div style="text-align:center;"><span style="float:left; text-align:left; width: 40%;">Enter it again:</span><input style="float:left; width:30%;" type="password" size="2" id="uid" name="new2" value="<?=$new_confirmed?>">&nbsp<span style="color:gold; style="margin-left:5%; width:25%;=" class="error"><?php echo $err_array['password_err2']; ?></span></div>
                                       <br>
                                       <center><input class="" name="submit" value="Submit" type="submit">
                                       </form>
                           </table><br>
                        </center>
                     </td>
                  </tr>
               </table>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=bottom>
                        <img src=img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                     </td>
                     <td valign=bottom>
                        <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                           This webpage and its contents is copyright 2005 Jagex Ltd<br>
                           To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html"
                              class=c>Terms+Conditions</a> + <a href="frame2.cgi?page=privacy/privacy.html"
                              class=c>Privacy policy</a>
                        </div>
                        <img src=img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                     </td>
                     <td valign=bottom>
                        <img src=img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
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