<?php
session_start();
include "../../connect.php";

$recov_rows = mysqli_query($conn, "SELECT * FROM `recovery`");
$c = 0;
$questions1 = [];
$questions2 = [];
$questions3 = [];
$questions4 = [];
$questions5 = [];
while($row = mysqli_fetch_assoc($recov_rows))
{
    if($c < 3){
        $questions1[] = str_replace("_"," ",$row['question'],);
    }
    elseif($c >=3 && $c < 6){
        $questions2[] = str_replace("_"," ",$row['question'],);
    }
    elseif($c >=6 && $c < 9){
        $questions3[] = str_replace("_"," ",$row['question'],);
    }
    elseif($c >=9 && $c < 12){
        $questions4[] = str_replace("_"," ",$row['question'],);
    }
    else{
        $questions5[] = str_replace("_"," ",$row['question'],);
    }
    $c += 1;
}
$err_array = array('password_err' => "", 'recovery_err' => "");
if(isset($_POST['submit'])){
    $pass = $_POST['pass'];
    $answer1 = strtolower($_POST['a1']);
    $answer2 = strtolower($_POST['a2']);
    $answer3 = strtolower($_POST['a3']);
    $answer4 = strtolower($_POST['a4']);
    $answer5 = strtolower($_POST['a5']);

    $questions=[];
    $questions[] = str_replace(" ","_",$_POST['q1']);
    $questions[] = str_replace(" ","_",$_POST['q2']);
    $questions[] = str_replace(" ","_",$_POST['q3']);
    $questions[] = str_replace(" ","_",$_POST['q4']);
    $questions[] = str_replace(" ","_",$_POST['q5']);
    echo $questions[0];
    $q_ids=[];
    foreach($questions as $q){
        echo $q ;
        $recovs = $conn->prepare("SELECT recoveryID FROM `recovery` WHERE question =?");
        $recovs->bind_param("s",$q);
        $recovs->execute();
        $result = $recovs->get_result();
        while($row = mysqli_fetch_assoc($result))
        {
                $q_ids[] = $row['recoveryID'];
        }
        
    }
    echo $q_ids[0];
    echo " ";
    echo $q_ids[1];
    echo " ";
    echo $q_ids[2];
    echo " ";
    echo $q_ids[3];
    echo " ";
    echo $q_ids[4];

    $stmt = $conn->prepare("SELECT userID,user_password FROM users WHERE username =?");
    $stmt->bind_param("s",$_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_row = $result->fetch_assoc();
    
    $userID = $user_row['userID'];
    if(password_verify($pass,$user_row['user_password'])){
        if(strcmp($answer1,"") !=0 && strcmp($answer2,"") !=0 && strcmp($answer3,"") !=0 && strcmp($answer4,"") !=0 && strcmp($answer5,"") !=0){
            $update_user = $conn->prepare("UPDATE users SET recovery_questions = 1 WHERE userID = ?");
            $update_user->bind_param("i",$userID);
            $update_user->execute();

            $recovery_answers = $conn->prepare("INSERT INTO recoveryanswers (userID,answer1,answer2,answer3,answer4,answer5) VALUES (?,?,?,?,?,?)" );
            $recovery_answers->bind_param("isssss",$userID,$answer1, $answer2,$answer3, $answer4, $answer5);
            $recovery_answers->execute();

            $recovery_questions = $conn->prepare("INSERT INTO recoveryquestions (userID,question1,question2,question3,question4,question5) VALUES (?,?,?,?,?,?)"); 
            $recovery_questions ->bind_param("iiiiii",$userID,$q_ids[0], $q_ids[1],$q_ids[2], $q_ids[3], $q_ids[4]);
            $recovery_questions ->execute();

            header('Location: ../../securemenu/securemenu.php');
        }
        else{
            $err_array['recovery_err'] = "One of the answers is empty or invalid";
        }
    }
    else{
           $err_array['password_err'] = "Invalid password";
     }
    
}
?>

<html>
<head>
<script type="text/javascript">
function shuffle1(){
    var arr = <?php echo json_encode($questions1); ?>;
    var q = arr[Math.floor(Math.random() * arr.length)];
    var result = document.getElementById("textbox1").setAttribute("value",q);
    return result;

}

function shuffle2(){
    var arr = <?php echo json_encode($questions2); ?>;
    var q = arr[Math.floor(Math.random() * arr.length)];
    var result = document.getElementById("textbox2").setAttribute("value",q);
    return result;

}

function shuffle3(){
    var arr = <?php echo json_encode($questions3); ?>;
    var q = arr[Math.floor(Math.random() * arr.length)];
    var result = document.getElementById("textbox3").setAttribute("value",q);
    return result;

}

function shuffle4(){
    var arr = <?php echo json_encode($questions4); ?>;
    var q = arr[Math.floor(Math.random() * arr.length)];
    var result = document.getElementById("textbox4").setAttribute("value",q);
    return result;

}

function shuffle5(){
    var arr = <?php echo json_encode($questions5); ?>;
    var q = arr[Math.floor(Math.random() * arr.length)];
    var result = document.getElementById("textbox5").setAttribute("value",q);
    return result;

}
</script>
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
<link media="all" type="text/css" rel="stylesheet" href="css/main.css">
<link href="css/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">



<table width=100% height=100% cellpadding=0 cellspacing=0><tr><td valign=middle><center><table cellpadding=0 cellspacing=0><tr><td valign=top><img src=img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td><td valign=top><img src=img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td><td valign=top><img src=img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td></tr></table><table width=600 cellpadding=0 cellspacing=0 border=0 background=img/background2.jpg><tr><td valign=bottom><center><table width=500 bgcolor=black cellpadding=4><tr><td class=e><center>

<div style="text-align: left; background: none;"><center><b>Secure Services</b> - You are logged in as <font color="#ffbb22"><?php if (isset($_SESSION['username'])): ?><span><?php echo $_SESSION['username']; ?></span><?php endif ?></font><b>
<br>Click the links by the top-left padlock for secure menu or logout</b></center>
</center>
</td>
</tr>
</tbody>
</table>
</center>
<br>
<br><center><table width=500 bgcolor=black cellpadding=4 border=0><tr><td
class=e>  
  <center><b> Set Recovery Questions</center></b>

<br>Use this form to change or set your recovery questions.
<br> Alternatively, you can return to the <a href="../../securemenu/securemenu.php">Secure Menu</a>. 
<br>
<br>
The answers to your recovery questions can be used to set a new password on your account, so please make sure that you set these to <b>sensible values</b> that no-one else will be able to work out or guess.
<br>
<br>
If you don't like the default questions that we have suggested, then please enter your own questions to answer.
<br>

<br>
<center><font size="1"><font color="#FFFFFF">If you only see a large grey box below, click<a href="html"> here</a></font></font><br></center><font color="#FFFFFF">
<br>
<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div style="position:relative">
<div style="margin-top:-20px;">Current Password: </div><center><div style="margin-top:-20px;"><input size="" id="textbox2" name="pass" type="password" value=""></center><div style=" float:right; color:gold; margin-top:-20px; width:30%;"><?php echo $err_array['password_err'];?></div>
</div>
<br><b>Recovery Question 1</b>
<br>
<br>
</center>Question:
	&emsp;&nbsp;&nbsp;<input style = "width:50%;" type="text" id="textbox1" name="q1" value="Where were you born?" />&nbsp;&nbsp;
<input type="button" onclick="shuffle1()" value="New Question"/>
<br>
<br>Answer:
<div style="margin-top:-18px;">&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="password" name="a1" id="answer1" />&nbsp;&nbsp;
<br>
<br><b>Recovery Question 2</b>
<br>
<br>
Question:
	&emsp;&nbsp;&nbsp;<input style = "width:50%;" type="text" id="textbox2" name="q2" value="Where was your first vacation or holiday?" />&nbsp;&nbsp;
<input type="button" onclick="shuffle2()" value="New Question"/>
<br>
<br>Answer:
<div style="margin-top:-18px;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;&nbsp;<input type="password" name="a2" id="answer2" />&nbsp;&nbsp;
<br>
<br><b>Recovery Question 3</b>
<br>
<br>Question:
	&emsp;&nbsp;&nbsp;<input style = "width:50%;" type="text" id="textbox3" name="q3" value="What is the name of your first best friend?" />&nbsp;&nbsp;
<input type="button" onclick="shuffle3()" value="New Question"/>
<br>
<br>Answer:
<div style="margin-top:-18px;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;&nbsp;<input type="password" name="a3"  id="answer3" />&nbsp;&nbsp;
<br>
<br><b>Recovery Question 4</b>
<br><br>Question:
	&emsp;&nbsp;&nbsp;<input style = "width:50%;" type="text" id="textbox4" name="q4" value="What was the first music album you bought?" />&nbsp;&nbsp;
<input type="button" onclick="shuffle4()"value="New Question"/>
<br>
<br>Answer:
<div style="margin-top:-18px;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;&nbsp;<input type="password" name="a4" id="answer4" />&nbsp;&nbsp;
<br>
<br><b>Recovery Question 5</b>
<br>
<br>Question:
	&emsp;&nbsp;&nbsp;<input style = "width:50%;" type="text" id="textbox5" name="q5" value="What is your oldest cousins first name?" />&nbsp;&nbsp;
<input type="button"  onclick="shuffle5()" value="New Question"/>
<br>
<br>Answer:
<div style="margin-top:-18px;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;&nbsp;<input type="password" name="a5" id="answer5" />&nbsp;&nbsp;
<br>
<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span style="color:gold;"><?php echo $err_array['recovery_err'];?>
<br><br><center><input type=submit id="submit" name="submit" value="Submit">



</form>

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