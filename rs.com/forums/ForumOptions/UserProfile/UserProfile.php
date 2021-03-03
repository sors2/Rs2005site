<html>
<head>
    <?php 
         include "../../../UserActivity.php";
        session_start();
        include "../../../connect.php";
        $stmt = $conn->prepare("SELECT userID,date_created,rolesID,smileys FROM users WHERE username = ?");
        $stmt->bind_param("s",$_SESSION['username']);
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
                        <td align="left" width="40%"><a href="../../ForumThread/forumthread.php?threadID='.$thread ['threadID'].'" class="c">'.$thread['title'].'</a></td><!-- Col 2 -->
                        <td align="left"><a href="../../ForumBoard/forumboard.php?category='.$thread ['category'].'" class="c">'.$thread ['category'].'</a></td><!-- Col 3 -->
                        <td align="center" width="20%">'.$thread ['last_reply'].'</td><!-- Col 4 -->
                        <td><a href="../../ForumThread/forumthread.php?threadID='.$thread['threadID'].'&page='.$thread ['page'].'" class="c">View</a></td><!-- Col 5 -->
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

   <table width=100% height=100% cellpadding=0 cellspacing=0>
      <tr>
         <td valign=middle>
            <center>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=top><img src=img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td>
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
                                 <td class=e>
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
                                       <b>Forum Profile - <?php echo $_SESSION['username'];?></b>
                                       <br><a href="../../forums.php" class="c">back to forums home</a>
                                       <br>
                                       <br><b>
                                          <div style="text-align: left; background: none;">
                                             <br>This user has made <?php if($total_posts == 1):?> 1 post; <?php else:?><?php echo $total_posts;?> posts; <?php endif?> <?php if($total_posts > 0):?> <?php echo round($total_posts/$days,2)?><?php else:?>0<?php endif?> per day.
                                             <br>
                                             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                <?php if($user['smileys'] == 1):?>
                                                    <input class="" name="off" value="Turn Off Smileys" type="submit">
                                                <?php else:?>
                                                    <input class="" name="on" value="Turn On Smileys" type="submit">
                                                <?php endif?>
                                            </form>
                                             <br>
                                             <br>Threads posted in by <?php echo $_SESSION['username'];?>:
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