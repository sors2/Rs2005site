<?php
        session_start();
        include "../../../../connect.php";
        $replyID = $_GET['replyID'];
        $stmt = $conn->prepare("SELECT reply,threadID,author,dateReply FROM replies WHERE replyID =?");
        $stmt->bind_param("i",$replyID);
        $stmt->execute();
        $result = $stmt->get_result();
        $reply= $result->fetch_assoc();
    
        $stmt = $conn->prepare("SELECT category,title,isSticky,isLocked,`page` FROM threads WHERE threadID =?");
        $stmt->bind_param("i",$reply['threadID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $thread= $result->fetch_assoc();

        $sticky = "";
        $locked = "";
        if($thread['isSticky'] == 1){
                $sticky = '<img src="MessageReport_files/stickied.png" alt="" title="" height="13" width="13">';
        }
        if($thread['isLocked'] == 1){
                $locked = '<img src="MessageReport_files/locked.png" alt="" title="" height="13" width="13">';
        }

        $stmt = $conn->prepare("SELECT username,rolesID FROM users WHERE userID = ?");
        $stmt->bind_param("i", $reply['author']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

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

        if ($user['rolesID'] == 3){
            $colour = "rgb(139,118,0);";
            $role = "Jagex Mod";
        }
        elseif($user['rolesID']  == 2)
        {
            $colour = "rgb(11,47,11);";
            $role = "Forum Mod";
        }
        else{
            $colour = "rgb(16,16,16);";
            $role = "";
        }

        $dt = strtotime($reply['dateReply']);
        $date = date('d M Y h:i', $dt);   

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
        <link rel="shortcut icon" href="RuneScape_website/RS.com/aff/runescape/forums/ForumBoard/favicon.ico">
        <link media="all" type="text/css" rel="stylesheet" href="MessageMark_files/main.css">
        <link href="MessageMark_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                                                                                        src="MessageMark_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="MessageMark_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="MessageMark_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="MessageMark_files/background2.jpg" border="0"
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
                                                                                                                                <div
                                                                                                                                        style="text-align: left; background: none;">
                                                                                                                                        <center><b>Secure
                                                                                                                                                        Services</b>
                                                                                                                                                -
                                                                                                                                                You
                                                                                                                                                are
                                                                                                                                                logged
                                                                                                                                                in
                                                                                                                                                as
                                                                                                                                                <font
                                                                                                                                                        color="#ffbb22">
                                                                                                                                                        Username
                                                                                                                                                </font>
                                                                                                                                                <b>
                                                                                                                                                        <br>Click
                                                                                                                                                        the
                                                                                                                                                        links
                                                                                                                                                        by
                                                                                                                                                        the
                                                                                                                                                        top-left
                                                                                                                                                        padlock
                                                                                                                                                        for
                                                                                                                                                        secure
                                                                                                                                                        menu
                                                                                                                                                        or
                                                                                                                                                        logout</b>
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
                                                                                                                        <center> <b>Runescape
                                                                                                                                        Forums
                                                                                                                                        -
                                                                                                                                        <?php echo $thread['category']?>
                                                                                                                                        -
                                                                                                                                        <?php echo $thread['title']?></b>
                                                                                                                                <?php echo $sticky;?>
                                                                                                                                <?php echo $locked;?>
                                                                                                                                <br><b>Escalate - Mark</b>
                                                                                                                                <br><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo $reply['threadID'];?>&page=<?php echo $thread['page'];?>"
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
                                                                                                                                        <div ccID="2546" style="float:left;width:25%;margin-top:1%;">&emsp;&emsp;<?php echo $user['username'];?><br>&emsp;&emsp;<?php echo $role;?><br>&emsp;&emsp;<a href="../Profile/ForumProfile.php?user=<?php echo urlencode($user['username']);?>" class="c">Forum Profile</a>
                                                                                                                                        </div>
                                                                                                                                        <div ccID="2612" style="float: right; text-align: right; width: 74%;  padding-right: 1%; padding-top:1%; margin-bottom: 3%;"><?php echo $date;?></div>
                                                                                                                                        <br ccID="2787">
                                                                                                                                        <br ccID="2795">
                                                                                                                                        <div style="float: center; text-align: left; padding-left: 25%; margin-bottom:1em; width: 70%;">
                                                                                                                                        <?php echo $reply['reply'];?> 
                                                                                                                                        </div>
                                                                                                                                        </div>
                                                                                                                                        </div>
                                                                                                                                        <div ccID="2898" class="verticalgap" style="height:2px">
                                                                                                                                </div>
                                                                                                                                <br>Please
                                                                                                                                enter
                                                                                                                                your
                                                                                                                                reason
                                                                                                                                for
                                                                                                                                marking
                                                                                                                                this:
                                                                                                                                <br>
                                                                                                                                <br>
                                                                                                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?replyID=$replyID ");?>" method="POST">
                                                                                                                                <textarea
                                                                                                                                        style="background-color:white; color:#000000; height:200px; width:500px" name="message"></textarea>
                                                                                                                                <center>
                                                                                                                                        <br><input
                                                                                                                                                value="Submit"
                                                                                                                                                id="codeButton"
                                                                                                                                                name="submit"
                                                                                                                                                type="submit">
                                                                                                                                                </form>
                                                                                                                                        <br>
                                                                                                                                        <br><a href="../../../../forums/ForumThread/forumthread.php?threadID=<?php echo $reply['threadID'];?>&page=<?php echo $thread['page'];?>"
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
                                                                                <img src="MessageMark_files/edge_g2.jpg"
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
                                                                                <img src="MessageMark_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="MessageMark_files/edge_h2.jpg"
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