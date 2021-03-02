<?php
    session_start();
    include "../../../../connect.php";
    $threadID = $_GET['threadID'];
    if (isset($_POST["move"])){
        $cat = $_POST['categories'];
        $stmt= $conn->prepare("UPDATE threads SET category = ? WHERE threadID =?");
        $stmt->bind_param("si", $cat,$threadID);
        $stmt->execute();  
    }
    
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

    $stmt = $conn->prepare("SELECT rolesID FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $current_user = $result->fetch_assoc();

    $stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
    $stmt->bind_param("i", $thread['last_author']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $last_user= $result->fetch_assoc();

    $dt = strtotime($thread['last_reply']);
    $date = date('d M Y h:i', $dt); 
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
    
    $threadReport = 
                '<td align="left" width="285px"><div style="margin-left:3px">'.$sticky.''.$locked.'
	            <a href="../../../../forums/ForumBoard/ThreadCategory.php?category='.urlencode($thread['category']).'&page='.$thread['page'].'" class="c">' . $thread["title"] . '</a></div>
	            started by <a href="../Profile/ForumProfile.php?user='.urlencode($user['username']).'" class="c">' . $user['username'] . '</a></td><!-- Col 1 -->
                <td align="center" valign="middle" width="64px">' . $thread['total_posts'] . '</td><!-- Col 2 -->
                <td align="center" valign="middle">'. $date .' by ' . $last_user["username"] .'</td>';
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
        <link rel="shortcut icon" href="../../../../forums/ForumBoard/favicon.ico">
        <link media="all" type="text/css" rel="stylesheet" href="EscalateThread_files/main.css">
        <link href="EscalateThread_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                                                                                        src="EscalateThread_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="EscalateThread_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="EscalateThread_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="EscalateThread_files/background2.jpg" border="0"
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
                                                                                                                        <center><img class="imiddle"
                                                                                                                                        title="Refresh"
                                                                                                                                        alt="Refresh"
                                                                                                                                        src="EscalateThread_files/refresh.png"
                                                                                                                                        border="0"
                                                                                                                                        height="13"
                                                                                                                                        hspace="0"
                                                                                                                                        width="13">
                                                                                                                                <b>Runescape
                                                                                                                                        Forums
                                                                                                                                        -
                                                                                                                                        <?php echo urldecode($thread["category"]);?> - <?php echo $thread["title"];?></b> <?php echo $sticky;?><?php echo $locked;?>
                                                                                                                                <br><b>Escalate
                                                                                                                                        Thread</b>
                                                                                                                                <br><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo urlencode($thread['threadID']);?>"
                                                                                                                                        class="c">Back
                                                                                                                                        to
                                                                                                                                        threads
                                                                                                                                        page</a>
                                                                                                                                <br>
                                                                                                                                <br>This
                                                                                                                                thread
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
                                                                                                                                <table border="0"
                                                                                                                                        width="100%">
                                                                                                                                        <tbody>
                                                                                                                                                <tr>
                                                                                                                                                        <!-- Row 1 -->
                                                                                                                                                        <td class="e" align="center">
                                                                                                                                                            <center>
                                                                                                                                                                <a href="../../../../forums/forumMessages/EditOPMessage.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Edit Title</a>&#8195;
                                                                                                                                                                <a href="../../../../forums/ForumMessages/EditMessage.php?replyID=<?php echo $reply['replyID'];?>"class="c">Edit</a>&#8195;
                                                                                                                                                                <a href="PostQuote.htm"class="c">Quote</a>&#8195;
                                                                                                                                                                <?php if($thread['isSticky'] == 1):?><a href="../PlayerModBoard/UnstickyThread.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Unsticky</a><?php else:?><a href="../PlayerModBoard/StickyThread.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Sticky</a><?php endif?>&#8195;
                                                                                                                                                                <?php if($thread['isLocked'] == 1):?><a href="../PlayerModBoard/UnlockThread.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Unlock</a><?php else:?><a href="../PlayerModBoard/LockThread.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Lock</a><?php endif?>&#8195;
                                                                                                                                                                <?php if($thread['hidden'] == 1):?><a href="../PlayerModBoard/UnhideThread.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Unhide</a><?php else:?><a href="../PlayerModBoard/HideThread.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Hide</a><?php endif?>&#8195;
                                                                                                                                                                <?php if ($current_user['rolesID'] > 2):?>
                                                                                                                                                                <a href="../PlayerModBoard/DeleteThread.php?threadID=<?php echo $_GET['threadID'];?>">Delete Thread</a>&#8195;
                                                                                                                                                                <?php endif?>
                                                                                                                                                                <br><a href="../PlayerModThread/ThreadReport.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Report</a>&#8195;
                                                                                                                                                                <a href="../PlayerModThread/ThreadMark.php?threadID=<?php echo $_GET['threadID'];?>" class="c">Mark</a> &#8195;
                                                                                                                                                                <?php if ($current_user['rolesID'] > 2):?>
                                                                                                                                                                <a href="ReadReports.php" class="c">Read Reports</a>&#8195;
                                                                                                                                                                <a href="RecentInfractions.htm" class="c">Recent Infractions</a>
                                                                                                                                                                <?php endif?>
                                                                                                                                                                <br>
                                                                                                                                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?threadID=$threadID");?>" method="POST">
                                                                                                                                                                        <select
                                                                                                                                                                                name="categories">
                                                                                                                                                                                <option selected="selected"
                                                                                                                                                                                        value="-1">
                                                                                                                                                                                        Move
                                                                                                                                                                                        to
                                                                                                                                                                                        forum...
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Player
                                                                                                                                                                                        Moderator
                                                                                                                                                                                        News
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Player
                                                                                                                                                                                        Moderator
                                                                                                                                                                                        Procedures
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Community
                                                                                                                                                                                        Forum
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Player
                                                                                                                                                                                        Moderator
                                                                                                                                                                                        Mentor
                                                                                                                                                                                        Forum
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Moderating
                                                                                                                                                                                        Suggestions
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Player
                                                                                                                                                                                        Moderator
                                                                                                                                                                                        Archive
                                                                                                                                                                                </option>
                                                                                                                                                                                <option>Player
                                                                                                                                                                                        Moderator
                                                                                                                                                                                        Lounge
                                                                                                                                                                                </option>
                                                                                                                                                                                <option value = "General">General</option>
                                                                                                                                                                                        <option value = "Recent Updates">Recent Updates</option>
                                                                                                                                                                                        <option value = "Future Updates">Future Updates</option>
                                                                                                                                                                                        <option value = "Item Discussion">Item Discussion</option>
                                                                                                                                                                                        <option value = "Locations">Locations</option>
                                                                                                                                                                                        <option value = "Quests">Quests</option>
                                                                                                                                                                                        <option value = "Clue Scrolls">Clue Scrolls</option>
                                                                                                                                                                                        <option value = "Skills">Skills</option>
                                                                                                                                                                                        <option value = "Off Topic">Off Topic</option>
                                                                                                                                                                                        <option value = "Suggestions">Suggestions</option>
                                                                                                                                                                                        <option value = "Tech Support">Tech Support</option>
                                                                                                                                                                                        <option value = "Compliments">Compliments</option>
                                                                                                                                                                                        <option value = "Rants">Rants</option>
                                                                                                                                                                                        <option value = "Forum Feedback">Forum Feedback</option>
                                                                                                                                                                                        <option value = "Crafting">Crafting</option>
                                                                                                                                                                                        <option value = "Fletching">Fletching</option>
                                                                                                                                                                                        <option value = "Farming">Farming</option>
                                                                                                                                                                                        <option value = "Food">Food</option>
                                                                                                                                                                                        <option value = "Herblore">Herblore</option>
                                                                                                                                                                                        <option value = "Ores and Bars">Ores and Bares</option>
                                                                                                                                                                                        <option value = "Discontinued Items">Discontinued Items</option>
                                                                                                                                                                                        <option value = "Runes">Runes</option>
                                                                                                                                                                                        <option value = "Weapons">Weapons</option>
                                                                                                                                                                                        <option value = "Armour">Armour</option>
                                                                                                                                                                                        <option value = "Treasure Trail Items">Treasure Trial Items</option>
                                                                                                                                                                                        <option value = "Miscellaneous">Miscellaneous</option>
                                                                                                                                                                                        <option value = "Events">Events</option>
                                                                                                                                                                                        <option value = "Clans Recruitment">Clan Recruitment</option>
                                                                                                                                                                                        <option value = "Clans Discussion">Clan Discussion</option>
                                                                                                                                                                                        <option value = "Duelling">Duelling</option>
                                                                                                                                                                                        <option value = "Roleplaying">Roleplaying</option>
                                                                                                                                                                                        <option value = "PK-ing">PK-ing</option>
                                                                                                                                                                                        <option value = "Goals & Achievements">Goals & Achievements</option>
                                                                                                                                                                                        <option value = "Stories">Stories</option>

                                                                                                                                                                        </select>
                                                                                                                                                                        <input value="Move" name="move"
                                                                                                                                                                                type="submit">
                                                                                                                                                                        </form>
                                                                                                                                                                </center>
                                                                                                                                                        </td>
                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                </tr>
                                                                                                                                        </tbody>
                                                                                                                                </table>

                                                                                                                                <br>
                                                                                                                                <center><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo urlencode($thread['threadID']);?>"
                                                                                                                                                class="c">Back
                                                                                                                                                to
                                                                                                                                                threads
                                                                                                                                                page</a>
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
                                                                                <img src="EscalateThread_files/edge_g2.jpg"
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
                                                                                                href="../../../../forums/ForumBoard/frame2.cgi?page=terms/terms.html"
                                                                                                class="c">Terms+Conditions</a>
                                                                                        + <a href="../../../../forums/ForumBoard/frame2.cgi?page=privacy/privacy.html"
                                                                                                class="c">Privacy
                                                                                                policy</a>
                                                                                </div>
                                                                                <img src="EscalateThread_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="EscalateThread_files/edge_h2.jpg"
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