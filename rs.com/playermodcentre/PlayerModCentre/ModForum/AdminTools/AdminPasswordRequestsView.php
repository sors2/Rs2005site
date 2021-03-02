<?php
session_start();

$trackID = htmlspecialchars_decode($_GET['trackID']);
    include '../../../../connect.php';

    $stmt= $conn->prepare("SELECT userID,requestID,progress,`status`,`page` FROM tracker WHERE passID=?");
    $stmt->bind_param("i",$_GET['trackID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $track = $result->fetch_assoc();

if(isset($_POST['approve'])){
        include '../../../../connect.php';
       $n = 5;
       $approve = 1;
       $stmt= $conn->prepare("UPDATE tracker SET progress = ?,`status`=? WHERE passID =?");
       $stmt->bind_param("iis",$n,$approve,$_GET['trackID']);
       $stmt->execute();

        $stmt= $conn->prepare("SELECT * FROM recoveryrequest WHERE requestID =?");
        $stmt->bind_param("i",$track['requestID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $request = $result->fetch_assoc();

        $stmt= $conn->prepare("SELECT user_password,past_passwords FROM users WHERE userID =?");
        $stmt->bind_param("i",$track['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_update = $result->fetch_assoc();

        $stmt= $conn->prepare("SELECT password1,password2 FROM pastpasswords WHERE userID =?");
        $stmt->bind_param("i",$user_update['past_passwords']);
        $stmt->execute();
        $result = $stmt->get_result();
        $past_passwords = $result->fetch_assoc();

        $stmt= $conn->prepare("UPDATE past_passwords SET password2 = ? WHERE pastID =?");
        $stmt->bind_param("si",$past_passwords['password1'],$user_update['past_passwords']);
        $stmt->execute();

        $stmt= $conn->prepare("UPDATE past_passwords SET password1 = ? WHERE pastID =?");
        $stmt->bind_param("si",$user_update['user_password'],$user_update['past_passwords']);
        $stmt->execute();

        $stmt= $conn->prepare("UPDATE past_passwords SET user_password = ? WHERE userID =?");
        $stmt->bind_param("si",$request['new_password'],$track['userID']);
        $stmt->execute();

}

if(isset($_POST['deny'])){
        include '../../../../connect.php';
       $n = 5;
       $deny = 2;
       $stmt= $conn->prepare("UPDATE tracker SET progress = ?,`status`=? WHERE passID =?");
       $stmt->bind_param("iis",$n,$deny,$_GET['trackID']);
       $stmt->execute();
}
if(isset($_POST['inquiry'])){
       include '../../../../connect.php';
       $n = 4;
       $stmt= $conn->prepare("UPDATE tracker SET progress = ? WHERE passID =?");
       $stmt->bind_param("ii",$n,$_GET['trackID']);
       $stmt->execute();
}

        if($track['progress'] < 3){
                $n=3;
                $stmt= $conn->prepare("UPDATE tracker SET progress = ? WHERE passID =?");
                $stmt->bind_param("ii",$n,$_GET['trackID']);
                $stmt->execute();
        }

    $current_page = $track['page'];
    

    $stmt= $conn->prepare("SELECT username,user_password,date_created,past_passwords,email,last_activity,recovery_questions FROM users WHERE userID =?");
    $stmt->bind_param("i",$track['userID']);
    $stmt->execute();
    $result2 = $stmt->get_result();
    $user = $result2->fetch_assoc();

    $stmt= $conn->prepare("SELECT * FROM pastpasswords WHERE pastID =?");
    $stmt->bind_param("i",$user['past_passwords']);
    $stmt->execute();
    $result3 = $stmt->get_result();
    $past_passw = $result3->fetch_assoc();
        
    $stmt= $conn->prepare("SELECT * FROM recoveryrequest WHERE requestID =?");
    $stmt->bind_param("i",$track['requestID']);
    $stmt->execute();
    $result4 = $stmt->get_result();
    while($row = mysqli_fetch_assoc($result4)){
        $dt = strtotime($row["last_login"]);
        $date = date('d M Y', $dt);

        if($user['recovery_questions'] == 1){
                //CHECK THE ANSWERS TO THE QUESTIONS
                $ans_arr = [$row['question1'],$row['question2'],$row['question3'],$row['question4'],$row['question5']];

                $stmt= $conn->prepare("SELECT * FROM  recoveryanswers WHERE userID =?");
                $stmt->bind_param("i",$track['userID']);
                $stmt->execute();
                $result5 = $stmt->get_result();
                $answers = $result5->fetch_assoc();

                $q1 = '<font color=#e10505;>Incorrect<font>';
                $q2 = '<font color=#e10505;>Incorrect<font>';
                $q3 = '<font color=#e10505;>Incorrect<font>';
                $q4 = '<font color=#e10505;>Incorrect<font>';
                $q5 = '<font color=#e10505;>Incorrect<font>';

                if(strcmp($answers['answer1'],$ans_arr[0]) == 0){
                        $q1 = '<font color=#04a800;>Correct<font>';
                }
                if(strcmp($answers['answer2'],$ans_arr[1]) == 0){
                        $q2 = '<font color=#04a800;>Correct<font>';
                }
                if(strcmp($answers['answer3'],$ans_arr[2]) == 0){
                        $q3 = '<font color=#04a800;>Correct<font>';
                }
                if(strcmp($answers['answer4'],$ans_arr[3]) == 0){
                        $q4 = '<font color=#04a800;>Correct<font>';
                }
                if(strcmp($answers['answer5'],$ans_arr[4]) == 0){
                        $q5 = '<font color=#04a800;>Correct<font>';
                }
        }
        else{
                $none = '<font color=#e10505;>No recovery questions were set for this user<font>';   
        }

        //CHECK THE PASSWORDS
        $p1 = '<font color=#e10505;>Incorrect<font>';
        $p2 = '<font color=#e10505;>Incorrect<font>';
        $p3 = '<font color=#e10505;>Incorrect<font>';

        //check first password created
        if(password_verify($row['firstpassword'],$past_passw ['firstpassword'])){
                $p1 = '<font color=#e10505;>Correct<font>';
        }

        //Check second previous password
        if(password_verify($row['password2'],$past_passw ['password1'])){
                        $p2 = '<font color=#e10505;>Correct<font>';
        }
        
        //Check third previous password
        if(password_verify($row['password3'],$past_passw ['password2'])){
                        $p3 = '<font color=#e10505;>Correct<font>';
        }
        

        //CHECK EMAIL AND LAST LOGIN
        $email = '<font color=#e10505;>Incorrect<font>';
        $last = '<font color=#e10505;>Incorrect<font>';
        
        if(strcmp($row['email'],$user['email']) == 0){
                $email = '<font color=#04a800;>Correct<font>';
        }
        $interval = strtotime($row['last_login']) - strtotime($user['date_created']);
        $days = floor($interval / 86400); // 1 day
        if($days < 1 && $days > -1) {
                $last = '<font color=#04a800;>Correct<font>';
        }
        if($user['recovery_questions'] == 1){
                $details = '
                <tr><td align="right" width="60"><b>Question1:</b></td><td></td><td>'.$q1.'</td></tr>
                <tr><td align="right"><b>Question2:</b></td><td width=5%></td><td>'.$q2.'<td></tr>
                <tr><td align="right"><b>Question3:</b></td><td></td><td>'.$q3.'</td></tr>
                <tr><td align="right"><b>Question4:</b></td><td></td><td>'.$q4.'</td></tr>
                <tr><td align="right"><b>Question5:</b></td><td></td><td>'.$q5.'</td></tr>
                <tr><td align="right"><b>First Password:</b></td><td></td><td>'.$p1.'</td></tr>
                <tr><td align="right"><b>Previous Password:</b></td><td></td><td>'.$p2.'</td></tr>
                <tr><td align="right"><b>Previous Password:</b></td><td></td><td>'.$p3.'</td></tr>
                <tr><td align="right"><b>Email:</b></td><td></td><td>'.$email.'</td></tr>
                <tr><td align="right"><b>Last Login:</b></td><td></td><td>'.$last.'</td></tr>';
        }
        else{
                $details = '
                <tr><td align="right"><b>First Password:</b></td><td></td><td>'.$p1.'</td></tr>
                <tr><td align="right"><b>Previous Password:</b></td><td></td><td>'.$p2.'</td></tr>
                <tr><td align="right"><b>Previous Password:</b></td><td></td><td>'.$p3.'</td></tr>
                <tr><td align="right"><b>Email:</b></td><td></td><td>'.$email.'</td></tr>
                <tr><td align="right"><b>Last Login:</b></td><td></td><td>'.$last.'</td></tr>';  
        }

        $message =htmlspecialchars_decode($row['other']);
        $message = '<td>'.$message.'</td>';
        

    }
?>

<html>
<head>
<STYLE>
<!--
A{text-decoration:none}
-->
</STYLE>
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<meta content="0" http-equiv="Expires">
<meta content="no-cache" http-equiv="Pragma">
<meta content="no-cache" http-equiv="Cache-Control">
<meta content="TRUE" name="MSSmartTagsPreventParsing">
<meta content="text/html;charset=ISO-8859-1" http-equiv="content-type">
<meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming" name="Keywords">
<link rel="shortcut icon" href="favicon.ico">
<link media="all" type="text/css" rel="stylesheet" href="AdminTools_files/main.css">
<link href="AdminTools_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">

<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../../../../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../../../../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../../../../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../../../../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>


<table width=100% height=100% cellpadding=0 cellspacing=0><tr><td valign=middle><center><table cellpadding=0 cellspacing=0><tr><td valign=top><img src=../../../../messagecentre/img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td><td valign=top><img src=../../../../messagecentre/img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td><td valign=top><img src=../../../../messagecentre/img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td></tr></table><table width=600 cellpadding=0 cellspacing=0 border=0 background=../../../../messagecentre/img/background2.jpg><tr><td valign=bottom><center><table width=500 bgcolor=black cellpadding=4><tr><td class=e><center>
<div style="text-align: left; background: none;"><center><b>Secure Services</b> - 
<?php if (isset($_SESSION['username'])): ?>
        <span><?php echo "You are logged in as ";?></span><span style = "color: #ffbb22;"><?php echo $_SESSION['username'];?></span><br><b>Click the links by the top-left padlock for secure menu or logout</b></center>
<?php else : ?>
        <span>You are not logged in</a></span><br><b>Click the links by the top-left padlock for secure menu or login</b></center><?php endif ?>
		
</center>
</td>
</tr>
</tbody>
</table>
</center>
<br>

<br><center><table width=500 bgcolor=black cellpadding=4 border=0><tr><td
class=e>  
 

  
</div>
<table border="0" cellpadding="2" cellspacing="1" width="490">
<center><b>Password Support - View Password Rquests</b></center>
<center><a href="AdminPasswordRequests.php?page=<?php echo $current_page;?>" class="c">Back to password requests</a></center>
<tr>
<td width="30"></td>
<br>
<center>Password request from : <b><?php echo $user['username'];?></b></center>
</tr></tbody></table></center>
<?php if(isset($none)):?><?php echo '<br><center><b>'.$none.'</b></center>';?><?php endif ?>
<br><table width="100%"><tbody><tr>
<td width="70%"><table width="100%">
<tbody>
<?php

echo $details;

?>
<tr><td></td></tr><tr>
<tr>
        
</tr>
</tbody></table></td>
<td><table width="100%">
<tbody><tr><td>
</td></tr>
</tbody></table></td>
</tr></tbody></table>
<br>
<center>
<b>Other details:</b>
<table width="90%"><tbody><tr>

<?php
    echo $message;
?>
<td>
</tr>
</table><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?trackID=$trackID");?>" method="POST">
<?php if($track['status'] == 0):?>
<?php if($track['progress'] == 3):?>
        <input style="background-color:#000000; color:#FFFFFF;" type="submit" name="inquiry" value="Start Inquiry">
<?php elseif($track['progress'] == 4):?>
        <input style="background-color:#000000; color:#FFFFFF; "type="submit" name="approve" value="Approve Request">
        <input style="background-color:#000000; color:#FFFFFF;" type="submit" name="deny" value="Deny Request">
<?php endif?>
<?php else:?>
<?php endif?>
</form>
</center>
</td></tr></table>                                                                 <table cellpadding=0 cellspacing=0>
                                                                        <tr>
                                                                                <td valign=bottom>
                                                                                        <img src=../../../../messagecentre/img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                                                                                                This webpage and its contents is copyright 2005 Jagex Ltd<br>
                                                                                                To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html" class=c>Terms+Conditions</a>  +   <a href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy policy</a>
                                                                                        </div>
                                                                                        <img src=../../../../messagecentre/img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                                                                                </td>
                                                                                <td valign=bottom>
                                                                                        <img src=../../../../messagecentre/img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
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
