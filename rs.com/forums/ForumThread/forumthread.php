<?php
session_start();
include "../../UserActivity.php";
include "../../connect.php";

include "../../ban.php";
if(isset($_SESSION['username'])){
   if ($stmt->execute()) {
      $result = $stmt->get_result();
      if(mysqli_num_rows($result)){
         $ban = $result->fetch_assoc();
         $current = date("Y-m-d H:i:s");
         if($ban['expire'] > $current){
            header("Location: ../securemenu/securemenu.php");
         }
      }
   }
   $stmt->close();
}

include "../../mute.php";
if(isset($_SESSION['username'])){
        if ($stmt->execute()) {
                $result = $stmt->get_result();
                if(mysqli_num_rows($result)){
                        $mute = $result->fetch_assoc();
                        $current = date("Y-m-d H:i:s");
                        if($mute['expire'] > $current){
                                $muted ="muted";
                        }
                }
   }
   $stmt->close();
}

if(!isset($_GET['threadID'])){
        header('Location: ../forums.php');
}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"></script>
<?php
        if(!isset($_GET['page'])){
                $page = 1;
        }
        else{
                $page = $_GET['page'];
        }
?>

<?php
//get the user logged in permission
$stmt= $conn->prepare("SELECT rolesID FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();   
$result = $stmt->get_result();
$user_current = $result->fetch_assoc();


    $t = $_GET['threadID'];
   $stmt = $conn->prepare("SELECT * FROM replies WHERE threadID =?");
   $stmt->bind_param("i", $_GET['threadID']);
   $stmt->execute();  
   $replies= $stmt->get_result();
   $num_per_pages = mysqli_num_rows($replies);
   $posts_per_page = 10;
   if($num_per_pages > 0)
   {
        $total_results  = $num_per_pages;
        $num_per_pages = ceil($total_results/$posts_per_page);
   }
   $start_num = ($page-1) * $posts_per_page;    
   $stmt = $conn->prepare("SELECT * FROM replies WHERE threadID = ? ORDER BY originalPost DESC LIMIT ?,?");
   $stmt->bind_param("iii", $_GET['threadID'],$start_num,$posts_per_page);
   $stmt->execute();       
   $reply_arr = $stmt->get_result();
   
   $arr_posts = [];
   $testing= [];
   $next_reply = ceil(mysqli_num_rows($replies)/ $posts_per_page) ; // gets the next page
   $mod_colour = 0;
        while($row2 = mysqli_fetch_assoc($reply_arr)){
               
                $post = htmlspecialchars_decode($row2['reply']);
                $r_id = $row2['replyID'];
                $date = strtotime($row2['dateReply']);
                $date_format = date('d M Y h:i', $date);
                $last_edit = "";
                if($row2['last_edit'] != NULL && $row2['edited_by'] != NULL){
                        $edit = strtotime($row2['last_edit']);

                        $stmt= $conn->prepare("SELECT username FROM users WHERE userID = ?");
                        $stmt->bind_param("i", $row2['edited_by']);
                        $stmt->execute();   
                        $result_edit = $stmt->get_result();
                        $user_edit = $result_edit->fetch_assoc();

                        $last_edit = '<div ccID="2612" style="float: right; text-align: right; width: 74%; padding-right: 1%; padding-top:1%; margin-bottom: 1%;">Last edited by '.$user_edit['username'].' on '.date('d M Y h:i', $edit).'</div>';
                }

                $stmt= $conn->prepare("SELECT * FROM users WHERE userID = ?");
                $stmt->bind_param("i", $row2['author']);
                $stmt->execute();   
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if($user['smileys'] == 1){

                        preg_match_all("/\s+:\\)/",$post,$matches); 
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        echo $m;
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/smiley.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/;\\)/",$post,$matches); 
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/wink.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/:P/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/tongue.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/:D/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/grin.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/\s+:\\(/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/sad.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/O_o/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/o.png">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/:\\|/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/nosmile.png">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/\\^\\^/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/a.png">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/:O/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/shocked.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/>:\\)/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/evil.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }

                        preg_match_all("/B\\)/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/cool.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }

                        preg_match_all("/:@/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/undecided.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }

                        preg_match_all("/:\\'\\(/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/cry.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                        preg_match_all("/>:\\(/",$post,$matches);  
                        if(sizeof($matches)>0){
                                $toRemove=[];
                                $toAdd = [];
                                foreach($matches[0] as $m){
                                        $value = $m;
                                        $toRemove[] = $m;
                                        $toAdd[] ='<img src="img/angry.gif">';
                                
                                }
                                $new_message = str_replace($toRemove,$toAdd,$post);
                                $post = $new_message;
                        }
                }
                if ($user['rolesID'] == 3)
                {
                     if($mod_colour % 2 == 0){
                        $colour = "rgb(139,118,0);";  
                     }
                     else{
                        $colour = "rgb(110,98,0);";
                }
                     $role = "<br>&emsp;&emsp;Jagex Mod";
                }
                elseif($user['rolesID'] == 2)
                {
                        if($mod_colour % 2 == 0)
                                $colour = "rgb(11,47,11);";
                        else{
                                $colour = "rgb(10,38,10)";
                        }
                     $role = "<br>&emsp;&emsp;Forum Mod";
                }
                
                else{
                        if($mod_colour % 2 == 0){
                                $colour = "rgb(16,16,16);";
                        }
                        else{
                                $colour = "rgb(11,11,11);";
                        }
                     $role = "";
                }
                if($row2['hidden'] == 1)
                {       
                        if(isset($user_current['rolesID'])){
                                if($user_current['rolesID'] > 1){
                                        $colour = "rgb(51, 0, 0)";
                                        $last_edit="";
                                }
                                else{
                                        $post = "<i>The contents of this message are hidden.</i>";
                                        $colour = "rgb(0, 0, 51);"; 
                                        $last_edit="";  
                                }
                        }
                }
                $edits_p ="";
                $hide ="";
                $escalate = "";

                
                if(isset($user_current['rolesID'])){
                        if($user_current['rolesID'] > 1)
                        {
                                $edits_p = ' <a href="../ForumMessages/EditMessage.php?replyID='.$row2['replyID'].'"><img ccID="2688" src="../ForumThread/img/edit.png" width="30" height="15" alt="" title="edit" /></a>';
                                $escalate= '<br>&emsp;&emsp;<a href="../../playermodcentre/PlayerModCentre/ModForum/Escalate/Escalate.php?replyID='.$row2['replyID'].'">Escalate</a>';
                                $hide = '<br>&emsp;&emsp;<a href="../../playermodcentre/PlayerModCentre/ModForum/PlayerModThread/HidePost.php?replyID='.$row2['replyID'].'"><img src="../../playermodcentre/PlayerModCentre/ModForum/PlayerModThread/Thread_files/hide.png" alt="" title="hide" height="15" width="30"></a> <a href="../../playermodcentre/PlayerModCentre/ModForum/PlayerModThread/UnhidePost.php?replyID='.$row2['replyID'].'"><img src="../../playermodcentre/PlayerModCentre/ModForum/PlayerModThread/Thread_files/unhide.png" alt="" title="unhide" height="15" width="30"></a>';
                        }
                        else{
                                if($_SESSION['username'] == $user['username'] && !isset($muted)){
                                        $edits_p = '<a href="../ForumMessages/EditPost.php?replyID='.$row2['replyID'].'"><img ccID="2688" src="../ForumThread/img/edit.png" width="30" height="15" alt="" title="edit" /></a>';
                                }
                
                        }
                }
                $arr_posts[] = '<div ccID="2405" style="background: none repeat scroll 0% 0% '.$colour.'; padding: 0px 0px 0px 0px;margin-bottom: 0px; overflow: auto;">									
                <div ccID="2546" style="float:left;width:25%; margin-top:1%; text-align: center;">&emsp;&emsp;' . $user['username'].''.$role.''.$escalate.''.$hide.'
                </div>
                <div ccID="2612" style="float: right; text-align: right; width: 74%; padding-right: 1%; padding-top:1%; margin-bottom: 3%;">' .$date_format. ''.$edits_p.'</div>
                <br ccID="2787">
                 <br ccID="2795">
                <div style="float: center; text-align: left;padding-left: 28%; margin-bottom:1em; width: 70%;">
                ' . $post . '
                 </div>
                '.$last_edit.'
                 </div>
                 </div>
                 <div ccID="2898" class="verticalgap" style="height:2px"></div>';
                 
                 $mod_colour++;
        }

        $stmt= $conn->prepare("SELECT category,title,isSticky,isLocked FROM threads WHERE threadID =?");
        $stmt->bind_param("i", $_GET['threadID']);
        $stmt->execute();   
        $result3 = $stmt->get_result();
        $thread_status = $result3->fetch_assoc();
        mysqli_close($conn);

        $sticky = $thread_status['isSticky'];
        $locked = $thread_status['isLocked'];


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
                     <td valign=top><img src=../../../img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td>
                     <td valign=top><img src=../../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td>
                     <td valign=top><img src=../../../img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=../../../img/background2.jpg>
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
                                       <img class="imiddle" title="Refresh" alt="Refresh" src="../forumthread/img/refresh.png" hspace="0" height="13" border="0" width="13">
                                       <b>Runescape Forums - <?php echo urldecode($thread_status['category']);?> - <?php echo $thread_status['title'];?> </b> 
                                       <?php if($sticky==1):?>
                                       <img ccID="2040" src="../forumthread/img/stickied.png" width="13" height="13" alt="" title="" />
                                       <?php endif?>
                                       <?php if($locked==1):?>
                                       <img ccID="2125" src="../forumthread/img/locked.png" width="13" height="13" alt="" title="" />
                                       <?php endif?>
                                       <br><a href="../ForumBoard/forumboard.php?category=<?php echo urlencode($thread_status['category']);?>" class="c">Back to threads page</a>
                                            <?php if(!empty($locked) || !isset($_SESSION['username']) || isset($muted)):?>
                                            <?php if(isset($user_current['rolesID']) && ($user_current['rolesID'] > 1)):?>
                                            - <a href="../ForumMessages/Reply.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo $next_reply;?>">Reply</a>
                                             - <a href="../../playermodcentre/PlayerModCentre/ModForum/Escalate/EscalateThread.php?threadID=<?php echo $_GET['threadID'];?>">Escalate</a>
                                            <?php else:?>
                                            <?php endif;?>
                                            <?php else:?>
                                                <?php if(isset($user_current['rolesID']) && ($user_current['rolesID'] > 1)):?>
                                                        - <a href="../ForumMessages/Reply.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo $next_reply;?>">Reply</a>
                                                        - <a href="../../playermodcentre/PlayerModCentre/ModForum/Escalate/EscalateThread.php?threadID=<?php echo $_GET['threadID'];?>">Escalate</a>
                                                <?php else:?>
                                                        - <a href="../ForumMessages/Reply.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo $next_reply;?>">Reply</a>
                                                <?php endif?>
                                            <?php endif;?>
                                       <br>
                                       <?php
                                            $next = $page + 1;
                                            $prev = $page - 1;
                                            if($num_per_pages == $page && $page > 1)
                                            {
                                                    echo '<a href="forumthread.php?threadID='.$t.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumthread.php?threadID='.$t.'&page=' . $next. '"><img src="" width="26" height="13" alt="" title="" /> </a><a href="forumthread.php?threadID='.$t.'&page=' . $num_per_pages. '"><img src="" width="26" height="13" alt="" title="" /></a>';     
                                            }
                                            elseif($page == 1)
                                            {
                                                    if($num_per_pages > 1)
                                                    {
                                                            echo '<img src="" width="26" height="13" alt="" title="" />page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.' <a href="forumthread.php?threadID='.$t.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>'; 
                                                    }
                                                    else{
                                                            echo 'page <input size="3" id="uid" value="' . $page .'"> of '.$num_per_pages.'';
                                                    }
                                            }       
                                            else{
                                                echo '<a href="forumthread.php?threadID='.$t.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumthread.php?threadID='.$t.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>';     
                                            }
                                        ?>
                                    </center>
                                    <br>
                                    <?php
                                        if (isset($arr_posts))
                                        {
                                                foreach($arr_posts as $posts){
                                                        echo $posts;
                                                        
                                                }
                                        }
                                        
                                    ?>
                                    <br>
                                    <center><a href="../ForumBoard/forumboard.php?category=<?php echo urlencode($thread_status['category']);?>" class="c">Back to threads page</a>
                                            <?php if(!empty($locked) || !isset($_SESSION['username']) || isset($muted)):?>
                                            <?php if(isset($user_current['rolesID']) && ($user_current['rolesID'] > 1)):?>
                                            - <a href="../ForumMessages/Reply.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo $next_reply;?>">Reply</a>
                                             - <a href="../../playermodcentre/PlayerModCentre/ModForum/Escalate/EscalateThread.php?threadID=<?php echo $_GET['threadID'];?>">Escalate</a>
                                            <?php else:?>
                                            <?php endif;?>
                                            <?php else:?>
                                                <?php if(isset($user_current['rolesID']) && ($user_current['rolesID'] > 1)):?>
                                                        - <a href="../ForumMessages/Reply.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo $next_reply;?>">Reply</a>
                                                        - <a href="../../playermodcentre/PlayerModCentre/ModForum/Escalate/EscalateThread.php?threadID=<?php echo $_GET['threadID'];?>">Escalate</a>
                                                <?php else:?>
                                                        - <a href="../ForumMessages/Reply.php?threadID=<?php echo $_GET['threadID'];?>&page=<?php echo $next_reply;?>">Reply</a>
                                                <?php endif?>
                                            <?php endif;?>
                                       <br>
                                            <?php
                                                $next = $page + 1;
                                                $prev = $page - 1;
                                                if($num_per_pages == $page && $page > 1)
                                                {
                                                        echo '<a href="forumthread.php?threadID='.$t.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumthread.php?threadID='.$t.'&page=' . $next. '"><img src="" width="26" height="13" alt="" title="" /> </a><a href="forumthread.php?threadID='.$t.'&page=' . $num_per_pages. '"><img src="" width="26" height="13" alt="" title="" /></a>';     
                                                }
                                                elseif($page == 1)
                                                {
                                                        if($num_per_pages > 1)
                                                        {
                                                                echo '<img src="" width="26" height="13" alt="" title="" />page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.' <a href="forumthread.php?threadID='.$t.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>'; 
                                                        }
                                                        else{
                                                                echo 'page <input size="3" id="uid" value="' . $page .'"> of '.$num_per_pages.'';
                                                        }
                                                }       
                                                else{
                                                    echo '<a href="forumthread.php?threadID='.$t.'&page=1"><img src="img/first.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $prev.'"><img src="img/previous.png" width="26" height="13" alt="" title="" /></a> page <input size="3" id="uid" value="' . $page . '"> of '.$num_per_pages.'<a href="forumthread.php?threadID='.$t.'&page=' . $next. '"> <img src="img/next.png" width="26" height="13" alt="" title="" /></a> <a href="forumthread.php?threadID='.$t.'&page=' . $num_per_pages. '"><img src="img/last.png" width="26" height="13" alt="" title="" /></a>';     
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