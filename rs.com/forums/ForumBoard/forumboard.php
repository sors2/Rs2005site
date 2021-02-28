<html>

<?php 
include "../../UserActivity.php";
session_start();
if(!isset($_GET['category'])){
        header('Location: ../forums.php');
}
include "../../connect.php";

if(!isset($_GET['page'])){
        $page = 1;
}
else{
       $page = $_GET['page']; 
}

$category = urldecode($_GET['category']);
$stmt = $conn->prepare("SELECT * FROM threads WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$numOfTitles = $stmt->get_result();
$posts_per_page = 3;
if(mysqli_num_rows($numOfTitles) > 0)
{
        $total_results  = mysqli_num_rows($numOfTitles);
        $num_per_pages = ceil($total_results/$posts_per_page);
        $start_num = ($page-1) * $posts_per_page;
}
else{
        $start_num = 0;
        $num_per_pages = 1;
}


$t_id=[];
$titles=[];
$authors=[];
$last =[];
$last_reply=[];
$total=[];
$threads = [];
$stmt = $conn->prepare("SELECT * FROM threads WHERE category = ? ORDER BY isSticky DESC, date_posted DESC LIMIT ?,?");
$stmt->bind_param("sii", $category,$start_num,$posts_per_page);
$stmt->execute();       
$title_results = $stmt->get_result();
$counter = 0;
 while($row = mysqli_fetch_assoc($title_results)){

        $stmt = $conn->prepare("UPDATE threads SET `page` = ? WHERE threadID = ?");
        $stmt->bind_param("ii", $page,$row['threadID']);
        $stmt->execute(); 

        $stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
        $stmt->bind_param("i", $row['author']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $user= $result->fetch_assoc();

        $stmt = $conn->prepare("SELECT rolesID FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $current_user = $result->fetch_assoc();

        $stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
        $stmt->bind_param("i", $row['last_author']);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $last_user= $result->fetch_assoc();

        $dt = strtotime($row["last_reply"]);
        $date = date("d M Y H:i",$dt);
        
        $sticky = "";
        $locked = "";
        if($row['isSticky'])
        {
                $sticky = '<img src="img/stickied.png" width="13" height="13" alt="" title="" />';   
        }
        if($row['isLocked'])
        {
                $locked = '<img src="img/locked.png" width="13" height="13" alt="" title="" />';
        }
        $colour = "rgb(11,11,11);";
        if($counter % 2 == 0){
            $colour = "rgb(16,16,16);";
        }
        $tools = "";
        $hide="";
        if(isset($_SESSION['permission']) && $_SESSION['permission'] > 1){
                $tools = '<a href="../../playermodcentre/PlayerModCentre/ModForum/Escalate/EscalateBoard.php?threadID='.$row["threadID"].'">Escalate</a>' ;
                $hide = '<a href="../../playermodcentre/PlayerModCentre/ModForum/PlayerModBoard/HideThread.php?threadID='.$row['threadID'].'"><img src="../../playermodcentre/PlayerModCentre/ModForum/PlayerModThread/Thread_files/hide.png" alt="" title="hide" height="15" width="30"></a> <a href="../../playermodcentre/PlayerModCentre/ModForum/PlayerModBoard/UnhideThread.php?threadID='.$row['threadID'].'"><img src="../../playermodcentre/PlayerModCentre/ModForum/PlayerModThread/Thread_files/unhide.png" alt="" title="unhide" height="15" width="30"></a>';
        }
        if($row['hidden'] == 1){

               if($current_user['rolesID'] >1){
                  $threads[] = 
                  '<div style="background: none repeat scroll 0% 0% rgb(51,0,0); padding: 0px 0px 0px 6px;margin-bottom: 0px; height: 40px">
                  <div style="height:5px;"> 
                  </div>
                  <div style="float: left; text-align: left; width: 100%;">'.$sticky.''.$locked.'
                  <a href="../ForumThread/forumthread.php?threadID='.$row['threadID'].'" class="c">' . $row["title"] . '</a> '.$hide.'
                  <br>started by ' . $user["username"] . ' '.$tools.'
                   <div style="margin-top:-34px">
                  <div style="float: right; text-align: center; width: 150px;">&emsp;' . $date . ' by
                  <br>' . $last_user["username"] .  ' </div>
                  <div style="height:8px;"> 
                  </div>
                  <div style="float: right; text-align: right; width: 10px;"> ' . $row['total_posts'] . ' </div></div>
                                  </div></div>
                  </div> <div class="verticalgap" style="height:2px"></div>';
               }
               else{
                   $threads[] = '<div style="background: none repeat scroll 0% 0% rgb(0,0,51); padding: 0px 0px 0px 6px;margin-bottom: 0px; height: 40px">
                            <div style="height:5px;"></div>
                            <div style="float: left; text-align: center; margin-top:1%; width: 100%;"> '.$hide.'<i>Thread has been hidden.</i><br></div>
                            </div> <div class="verticalgap" style="height:2px"></div>';
               }
        }
        else{
                $threads[] = 
                            '<div style="background: none repeat scroll 0% 0% '.$colour.' padding: 0px 0px 0px 6px;margin-bottom: 0px; height: 40px">
                            <div style="height:5px;"> 
                            </div>
                            <div style="float: left; text-align: left; width: 100%;">'.$sticky.''.$locked.'
                            <a href="../ForumThread/forumthread.php?threadID='.$row['threadID'].'" class="c">' . $row["title"] . '</a> '.$hide.'
                            <br>started by ' . $user["username"] . ' '.$tools.'
                             <div style="margin-top:-34px">
                            <div style="float: right; text-align: center; width: 150px;">&emsp;' . $date . ' by
                            <br>' . $last_user["username"] .  ' </div>
                            <div style="height:8px;"> 
                            </div>
                            <div style="float: right; text-align: right; width: 10px;"> ' . $row['total_posts'] . ' </div></div>
                                            </div></div>
                            </div> <div class="verticalgap" style="height:2px"></div>';
        }
        $counter++;
} 
mysqli_close($conn);
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
                        <br>
                        <center>
                           <table width=500 bgcolor=black cellpadding=4 border=0>
                              <tr>
                                 <td class=e>
                                    <center><a href="forumboard.php?category=<?php echo urldecode($_GET['category']);?>"><img class="imiddle" title="Refresh" alt="Refresh"
                                             src="img/refresh.png" hspace="0" height="13" border="0"
                                             width="13"></a> <b>Runescape Forums - <?php echo urldecode($_GET['category']);?></b>
                                       <br><a href="../forums.php" class="c">Back to forums home</a>
                                       <?php if(isset($_SESSION['username'])) :?>
                                            - <a ccID="2083" href="../ForumMessages/CreateNewThread.php?category=<?php echo urlencode($category);?>&page=<?php echo $page;?>">Create new thread</a>
                                        <?php else:?>
                                        <?php endif;?>
                                       <br>
                                       <?php
                                            $c = urlencode($category);
                                            $next = $page + 1;
                                            $prev = $page - 1;
                                            if($num_per_pages == $page && $page > 1)
                                            {
                                             echo '<a href="forumboard.php?category='.$c.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumboard.php?category='.$c.'&page=' . $next. '"><img src="" width="26" height="13" alt="" title="" /> </a><a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="" width="26" height="13" alt="" title="" /></a>';     
                                            }
                                            elseif($page == 1)
                                            {
                                                    if($num_per_pages > 1)
                                                    {
                                                            echo '<img src="" width="26" height="13" alt="" title="" />page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.' <a href="forumboard.php?category='.$c.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>'; 
                                                    }
                                                    else{
                                                            echo 'page <input size="3" id="uid" value="' . $page .'"> of '.$num_per_pages.'';
                                                    }
                                            }       
                                            else{
                                                echo '<a href="forumboard.php?category='.$c.'"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumboard.php?category='.$c.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>';     
                                            }
                                        ?>
                                    </center>
                                    <br>
                                    <br>
                                    <div style="float: left; text-align: left; width: 100%;"><b>Thread name</b>
                                       <div style="float: right; text-align: center; width: 170px;">&emsp;&emsp;&emsp;
                                          <b>Last Post</b> </div>
                                       <div style="float: right; text-align: right; width: 10px;"> <b>Messages</b>
                                       </div>
                                    </div>
                                    <br>
                                    <?php
                                        if(isset($threads)){
                                            foreach($threads as $t){
                                                echo $t;
                                            }
                                        }
                                    ?>
                                    <br>
                                    <br>
                                    <center> <a href="../forums.php" class="c">Back to forums home</a>
                                       <?php if(isset($_SESSION['username'])) :?>
                                            - <a ccID="2083" href="../ForumMessages/CreateNewThread.php?category=<?php echo urlencode($category);?>&page=<?php echo $page;?>">Create new thread</a>
                                        <?php else:?>
                                        <?php endif;?>
                                       <br>
                                       <?php
                                           $c = urlencode($category);
                                           $next = $page + 1;
                                           $prev = $page - 1;
                                           if($num_per_pages == $page && $page > 1)
                                           {
                                                   echo '<a href="forumboard.php?category='.$c.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumboard.php?category='.$c.'&page=' . $next. '"><img src="" width="26" height="13" alt="" title="" /> </a><a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="" width="26" height="13" alt="" title="" /></a>';     
                                           }
                                           elseif($page == 1)
                                           {
                                                   if($num_per_pages > 1)
                                                   {
                                                           echo '<img src="" width="26" height="13" alt="" title="" />page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.' <a href="forumboard.php?category='.$c.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>'; 
                                                   }
                                                   else{
                                                           echo 'page <input size="3" id="uid" value="' . $page .'"> of '.$num_per_pages.'';
                                                   }
                                           }       
                                           else{
                                               echo '<a href="forumboard.php?category='.$c.'"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumboard.php?category='.$c.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumboard.php?category='.$c.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>';     
                                           }
                                       ?>
                                    </center>
                                    </div>
                                    <div style="clear: both;"></div>
                                    </div>
                           </table><br>
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