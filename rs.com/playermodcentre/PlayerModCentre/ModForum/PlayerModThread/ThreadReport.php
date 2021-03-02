<?php

session_start();
include "../../../../connect.php";
$threadID = htmlspecialchars_decode($_GET['threadID']);

$stmt = $conn->prepare("SELECT * FROM threads WHERE threadID=?");
$stmt->bind_param("i",$_GET['threadID']);
$stmt->execute();
$result = $stmt->get_result();
$thread= $result->fetch_assoc();

$n = 1;
$stmt = $conn->prepare("SELECT replyID FROM replies WHERE threadID=? AND originalPost = ?");
$stmt->bind_param("ii",$_GET['threadID'],$n);
$stmt->execute();
$result = $stmt->get_result();
$reply= $result->fetch_assoc();

$stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
$stmt->bind_param("i", $thread['author']);
$stmt->execute(); 
$result = $stmt->get_result();
$user= $result->fetch_assoc();

$stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
$stmt->bind_param("i", $thread['last_author']);
$stmt->execute(); 
$result = $stmt->get_result();
$last_user= $result->fetch_assoc();

if(isset($_POST['submit'])){

        $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $current_user = $result->fetch_assoc();

        $page = $thread['page'];
        $threadID = $reply['threadID'];
        $n = 0; //0 = post (default) 1 = thread
        $message = htmlspecialchars(nl2br($_POST["message"]));
        $mark_date = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("INSERT INTO marks (`date`,`message`,reported_by,replyID,threadID,thread_post) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssiiii",$mark_date,$message,$current_user['userID'],$replyID,$reply['threadID'],$n);
        $stmt->execute();
        mysqli_close($conn);
        header("Location: ../../../../forums/ForumThread/forumthread.php?threadID=$threadID&page=$page");
}

$dt = strtotime($thread['last_reply']);
$date = date('d M Y h:i', $dt); 
$sticky = "";
$locked = "";
if($thread['isSticky'])
{
    $sticky = '<img src="MessageReport_files/stickied.png" alt="" title="" height="13" width="13">';   
}
if($thread['isLocked'])
{
    $locked = '<img src="MessageReport_files/locked.png" alt="" title="" height="13" width="13">';
}

$threadReport = 
            '<td align="left" width="285px"><div style="margin-left:3px">'.$sticky.''.$locked.'
            <a href="../../../../forums/ForumThread/forumthread.php?threadID='.$thread['threadID'].'&page='.$thread['page'].'" class="c">' . $thread["title"] . '</a></div>
            started by <a href="../Profile/ForumProfile.php?user='.urlencode($user['username']).'" class="c">' . $user['username'] . '</a></td><!-- Col 1 -->
            <td align="center" valign="middle" width="64px">' . $thread['total_posts'] . '</td><!-- Col 2 -->
            <td align="center" valign="middle">'. $date .' by ' . $last_user["username"] .'</td>';

mysqli_close($conn);
?>

<html>

<head>
        <style>
                <!--
                A {
                        text-decoration: none
                }
                -->
        </style>
        <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
        <meta content="0" http-equiv="Expires">
        <meta content="no-cache" http-equiv="Pragma">
        <meta content="no-cache" http-equiv="Cache-Control">
        <meta content="TRUE" name="MSSmartTagsPreventParsing">
        <meta content="text/html; charset=windows-1252" http-equiv="content-type">
        <meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming"
                name="Keywords">
        <link rel="shortcut icon" href="favicon.ico">
        <link media="all" type="text/css" rel="stylesheet" href="MessageReport_files/main.css">
        <link href="MessageReport_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
</head>

<body style="margin:0" alink="#90c040" bgcolor="black" link="#90c040" text="white" vlink="#90c040">
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
        <table cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                        <tr>
                                <td valign="middle">
                                        <center>
                                                <table cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                                <tr>
                                                                        <td valign="top"><img
                                                                                        src="MessageReport_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="MessageReport_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="MessageReport_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="MessageReport_files/background2.jpg" border="0"
                                                        cellpadding="0" cellspacing="0" width="600">
                                                        <tbody>
                                                                <tr>
                                                                        <td valign="bottom">
                                                                                <center>
                                                                                        <table bgcolor="black"
                                                                                                cellpadding="4"
                                                                                                width="500">
                                                                                                <tbody>
                                                                                                        <tr>
                                                                                                                <td
                                                                                                                        class="e">
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
                                                                                        <table bgcolor="black"
                                                                                                border="0"
                                                                                                cellpadding="4"
                                                                                                width="500">
                                                                                                <tbody>
                                                                                                        <tr>
                                                                                                                <td
                                                                                                                        class="e">
                                                                                                                        <center> <b>Runescape
                                                                                                                                        Forums
                                                                                                                                        -
                                                                                                                                        <?php echo $thread["category"];?> - <?php echo $thread["title"];?></b> <?php echo $sticky;?><?php echo $locked;?></b>                                                                   
                                                                                                                                <br><b>Report</b>
                                                                                                                                <br><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo urldecode($thread["page"]);?>"
                                                                                                                                        class="c">Back
                                                                                                                                        to
                                                                                                                                        thread</a>
                                                                                                                                <br>
                                                                                                                                <br>This
                                                                                                                                message
                                                                                                                                has
                                                                                                                                been
                                                                                                                                selected
                                                                                                                                for
                                                                                                                                reference:
                                                                                                                                <br>
                                                                                                                                <br>

                                                                                                                                <table style="height:18px;"
                                                                                                                                        border="0"
                                                                                                                                        cellspacing="0"
                                                                                                                                        width="100%">
                                                                                                                                        <tbody>
                                                                                                                                                <tr>
                                                                                                                                                        <!-- Row 1 -->
                                                                                                                                                        <td align="left"
                                                                                                                                                                width="285px">
                                                                                                                                                                <b>Thread
                                                                                                                                                                        name</b>
                                                                                                                                                        </td>
                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                        <td align="center"
                                                                                                                                                                width="64px">
                                                                                                                                                                <b>Messages</b>
                                                                                                                                                        </td>
                                                                                                                                                        <!-- Col 2 -->
                                                                                                                                                        <td
                                                                                                                                                                align="center">
                                                                                                                                                                <b>Last
                                                                                                                                                                        Post</b>
                                                                                                                                                        </td>
                                                                                                                                                        <!-- Col 3 -->
                                                                                                                                                </tr>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                               
                                                                                                                                <table
                                                                                                                                        cellspacing="0">
                                                                                                                                        <tbody>
                                                                                                                                                <tr
                                                                                                                                                        bgcolor="#0B0B0B">
                                                                                                                                                        <!-- Row 3 -->
                                                                                                                                                        <?php
                                                                                                                                                            echo $threadReport;
                                                                                                                                                        ?>
                                                                                                                                                </tr>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                                <br>
                                                                                                                                <center>Select which of these options apply to this report:
                                                                                                                                <br>
                                                                                                                                <br><select name="report" style="background: #FFFFFF; color:#000000;"><option selected="selected">Choose an option</option><option>This is awesome, check it out!</option><option>Flaming</option><option>Ignoring Forum Specific Rules</option><option>Encouraging other to break the rules</option><option>Scamming and staff impersonation</option><option>Real-life issues / breaking real-world laws</option><option>Scam/hack websites (malicious intent)</option><option>Seriously offensive or threatening language</option><option>Sharing or requesting personal information</option>Option<option></option></select>
                                                                                                                                <br>
                                                                                                                                <br>Please
                                                                                                                                enter
                                                                                                                                your
                                                                                                                                reason
                                                                                                                                for
                                                                                                                                reporting
                                                                                                                                this:
                                                                                                                                <br>
                                                                                                                                <br>
                                                                                                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?threadID=$threadID");?>" method="POST">
                                                                                                                                <textarea
                                                                                                                                        style="background-color:white; color:#000000; height:200px; width:500px"></textarea>
                                                                                                                                <center>
                                                                                                                                        <br><input
                                                                                                                                                value="Submit"
                                                                                                                                                id="codeButton"
                                                                                                                                                type="button">
                                                                                                                                        <br>
                                                                                                                                        </form>
                                                                                                                                        <br><a href="Thread.htm"
                                                                                                                                                class="c">Back
                                                                                                                                                to
                                                                                                                                                thread</a>
                                                                                                                                        <br>
                                                                                                                                        <br>
                                                                                                                                        <font
                                                                                                                                                color="#888888">
                                                                                                                                                Quick
                                                                                                                                                find
                                                                                                                                                code:
                                                                                                                                                1-2-1234-12345
                                                                                                                                        </font>


                                                                                                                                        <div
                                                                                                                                                style="clear: both;">
                                                                                                                                        </div>

                                                                                                                                </center>
                                                                                                                        </center>
                                                                                                                </td>
                                                                                                        </tr>
                                                                                                </tbody>
                                                                                        </table><br>
                                                                                </center>
                                                                        </td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                                <tr>
                                                                        <td valign="bottom">
                                                                                <img src="MessageReport_files/edge_g2.jpg"
                                                                                        height="82" hspace="0"
                                                                                        vspace="0" width="100">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;"
                                                                                        align="center">

                                                                                        This webpage and its contents is
                                                                                        copyright 2005
                                                                                        Jagex Ltd<br>

                                                                                        To use our service you must
                                                                                        agree to our <a
                                                                                                href="RuneScape_website/RS.com/aff/runescape/forums/ForumBoard/frame2.cgi?page=terms/terms.html"
                                                                                                class="c">Terms+Conditions</a>
                                                                                        + <a href="RuneScape_website/RS.com/aff/runescape/forums/ForumBoard/frame2.cgi?page=privacy/privacy.html"
                                                                                                class="c">Privacy
                                                                                                policy</a>
                                                                                </div>
                                                                                <img src="MessageReport_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="MessageReport_files/edge_h2.jpg"
                                                                                        height="82" hspace="0"
                                                                                        vspace="0" width="100">
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