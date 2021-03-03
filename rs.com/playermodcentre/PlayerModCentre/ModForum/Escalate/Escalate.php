<?php 
session_start();
include "../../../../connect.php";
$replyID = $_GET['replyID'];

$stmt = $conn->prepare("SELECT * FROM replies WHERE replyID = ?");
$stmt->bind_param("i", $replyID);
$stmt->execute();
$result = $stmt->get_result();
$reply= $result->fetch_assoc();

$stmt = $conn->prepare("SELECT * FROM threads WHERE threadID = ?");
$stmt->bind_param("i", $reply['threadID']);
$stmt->execute();
$result = $stmt->get_result();
$thread= $result->fetch_assoc(); 

$stmt = $conn->prepare("SELECT username,rolesID FROM users WHERE userID = ?");
$stmt->bind_param("i", $reply['author']);
$stmt->execute(); 
$result2 = $stmt->get_result();
$user= $result2->fetch_assoc();

$stmt = $conn->prepare("SELECT rolesID FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute(); 
$result = $stmt->get_result();
$current_user = $result->fetch_assoc();

$dt = strtotime($reply['dateReply']);
$date = date('d M Y h:i:s', $dt); 
$sticky = "";
$locked = "";
if($thread['isSticky'])
{
     $sticky = '<img src="EscalateThread_files/stickied.png" alt="" title="" height="13" width="13">';   
}
if($thread['isLocked'])
{
    $locked = '<img src="EscalateThread_files/locked.png" alt="" title="" height="13" width="13">';
}

if ($user['rolesID'] == 3){
    $colour = "rgb(139,118,0);";
    $role = "<br>&emsp;&emsp;Jagex Mod";
}
elseif($user['rolesID']  == 2)
{
    $colour = "rgb(11,47,11);";
    $role = "<br>&emsp;&emsp;Forum Mod";
}
else{
    $colour = "rgb(16,16,16);";
    $role = "";
}
$previous_message = htmlspecialchars_decode($reply['reply']);
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
        <link media="all" type="text/css" rel="stylesheet" href="Escalate_files/main.css">
        <link href="Escalate_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                                                                        <td valign="top"><img
                                                                                        src="Escalate_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="Escalate_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="Escalate_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="Escalate_files/background2.jpg" border="0"
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
                                                                                                                        <center><img class="imiddle"
                                                                                                                                        title="Refresh"
                                                                                                                                        alt="Refresh"
                                                                                                                                        src="Escalate_files/refresh.png"
                                                                                                                                        border="0"
                                                                                                                                        height="13"
                                                                                                                                        hspace="0"
                                                                                                                                        width="13">
                                                                                                                                <b>Runescape
                                                                                                                                        Forums
                                                                                                                                        -
                                                                                                                                        <?php echo $thread["category"];?> - <?php echo $thread["title"];?></b> <?php echo $sticky;?><?php echo $locked;?></b>
                                                                                                                    
                                                                                                                                <br><b>Escalate</b>
                                                                                                                                <br><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo $thread['threadID'];?>&page=<?php echo $thread['page'];?>"
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

                                                                                                                                <div ccID="2405" style="background: none repeat scroll 0% 0% <?php echo $colour;?>; padding: 0px 0px 0px 6px;margin-top: 4% ; overflow: auto;">									
                                                                                                                                                <div ccID="2546" style="float:left;width:25%;margin-top:1%;">&emsp;&emsp;<?php echo $user['username'];?><?php echo $role;?><br>&emsp;&emsp;<a href="../Profile/ForumProfile.php?user=<?php echo urlencode($user['username']);?>">Forum Profile</a>
                                                                                                                                                </div>
                                                                                                                                                <div ccID="2612" style="float: right; text-align: right; width: 74%;  padding-right: 1%; padding-top:1%; margin-bottom: 3%;"><?php echo $date;?></div>
                                                                                                                                                <br ccID="2787">
                                                                                                                                                <br ccID="2795">
                                                                                                                                                <div style="float: center; text-align: left; padding-left: 25%; margin-bottom:1em; width: 70%;">
                                                                                                                                                <?php echo $previous_message;?> 
                                                                                                                                                </div>
                                                                                                                                                </div>
                                                                                                                                                </div>
                                                                                                                                <div ccID="2898" class="verticalgap" style="height:2px"></div>
                                                                                                                                <br>
                                                                                                                                <table border="0"
                                                                                                                                        width="100%">
                                                                                                                                        <tbody>
                                                                                                                                                <tr>
                                                                                                                                                        <!-- Row 1 -->
                                                                                                                                                        <td class="e"
                                                                                                                                                                align="center">
                                                                                                                                                                <center>                             
                                                                                                                                                                <a href="../../../../forums/ForumMessages/EditMessage.php?replyID=<?php echo $_GET['replyID'];?> "class="c">Edit</a>&#8195;
                                                                                                                                                                <a href="PostQuote.htm"class="c">Quote</a>&#8195;
                                                                                                                                                                <?php if($thread['hidden'] == 1):?><a href="../PlayerModTools/UnhideThread.php?threadID=<?php echo $thread['threadID'];?>" class="c">Unhide</a><?php else:?><a href="../PlayerModTools/HideThread.php?threadID=<?php echo $thread['threadID'];?>" class="c">Hide</a><?php endif?>&#8195;
                                                                                                                                                                <?php if ($current_user['rolesID'] > 2):?>
                                                                                                                                                                <a href="../PlayerModThread/DeletePost.php?replyID=<?php echo $_GET['replyID'];?>">Delete Post</a>&#8195;
                                                                                                                                                                <?php endif?>
                                                                                                                                                                <a href="../PlayerModThread/MessageReport.php?replyID=<?php echo $_GET['replyID'];?>" class="c">Report</a>&#8195;
                                                                                                                                                                <a href="../PlayerModThread/MessageMark.php?replyID=<?php echo $_GET['replyID'];?>" class="c">Mark</a> &#8195;
                                                                                                                                                                <br>
                                                                                                                                                                <?php if ($current_user['rolesID'] > 2):?>
                                                                                                                                                                <a href="ReadReports.php?replyID=<?php echo $_GET['replyID'];?>" class="c">Read Reports</a>&#8195;
                                                                                                                                                                <a href="RecentInfractions.htm" class="c">Recent Infractions</a>
                                                                                                                                                                <?php endif?>
                                                                                                                                                                        
                                                                                                                                                                </center>
                                                                                                                                                        </td>
                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                </tr>
                                                                                                                                        </tbody>
                                                                                                                                </table>

                                                                                                                                <br>
                                                                                                                                <center><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo $thread['threadID'];?>&page=<?php echo $thread['page'];?>"
                                                                                                                                                class="c">Back
                                                                                                                                                to
                                                                                                                                                thread</a>
                                                                                                                                        <br>
                                                                                                                                        <center>
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
                                                                                <img src="Escalate_files/edge_g2.jpg"
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
                                                                                                href="frame2.cgi?page=terms/terms.html"
                                                                                                class="c">Terms+Conditions</a>
                                                                                        + <a href="frame2.cgi?page=privacy/privacy.html"
                                                                                                class="c">Privacy
                                                                                                policy</a>
                                                                                </div>
                                                                                <img src="Escalate_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="Escalate_files/edge_h2.jpg"
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