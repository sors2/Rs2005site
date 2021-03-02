<?php
    session_start();
    include "../../../../connect.php";  

    $stmt = $conn->prepare("SELECT userID FROM users WHERE username=?");
    $stmt->bind_param("s",$_SESSION['username']);
    $stmt->execute();  
    $result = $stmt->get_result();
    $current_user= $result->fetch_assoc();

    $markID = $_GET['markID'];
    $stmt = $conn->prepare("SELECT replyID,threadID,thread_post,`status`,accepted_by,read_flag FROM marks WHERE markID=?");
    $stmt->bind_param("i",$markID);
    $stmt->execute();
    $result = $stmt->get_result();
    $mark= $result->fetch_assoc();

    if($mark['thread_post'] == 0){
        $stmt = $conn->prepare("SELECT author,dateReply,reply FROM replies WHERE replyID=?");
        $stmt->bind_param("i",$mark['replyID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $reply= $result->fetch_assoc();

        $dt = strtotime($reply['dateReply']);
        $date = date('d M Y h:i', $dt);
        $message = $reply['reply'];

        $stmt = $conn->prepare("SELECT username,rolesID FROM users WHERE userID=?");
        $stmt->bind_param("i",$reply['author']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user= $result->fetch_assoc();

        if ($user['rolesID'] == 3){
                $colour = "rgb(139,118,0);";
                $role = "05scape Mod";
        }
        elseif($user['rolesID']  == 2){
                $colour = "rgb(11,47,11);";
                $role = "Forum Mod";
        }
        else{
                $colour = "rgb(16,16,16);";
                $role = "";
        }
    }
    else{
        $stmt = $conn->prepare("SELECT author,last_author,last_reply,total_posts,`page` FROM threads WHERE threadID=?");
        $stmt->bind_param("i",$mark['threadID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $mark_thread= $result->fetch_assoc();

        $dt = strtotime($mark_thread['last_reply']);
        $last_post = date('d M Y h:i', $dt); 

        $stmt = $conn->prepare("SELECT username FROM users WHERE userID=?");
        $stmt->bind_param("i",$mark_thread['last_author']);
        $stmt->execute();
        $result = $stmt->get_result();
        $last_user= $result->fetch_assoc();

        $stmt = $conn->prepare("SELECT username,rolesID FROM users WHERE userID=?");
        $stmt->bind_param("i",$mark_thread['author']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user= $result->fetch_assoc(); 
    
}

    $stmt = $conn->prepare("SELECT category,title,isLocked,isSticky FROM threads WHERE threadID=?");
    $stmt->bind_param("i",$mark['threadID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $thread= $result->fetch_assoc();

    $sticky="";
    $locked="";
    if($thread['isSticky'] == 1){
        $sticky = '<img src="AdminToolsReports&amp;MarkedMessagesView_files/stickied.png" alt="" title="" height="13" width="13">';
    }
    if($thread['isLocked'] == 1){
        $locked = '<img src="AdminToolsReports&amp;MarkedMessagesView_files/locked.png" alt="" title="" height="13" width="13">';
    }

    if($mark['read_flag'] == 0){
        $stmt = $conn->prepare("UPDATE marks SET read_flag = ? WHERE markID = ?");
        $n=1;
        $stmt->bind_param("ii",$n,$_GET['markID']);
        $stmt->execute();
    }

    $stmt = $conn->prepare("SELECT reported_by,`message` FROM marks WHERE markID=?");
    $stmt->bind_param("i",$_GET['markID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $notes=[];
    $view = [];
    while($row = mysqli_fetch_assoc($result)){
        $notes[]='<tr><!-- Row 1 -->
                <td>'.$row['message'].'
                <br>
                <br>
                <br><div align="right">'.$user['username'].'</div></td><!-- Col 1 -->
                </tr>';

        if($mark['thread_post'] == 0){
                $view[]='<tr>
                <!-- Row 1 -->
                <td
                        width="32px">
                </td>
                <!-- Col 1 -->
                <td align="left"
                        width="65px">
                        '.$user['username'].'
                        <br>'.$role.'
                </td>
                <!-- Col 2 -->
                <td
                        width="">
                </td>
                <!-- Col 3 -->
                <td
                        align="right">
                        '.$date.'
                </td>
                <!-- Col 4 -->
        </tr>
        <tr>
                <!-- Row 2 -->
                <td>
                </td>
                <!-- Col 1 -->
                <td align="left"
                        width="80px">
                        <div
                                style="margin-top:-3px">
                                <a href="../Profile/ForumProfile.php?user='.$user['username'].'">Forum Profile</a>
                        </div>
                </td>
                <td>
                </td>
                <td>
                </td>
        </tr>
        <tr>
                <td>
                </td>
                <td
                        align="left">
                </td>
                <td
                        align="left">
                        '.$message.' 
                </td>
                <td
                        align="right">
                </td>
        </tr>';
        }
        else{
             $view[]='  <tr>
                        <td align="left" width="285px">
                                <b>Threadname</b>
                        </td>
                        <td align="center" width="64px">
                                <b>Messages</b>
                        </td>
                        <td align="center">
                                <b>Last Post</b>
                         </td>
                        </tr>
             <tr bgcolor="#0B0B0B">
             <td align="left" width="285px"><div style="margin-left:3px">'.$sticky.''.$locked.'
                <a href="../../../../forums/ForumBoard/ThreadCategory.php?category='.urlencode($thread['category']).'&page='.$mark_thread['page'].'" class="c">' . $thread["title"] . '</a></div>
                started by <a href="../Profile/ForumProfile.php?user='.urlencode($user['username']).'" class="c">' . $user['username'] . '</a></td><!-- Col 1 -->
            <td align="center" valign="middle" width="64px">' . $mark_thread['total_posts'] . '</td><!-- Col 2 -->
            <td align="center" valign="middle">'.  $last_post .' by ' . $last_user["username"] .'</td></tr>';
        }
        
    }

    $add_notes=[];
    $stmt = $conn->prepare("SELECT author,note FROM marknotes WHERE markID =?");
    $stmt->bind_param("i",$_GET['markID']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = mysqli_fetch_assoc($result)){
        $stmt = $conn->prepare("SELECT username FROM users WHERE userID=?");
        $stmt->bind_param("i",$row['author']);
        $stmt->execute();
        $result2 = $stmt->get_result();
        $notes_user = $result2 -> fetch_assoc();  

        $add_notes[]='<tr><!-- Row 1 -->
                        <td>'.$row['note'].'
                        <br>
                        <br>
                        <br><div align="right">'.$notes_user['username'].'</div></td><!-- Col 1 -->
                        </tr>';
    }


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
        <link rel="shortcut icon" href="../../../../Forums/Forums/ForumThread/favicon.ico">
        <link media="all" type="text/css" rel="stylesheet"
                href="AdminToolsReports&amp;MarkedMessagesView_files/main.css">
        <link href="AdminToolsReports&amp;MarkedMessagesView_files/forum-3.css" rel="stylesheet" type="text/css"
                media="all">
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
                                                                                        src="AdminToolsReports&amp;MarkedMessagesView_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="AdminToolsReports&amp;MarkedMessagesView_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="AdminToolsReports&amp;MarkedMessagesView_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="AdminToolsReports&amp;MarkedMessagesView_files/background2.jpg" border="0"
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
                                                                                                                                        src="AdminToolsReports&amp;MarkedMessagesView_files/refresh.png"
                                                                                                                                        border="0"
                                                                                                                                        height="13"
                                                                                                                                        hspace="0"
                                                                                                                                        width="13">
                                                                                                                                <b>Runescape
                                                                                                                                        Forums
                                                                                                                                        -
                                                                                                                                        <?php echo $thread['category'];?> - <?php echo $thread['title'];?>
                                                                                                                                </b>
                                                                                                                                <?php echo $sticky;?>
                                                                                                                                <?php echo $locked;?>
                                                                                                                                <br><b>Admin Tools - Reports & Marked Messages - View</b>
                                                                                                                                <br>
                                                                                                                                <a href="AdminToolsReports&MarkedMessages.php"
                                                                                                                                        class="c">Back to Reports & Marked Messages</a>
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
                                                                                                                                <table style="background-color: <?php echo $colour;?>"
                                                                                                                                        border="0"
                                                                                                                                        cellspacing="0"
                                                                                                                                        width="100%">
                                                                                                                                        <tbody>
                                                                                                                                               <?php
                                                                                                                                                        foreach($view as $v){
                                                                                                                                                                echo $v;
                                                                                                                                                        }
                                                                                                                                               ?>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                                <br>
                                                                                                                                <center><b>Notes:</b>
                                                                                                                                </center>
                                                                                                                                <table bgcolor="#A0A0A0"
                                                                                                                                        border="0"
                                                                                                                                        width="100%">
                                                                                                                                        <tbody>
                                                                                                                                        <?php 
                                                                                                                                            foreach($notes as $n){
                                                                                                                                                echo $n;
                                                                                                                                            }
                                                                                                                                        ?>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                                <br>
                                                                                                                                <br>
                                                                                                                                <center><b>Additional
                                                                                                                                                Notes:</b>
                                                                                                                                </center>
                                                                                                                                <table bgcolor="#A0A0A0"
                                                                                                                                        border="0"
                                                                                                                                        width="100%"
                                                                                                                                        >
                                                                                                                                        <tbody>
                                                                                                                                        <?php 
                                                                                                                                        if(isset($add_notes)){
                                                                                                                                            foreach($add_notes as $ad){
                                                                                                                                                echo $ad;
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                                <form action="CheckReportView.php?reportID=<?php echo $_GET['markID'];?>" method="post">
                                                                                                                                <br>
                                                                                                                                <center>
                                                                                                                                <a href="AdminToolsMarkAddNotes.php?markID=<?php echo $markID;?>"><input value="Add Notes" name="add" type="button""></a>&#8195;
                                                                                                                                        <a href="AdminToolsSendMessage.php?user=<?php echo urlencode($user['username']);?>&markID=<?php echo $markID;?>"><input value="Send Reply" name="send" title="Send Reply In Message Centre" type="button"></a>
                                                                                                                                    
                                                                                                                                </center>
                                                                                                                                </form>

                                                                                                                                <br>
                                                                                                                                <center><a href="AdminToolsReports&MarkedMessages.php"
                                                                                                                                                class="c">Back to Reports & Marked Messages</a>
                                                                                                                                        <br>
                                                                                                                                        <center>


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
                                                                                <img src="AdminToolsReports&amp;MarkedMessagesView_files/edge_g2.jpg"
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
                                                                                <img src="AdminToolsReports&amp;MarkedMessagesView_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="AdminToolsReports&amp;MarkedMessagesView_files/edge_h2.jpg"
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