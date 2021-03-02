<?php 
        session_start();
        $user1 = urldecode($_GET['user']);
        include "../../../../connect.php";
        $stmt = $conn->prepare("SELECT userID,date_created,rolesID,smileys FROM users WHERE username = ?");
        $stmt->bind_param("s",$user1);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        $stmt = $conn->prepare("SELECT threadID,`page` FROM replies WHERE author = ? ORDER BY dateReply DESC");
        $stmt->bind_param("i",$user['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $total_posts = mysqli_num_rows($result);

        $dt = strtotime($user['date_created']);
        $date = date("Y-m-d", $dt);
        $date1 = new DateTime($date);
        $now = time();
        $now = date("Y-m-d", $now);
        $date2 = date_create($now);
        $diff = $date1->diff($date2);
        $days = $diff->format('%a');
        
        while($row = mysqli_fetch_assoc($result))
        {
                $stmt = $conn->prepare("SELECT threadID,title,category,last_reply,isLocked,isSticky,`page` FROM threads WHERE threadID = ?");
                $stmt->bind_param("i",$row['threadID']);
                $stmt->execute();
                $result2 = $stmt->get_result();
                $thread = $result2->fetch_assoc();
                        $status = "";
                        if($thread ['isSticky'])
                        {
                                $status = '<img src="img/stickied.png" width="13" height="13" alt="" title="" />&nbsp;Stickied';
                        }
                        if($thread ['isLocked'])
                        {
                                $status = '<img src="img/locked.png" width="13" height="13" alt="" title="" />&nbsp;Locked';
                        }
                        if($thread ['isLocked'] && $thread ['isSticky']){
                                '<img src="img/locked.png" width="13" height="13" alt="" title="" />&nbsp;Locked<br><img src="img/stickied.png" width="13" height="13" alt="" title="" />&nbsp;Stickied';
                        }
                        $threads[] = '<tr><!-- Row 2 --><td align="left">'.$status.'</td><!-- Col 1 -->
                        <td align="left" width="40%"><a href="../../../../forums/ForumThread/forumthread.php?threadID='.$thread ['threadID'].'" class="c">'.$thread['title'].'</a></td><!-- Col 2 -->
                        <td align="left"><a href="../../../../forums/ForumBoard/forumboard.php?category='.$thread ['category'].'" class="c">'.$thread ['category'].'</a></td><!-- Col 3 -->
                        <td align="center" width="20%">'.$thread ['last_reply'].'</td><!-- Col 4 -->
                        <td><a href="../../../../forums/ForumThread/forumthread.php?threadID='.$thread['threadID'].'&page='.$row['page'].'" class="c">View</a></td><!-- Col 5 -->
                        </tr>';
                
        }
        
        mysqli_close($conn);
    ?>
    <?php
    if(isset($_POST['off'])){
        include "../../../connect.php";
        $n = 0;
        $stmt = $conn->prepare("UPDATE users SET smileys=?  WHERE userID = ?");
        $stmt->bind_param("ii",$n,$user['userID']);
        $stmt->execute();

        $stmt = $conn->prepare("SELECT userID,date_created,rolesID,smileys FROM users WHERE username = ?");
        $stmt->bind_param("s",$_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();


    }
    if(isset($_POST['on'])){
        include "../../../connect.php";
        $n = 1;
        $stmt = $conn->prepare("UPDATE users SET smileys=?  WHERE userID = ?");
        $stmt->bind_param("ii",$n,$user['userID']);
        $stmt->execute(); 

        $stmt = $conn->prepare("SELECT userID,date_created,rolesID,smileys FROM users WHERE username = ?");
        $stmt->bind_param("s",$_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
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
        <link rel="shortcut icon" href="../../../../forums/ForumBoard/favicon.ico">
        <link media="all" type="text/css" rel="stylesheet" href="ForumProfile_files/main.css">
        <link href="ForumProfile_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                                                                                        src="ForumProfile_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="ForumProfile_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="ForumProfile_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="ForumProfile_files/background2.jpg" border="0"
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
                         <center>
                            <table width=500 bgcolor=black cellpadding=4 border=0>
                              <tr>
                                 <td class=e>
                                    <center>
                                       <b>Forum Profile - <?php echo $user1?></b>
                                       <br><a href="../../../../forums/forums.php" class="c">back to forums home</a>
                                       - <a href="../AdminTools/AdminTools.php" class="c">back to admin tools</a>
                                       <br>
                                       <br>
                                          <div style="text-align: left; background: none;">
                                          <br><b>Forum
                                                                                                                                                Moderator
                                                                                                                                                Tools:</b>
                                                                                                                                        <br><a href="ProfileMuteBan.php?user=<?php echo urlencode($user1);?>"
                                                                                                                                                class="c">Mute/Ban</a>
                                                                                                                                        <br><a href="SendMessage.php"
                                                                                                                                                class="c">Send
                                                                                                                                                Message</a>
                                                                                                                                        <br><a href="ForumInfractions.htm"
                                                                                                                                                class="c">View
                                                                                                                                                Forum
                                                                                                                                                Infractions</a>
                                                                                                                                        <br>
                                                                                                                                        
                                                                                                                                        
                                             <br><b>This user has made <?php if($total_posts == 1):?> 1 post; <?php else:?><?php echo $total_posts;?> posts; <?php endif?> <?php if($total_posts > 0):?> <?php echo round($total_posts/$days,2)?><?php else:?>0<?php endif?> per day.</b>
                                             <br>
                                             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                <?php if($user['smileys'] == 1):?>
                                                    <input class="" name="off" value="Turn Off Smileys" type="submit">
                                                <?php else:?>
                                                    <input class="" name="on" value="Turn On Smileys" type="submit">
                                                <?php endif?>
                                            </form>
                                             <br>
                                             <br><b>Threads posted in by <?php echo $user1?>:</b>
                                             <br>
                                             <br>
                                             <table border="0" width="490px">
                                                <tr>
                                                   <!-- Row 1 -->
                                                   <td align="left"><b>Status</b></td>
                                                   <!-- Col 1 -->
                                                   <td align="left" width="40%"><b>Thread</b></td>
                                                   <!-- Col 2 -->
                                                   <td align="left"><b>Forum</b></td>
                                                   <!-- Col 3 -->
                                                   <td align="center" width="20%"><b>Last post</b></td>
                                                   <!-- Col 4 -->
                                                   <td></td>
                                                   <!-- Col 5 -->
                                                </tr>
                                                <?php

                                                        if(isset($threads)){
                                                                foreach($threads as $t)
                                                                {
                                                                        echo $t;
                                                                }
                                                        }
                                                ?>
                                             </table>
                           </table>
                           <br>
                        </center>
                     </td>
                  </tr>
               </table>
               <table cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                                <tr>
                                                                        <td valign="bottom">
                                                                                <img src="ForumProfile_files/edge_g2.jpg"
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
                                                                                <img src="ForumProfile_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="ForumProfile_files/edge_h2.jpg"
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
   </center>
   </td>
   </tr>
   </tbody>
   </table>
</body>

</html>

</html>