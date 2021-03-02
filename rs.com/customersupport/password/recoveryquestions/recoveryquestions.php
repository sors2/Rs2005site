<?php
session_start();
include "../../../connect.php";
$err = array("quest_err" =>"","last_err" =>"","pass_err" =>"","pass_err" =>"","empty_err" =>"","confirm_err" =>"");
if(isset($_POST['submit'])){
        $score = 0;
        $email = 0;
        $passwords = 0;
        $user = urldecode($_GET['user']);
        $stmt = $conn->prepare("SELECT userID,username,user_password,email,past_passwords,recovery_questions FROM users WHERE username =?");
        $stmt->bind_param("s",$user);
        $stmt->execute();
        $result = $stmt->get_result();
        $user1 = $result->fetch_assoc();

        $ans1 = $_POST['q1'];
        $ans2 = $_POST['q2'];
        $ans3 = $_POST['q3'];
        $ans4 = $_POST['q4'];
        $ans5 = $_POST['q5'];
    
        if(!isset($_POST['recovery'])){
                if(!empty($_POST['q1'])){
                        $score++;
                }
                if(!empty($_POST['q2'])){
                        $score++;
                }
                if(!empty($_POST['q3'])){
                        $score++;
                }
                if(!empty($_POST['q4'])){
                        $score++;
                }
                if(!empty($_POST['q5'])){
                        $score++;
                }
        }
        //check 3 questions are set or checkbox is ticked
        if(isset($_POST['recovery']) || $score > 2){
                //check at least 1 password
                if(empty($_POST['p1']) && empty($_POST['p2']) && empty($_POST['p3'])){
                        $err['pass_err'] = "You need to provide at least one password";
                }
                else{
        
                        $pass1 = "";
                        $pass2 = "";
                        $pass3 = "";

                        $pass1 = password_hash($_POST['p1'], PASSWORD_DEFAULT);
                        $pass2 = password_hash($_POST['p2'], PASSWORD_DEFAULT);
                        $pass3 = password_hash($_POST['p3'], PASSWORD_DEFAULT);
                                
                        //Check for the date format
                        if(preg_match('/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}/',$_POST['last'],$matches)){

                                if(!empty($_POST['new'])){
                                        if(strcmp($_POST['new'],$_POST['confirm'])==0){

                                                $details = htmlspecialchars(nl2br($_POST['message']));
                                                $new_pass = password_hash($_POST['new'], PASSWORD_DEFAULT);
                                                $stmt = $conn->prepare("INSERT INTO recoveryrequest (question1,question2,question3,question4,question5,firstpassword,password2,password3,email,last_login,new_password,other) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                                                $stmt->bind_param("ssssssssssss",$ans1,$ans2,$ans3,$ans4,$ans5,$pass1,$pass2,$pass3,$_POST['email'],$_POST['last'],$new_pass,$details);
                                                $stmt->execute();
                                                $last_id = $conn->insert_id;
                                                                     
                                                $tracker = uniqid();
                                                $stmt = $conn->prepare("INSERT INTO tracker (trackerID,userID,requestID) VALUES (?,?,?)");
                                                $stmt->bind_param("sii",$tracker,$user1['userID'],$last_id);
                                                $stmt->execute();

                                                //send the player a message in the message centre
                                                $subject = "Your Account Password Request";
                                                $message = 'Hi '.$_SESSION['username'].',<br>
                                                        Your password recovery has been sent and received successfully.<br>
                                                        Your trackerID is: <b>'.$tracker.'</b><br>
                                                        This is a unique code used to track the progress of your request. This can be found in the customer support page <a href="../customersupport/password/tracker.php">here</a>.<br>
                                                        Take this time to review your account security and measures by reading the the <a href="../guides/guides.html">security tips</a> in the Runescape guides section.<br>
                                                        Thanks for your patience and understanding.<br>
                                                        Sincerely, the Jagex Team.';
                                                $message = htmlspecialchars(nl2br($message));
                                                $date = date("Y-m-d H:i:s");
                                                $n = 0;
                                                $stmt = $conn->prepare("INSERT INTO messagecentre (toID,fromID,`subject`,message_date,`message`) VALUES (?,?,?,?,?)");
                                                $stmt->bind_param("iisss",$user1['userID'],$n,$subject,$date,$message);
                                                $stmt->execute();
                                                
                                                header("Location: ../ViewPasswordSupport/RequestSent.php?trackerID=$tracker");
                                        }
                                        else{
                                                $err['confirm_err'] = "Confirmed password does not match"; 
                                        }
                                }
                                else{
                                        $err['empty_err'] = "You must enter a new password"; 
                                }
                        }
                        else{
                                $err['last_err'] = "Please use the format DD-MM-YYYY"; 
                        }
                }
        }
        else{
                $err['quest_err'] = "You need to answer at least 3 questions";
        }
                
}

$encode_user = $_GET['user'];

$stmt = $conn->prepare("SELECT userID,recovery_questions FROM users WHERE username =?");
$stmt->bind_param("s",$_GET['user']);
$stmt->execute();
$result = $stmt->get_result();
$user_row = $result->fetch_assoc();

$userID = $user_row['userID'];

if($user_row['recovery_questions'] == 1){
        $stmt = $conn->prepare("SELECT * FROM recoveryquestions WHERE userID =?");
        $stmt->bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $q = $result->fetch_assoc();

        $stmt = $conn->prepare("SELECT * FROM `recovery` WHERE recoveryID =?");
        $stmt->bind_param("s",$q['question1']);
        $stmt->execute();
        $result = $stmt->get_result();
        $q1 = $result->fetch_assoc();
        $question1 = str_replace("_"," ",$q1['question']);

        $stmt = $conn->prepare("SELECT * FROM `recovery` WHERE recoveryID =?");
        $stmt->bind_param("s",$q['question2']);
        $stmt->execute();
        $result = $stmt->get_result();
        $q2 = $result->fetch_assoc();
        $question2 = str_replace("_"," ",$q2['question']);

        $stmt = $conn->prepare("SELECT * FROM `recovery` WHERE recoveryID =?");
        $stmt->bind_param("s",$q['question3']);
        $stmt->execute();
        $result = $stmt->get_result();
        $q3 = $result->fetch_assoc();
        $question3 = str_replace("_"," ",$q3['question']);

        $stmt = $conn->prepare("SELECT * FROM `recovery` WHERE recoveryID =?");
        $stmt->bind_param("s",$q['question4']);
        $stmt->execute();
        $result = $stmt->get_result();
        $q4 = $result->fetch_assoc();
        $question4 = str_replace("_"," ",$q4['question']);

        $stmt = $conn->prepare("SELECT * FROM `recovery` WHERE recoveryID =?");
        $stmt->bind_param("s",$q['question5']);
        $stmt->execute();
        $result = $stmt->get_result();
        $q5 = $result->fetch_assoc();
        $question5 = str_replace("_"," ",$q5['question']);
}

?>
<html>
<head>
<STYLE>
<!--
A{text-decoration:none}
-->
</style>
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<meta content="0" http-equiv="Expires">
<meta content="no-cache" http-equiv="Pragma">
<meta content="no-cache" http-equiv="Cache-Control">
<meta content="TRUE" name="MSSmartTagsPreventParsing">
<meta content="text/html;charset=ISO-8859-1" http-equiv="content-type">
<meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming" name="Keywords">
<link rel="shortcut icon" href="favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="css/main.css">
<link href="css/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">

<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../../../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../../../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>

<table width=100% height=100% cellpadding=0 cellspacing=0><tr><td valign=middle><center><table cellpadding=0 cellspacing=0><tr><td valign=top><img src=img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td><td valign=top><img src=img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td><td valign=top><img src=img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td></tr></table><table width=600 cellpadding=0 cellspacing=0 border=0 background=img/background2.jpg><tr><td valign=bottom><center><table width=500 bgcolor=black cellpadding=4><tr><td class=e><center>
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


<br><center><table width=500 bgcolor=black cellpadding=4 border=0><tr><td
class=e> 
<center>To help us be absolutely sure that you are the true owner of your account, please answer as many of the questions below as possible. If you really can't answer a question leave the box blank.<br>
<br></center>
<font color="#FFBB22"><b><font face="arial">Your Recovery Questions</b></font></font>&emsp;(If you set some, you must try to answer at least 3)
<br>	


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?user=$encode_user");?>" method="POST">


<br><div style="float:left;width:50%;"><?php if($user_row['recovery_questions'] == 1):?><?php echo $question1;?><?php else:?><?php echo str_replace("_"," ","Where_were_you_born?");?><?php endif ?></div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid" name ="q1" value=""></div>
<br>		
<br><div style="float:left;width:50%;"><?php if($user_row['recovery_questions'] == 1):?><?php echo $question2;?><?php else:?><?php echo str_replace("_"," ","Where_was_your_first_vacation_or_holiday?");?><?php endif ?></div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="q2" value=""></div>	
<br>				
<br><div style="float:left;width:50%;"><?php if($user_row['recovery_questions'] == 1):?><?php echo $question3;?><?php else:?><?php echo str_replace("_"," ","What_is_the_name_of_your_first_best_friend?");?><?php endif ?></div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="q3" value=""></div>	
<br><br><div style="float:left;width:50%;"><?php if($user_row['recovery_questions'] == 1):?><?php echo $question4;?><?php else:?><?php echo str_replace("_"," ","What_was_the_first_video_game_you_bought?");?><?php endif ?></div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="q4" value=""></div>		
<br><br><div style="float:left;width:50%;"><?php if($user_row['recovery_questions'] == 1):?><?php echo $question5;?><?php else:?><?php echo str_replace("_"," ","What_is_the_first_name_of_your_brother_or_sister?");?><?php endif ?></div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="q5" value=""></div>

<br></div>

<div style="float: left; text-align: center; width: 380px;"><input name = "recovery" type="checkbox"> I Did Not Set Any Recovery Questions </div></div></div>
 </div></div>
 <br>
 </div></div>
 <br>
 <br>
 <font color="#FFBB22"><b>Previous Passwords</b></font>&emsp;(You must give at least one)
 <br>
<br><div style="margin-top:-10px;"><div style="float:left;width:280px;">The first password ever used on this account</div>  <div style="float: right; text-align: right; width: 160px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="p1" type = "password" value=""></div>	
<br>				
<br><div style="float:left;width:50%;">Another previously used password</div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="p2" type = "password" value=""></div>	
<br><br><div style="float:left;width:50%;">A third previously used password</div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid"  name ="p3" type = "password" value=""></div>		
</div></div>
<br>
<br><div style="background: none repeat scroll 0% 0% rgb(0,0,0); padding: 0px 0px 0px 6px;margin-bottom: 0px; height:110px;">
<font color="#FFBB22"><b>Contact and Login Details</b></font>
<br>				
<br><div style="float:left;width:50%;">What is your email address?</div>  <div style="float: right; text-align: right; width: 200px;"><input style="text-align:left; color:#000000;" size="2" id="uid" name="email" value=""></div>	
<br><br><div style="float:left;width:320px;">Approximately when did you create your account? Format as (DD-MM-YYYY)</div>  <div style="float: right; text-align: right; width: 150px;"><input style="text-align:left; color:#000000;" size="2" id="uid" name="last" value=""></div>		
</div></div>
<font color="#FFBB22"><b>Your New Password</b></font>
<br>
<br><div style="margin-top:-10px;"><div style="float:left;width:280px;">Please enter a new password for your account:</div>  <div style="float: right; text-align: right; width: 160px;"><input style="color:#000000;" size="2" id="uid" name="new" type = "password" value=""></div>	
<br>				
<br><div style="float:left;width:50%;">Type a new password again:</div>  <div style="float: right; text-align: right; width: 200px;"><input style="color:#000000;" size="2" id="uid" name="confirm" type = "password" value=""></div>	
<br><br>

<div style="background: none repeat scroll 0% 0% rgb(0,0,0); padding: 0px 0px 0px 6px;margin-bottom: 0px; height:330px;">
<br><div style="margin-top:-15px;">Lastly, please supply any other details which might help us verify that you are the true owner of this account.
<br></div>
<br><center><textarea cols="45" rows="15" name ="message"></textarea>

<br>
You have <span id="charlimit_count_b">250</span> characters <span id="charlimit_info_b" style="display: inline;">remaining.</span></div>
<br>
<center><font color="#FFBB22"><?php echo $err['pass_err'];?><?php echo $err['quest_err'];?><?php echo $err['last_err'];?><?php echo $err['empty_err'];?><?php echo $err['confirm_err'];?></font></center>
<br>
<center><input class="" name="submit" value="Submit" type="submit"></form>
                                            </div>
</table><br></center>
</td></tr></table>                                                                 <table cellpadding=0 cellspacing=0>
                                                                        <tr>
                                                                                <td valign=bottom>
                                                                                        <img src=img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                                                                                                This webpage and its contents is copyright 2005 Jagex Ltd<br>
                                                                                                To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html" class=c>Terms+Conditions</a>  +   <a href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy policy</a>
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