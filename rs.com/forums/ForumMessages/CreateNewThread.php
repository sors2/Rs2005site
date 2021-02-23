<?php 
include "../../UserActivity.php";
session_start();
$category = urldecode($_GET['category']);
$page = $_GET['page'];
if (isset($_POST["add"])){
    include "../../connect.php";
    
    $title = $_POST["title"];
    $message = htmlspecialchars(nl2br($_POST["message"]));
    date_default_timezone_set('Australia/Perth');
 
    $stmt= $conn->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();   
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
 
    $n = 1;
    $statement = $conn->prepare("INSERT INTO threads (title,category,author,last_author,`page`) VALUES (?,?,?,?,?)");
    $statement->bind_param("ssiii",$title, $category,$user['userID'],$user['userID'],$n);
    $statement->execute();
    $last_id = $conn->insert_id;
   
    $statement = $conn->prepare("INSERT INTO replies (threadID,author,reply,originalPost,`page`) VALUES (?, ?, ?, ?, ?)");
    $statement->bind_param("issii",$last_id,$user['userID'],$message,$n,$_GET['page']);
    $statement->execute();
 
    mysqli_close($conn);
    header("Location: ../ForumThread/forumthread.php?threadID=$last_id&page=1");
} 
?>
<html>
 
<head>
<script type="text/javascript">
function textLengthTitle(){
        var text = document.getElementById("charlimit_text_b").value;
        var length = 60 - text.length;
        document.getElementById("charlimit_count_b").innerHTML = length;
}
function textLengthText(){
        var text = document.getElementById("charlimit_text_a").value;
        var length = 2000 - text.length;
        document.getElementById("charlimit_count_a").innerHTML = length;
}
</script>
<script>
function setTextToCurrentPos(areaId, text) {
  var txtarea = document.getElementById(areaId);
  if (!txtarea) {
    return;
  }
 
  var scrollPos = txtarea.scrollTop;
  var strPos = 0;
  var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
    "ff" : (document.selection ? "ie" : false));
  if (br == "ie") {
    txtarea.focus();
    var range = document.selection.createRange();
    range.moveStart('character', -txtarea.value.length);
    strPos = range.text.length;
  } else if (br == "ff") {
    strPos = txtarea.selectionStart;
  }
 
  var front = (txtarea.value).substring(0, strPos);
  var back = (txtarea.value).substring(strPos, txtarea.value.length);
  txtarea.value = front + text + back;
  strPos = strPos + text.length;
  if (br == "ie") {
    txtarea.focus();
    var ieRange = document.selection.createRange();
    ieRange.moveStart('character', -txtarea.value.length);
    ieRange.moveStart('character', strPos);
    ieRange.moveEnd('character', 0);
    ieRange.select();
  } else if (br == "ff") {
    txtarea.selectionStart = strPos;
    txtarea.selectionEnd = strPos;
    txtarea.focus();
  }
 
  txtarea.scrollTop = scrollPos;
}
</script>
 
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
                     <td valign=top><img src="img/edge_a.jpg" width=100 height=43 hspace=0 vspace=0></td>
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
                        <br>
                        <center>
                           <table width=500 bgcolor=black cellpadding=4 border=0>
                              <tr>
                                 <td class=e>
                                    <center>
                                       <b>Runescape Forums - <?php echo urldecode($_GET['category']);?> - Add new thread</b>
                                       <br>
                                       <a href="../ForumBoard/forumboard.php?category=<?php echo urlencode($_GET['category']);?>&page=<?php echo ($_GET['page']);?>" class="c">Back to threads page</a>
                                       <br>
                                       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?category=$category&page=$page");?>" method="POST">
                                       <br>Thread Title: <input size="40" id="charlimit_text_b" name="title" maxlength="60" onkeyup="textLengthTitle();">
                                       <table width=0 bgcolor=black cellpadding=0 border=0>
                                          <div class="commandtwo" colspan="2">
                                             You have <span id="charlimit_count_b">60</span> characters <span
                                                id="charlimit_info_b" style="display: inline;">remaining</span> for your
                                             title.
                                 </td>
                                 <br>
                                 <br>
                                 <l1><textarea style="width: 440px; height: 331px;" id="charlimit_text_a" name="message"
                                       listener="1" rows="20" cols="60" onkeyup="textLengthText();"></textarea></l1>
                                 <br>
                                 <center>You have <span id="charlimit_count_a">2000</span> characters remaining.</center>
                                 <br><input name="add" value="Add thread" type="submit">&emsp;&emsp;
                                 <input name="cancel" value="Cancel" type="submit">
                                 </form>
                                 <br>
                                 <br>
                                 <center>
                                    <b>Smileys: </b>
                                    <br>
                                    Click to add a smiley to your message (will overwrite selected text).
                                    <br>
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/smiley.gif') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':)');return false;"> :)
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/smiley.gif') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',';)');return false;"> ;) 
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/tongue.gif') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':P ');return false;"> :P 
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/sad.gif') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':(');return false;"> :(
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/nosmile.png') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':|');return false;"> :|
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/o.png') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a','O_o ');return false;">  O_o 
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/grin.gif') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':D');return false;"> :D
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/a.png') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a','^^ ');return false;"> ^^ 
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/shocked.png') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':O');return false;"> :O 
                                    <input id="add name="imgtag" type="button" style="width: 4%; background: url('img/undecided.gif') no-repeat;" onclick="setTextToCurrentPos('charlimit_text_a',':@ ');return false;"> :@    
                                    <div style="text-align: left; background: none;">
                           </table>
                           <br>
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
