<?php
session_start();
include "../ban.php";
if(isset($_SESSION['username'])){
   if ($stmt->execute()) {
      $result = $stmt->get_result();
      if(mysqli_num_rows($result) > 0){
         $ban = $result->fetch_assoc();
         $current = date("Y-m-d H:i:s");
         if($ban['expire'] > $current){
            header("Location: ../securemenu/securemenu.php");
         }
      }
   }
   $stmt->close();
}

$list = [
        "Player Moderator News" => "-",
        "Player Moderator Procedures" => "-",
        "Player Moderator Suggestions" => "-",
        "Player Moderator Archive" => "-",
        "Player Moderator Lounge" => "-",
        "News & Announcements" => "-",
        "General" => "-",
        "Recent Updates" => "-",
        "Future Updates" => "-",
        "Item Discussion" => "-",
        "Locations" => "-",
        "Monsters" => "-",
        "Quests" => "-",
        "Clue Scrolls" => "-",
        "Skills" => "-",
        "Off Topic" => "-",
        "Suggestions" => "-",
        "Tech Support" => "-",
        "Compliments" => "-",
        "Rants" => "-",
        "Forum Feedback" => "-",
        "Crafting" => "-",
        "Fletching" => "-",
        "Farming" => "-",
        "Food" => "-",
        "Herblore" => "-",
        "Ores and Bars" => "-",
        "Discontinued Items" => "-",
        "Runes" => "-",
        "Weapons" => "-",
        "Armour" => "-",
        "Treasure Trail Items" => "-",
        "Miscellaneous" => "-",
        "Events" => "-",
        "Clans Recruitment" => "-",
        "Clans Discussion" => "-",
        "Duelling" => "-",
        "Roleplaying" => "-",
        "PK-ing" => "-",
        "Goals & Achievements" => "-",
        "Stories" => "-",
];

$posts = $list;
$dates = $list;
?>
<?php
                   include "../connect.php";

                        $online = mysqli_query($conn, "SELECT * FROM users 
                        WHERE last_activity
                        BETWEEN TIMESTAMP( DATE_SUB( NOW() , INTERVAL 5 MINUTE ) ) AND TIMESTAMP( NOW() )");
                        $total_online = mysqli_num_rows($online);      
?>

<?php

        $result = mysqli_query($conn, "SELECT COUNT(category) as total,category, max(last_reply) as last_post FROM threads GROUP BY category");
        if(!$result)
         {              
            printf("Something went wrong with the query:\n%s\n", $conn->error);
            exit;
         }
        while($row = mysqli_fetch_assoc($result)){
                $list[$row['category']] = $row['total'];
                $date = strtotime($row['last_post']);
                $date_formated = date('d M Y H:i', $date);
                $dates[$row['category']] = $date_formated;
        }
?>
<?php
        $result = mysqli_query($conn, "SELECT COUNT(replies.threadID) as total, threads.category FROM threads INNER JOIN replies ON threads.threadID = replies.threadID GROUP BY threads.category");
        while($row = mysqli_fetch_assoc($result)){
                $posts[$row['category']] = $row['total'];
        }
        if(isset($_SESSION['username'])){
            $stmt = $conn->prepare("SELECT rolesID FROM users WHERE username = ?");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();  
            $result= $stmt->get_result();
            $user = $result->fetch_assoc();
        }
?>
<html>

<head>
   <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
   <meta content="0" http-equiv="Expires">
   <meta content="no-cache" http-equiv="Pragma">
   <meta content="no-cache" http-equiv="Cache-Control">
   <meta content="TRUE" name="MSSmartTagsPreventParsing">
   <meta content="text/html; charset=windows-1252" http-equiv="content-type">
   <meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming"
      name="Keywords">
   <link rel="shortcut icon" href="../../../../../../rs-website/2003/work/2005/favicon.ico">
   <link media="all" type="text/css" rel="stylesheet" href="ForumsHomepage_files/main.css">
</head>

<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">
<div style="width:100%; height:100%; display:grid; grid-auto-flow: column;  grid-template-columns: 30% 40%;">
    <div style="width: 30%; overflow: hidden; background-color: #222233; float: left;">
        <div style="float: left;">
            <IMG width=44 height=59 src="../frame_files/lock.gif">
        </div>
        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="../securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="../logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="../login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>
    </div>
<div>
   <table width=100% height=100% cellpadding=0 cellspacing=0>
      <tr>
         <td valign=middle>
            <center>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=top><img src=../../img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td>
                     <td valign=top><img src=../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td>
                     <td valign=top><img src=../../img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=../../img/background2.jpg>
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
                        <center>
                           <br>
                           <center>
                              <table cellpadding="4" border="0" bgcolor="black" width="500">
                                 <tbody>
                                    <tr>
                                       <td class="e">
                                          <center><b><a href="forums.htm" class="c"><img class="imiddle" title="Refresh"
                                                      alt="Refresh" src="ForumsHomepage_files/refresh.png" height="13"
                                                      hspace="0" border="0" width="13"></a>
                                                <font color="#FFFFFF">RuneScape Forums</font><br>
                                                <font color="#FFFFFF">
                                                   <?php if($total_online == 1):?>
                                                      1 user online</font>
                                                   <?php else:?>
                                                      <?php echo $total_online;?> users online</font>
                                                   <?php endif?>
                                             </b><br>
                                             <a href="ForumOptions/ForumMods/ForumMods.php" class="c">
                                                <font color="#FFFFFF">
                                                   <font color="#90C040">Forum Moderators</font>
                                                </font>
                                             </a>
                                             <font color="#FFFFFF"> - </font>
                                             <a href="ForumOptions/UserProfile/UserProfile.php" class="c">
                                                <font color="#FFFFFF">
                                                   <font color="#90C040">Forum Profile</font>
                                                </font>
                                             </a>
                                             <font color="#FFFFFF"> - </font>
                                             <a href="ForumOptions/CodeOfConduct/CodeOfConduct.html" class="c">
                                                <font color="#FFFFFF">
                                                   <font color="#90C040">Code of Conduct</font>
                                                </font>
                                             </a>
                                             <font color="#FFFFFF"> - </font><a class="c"
                                                href="http://forum-web.runescape.com/aff/runescape/id/-1062446337492365879/threadfinder.html">
                                                <font color="#FFFFFF">
                                                   <font color="#90C040">Thread Finder</font>
                                                </font>
                                             </a>
                                          </center>
                                          <a href="ForumOptions/ThreadFinder/ThreadFinder.html" class="c"><br></a>
                                          <div style="text-align: left; background: none;">
                                             <br>
                                             <table cellpadding="2" cellspacing="1" border="0" width="490">
                                                <tbody>
                                                   <tr>
                                                      <td width="5%"></td>
                                                      <td width="49%"></td>
                                                      <td width="13%"><b>
                                                            <center>
                                                               <font color="#FFFFFF">Posts</font>
                                                            </center>
                                                         </b></td>
                                                      <td width="13%"><b>
                                                            <center>
                                                               <font color="#FFFFFF">Threads</font>
                                                            </center>
                                                         </b></td>
                                                      <td width="20%"><b>
                                                            <center>
                                                               <font color="#FFFFFF">Last post</font>
                                                            </center>
                                                         </b></td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                              <?php if(isset($user)  && $user['rolesID'] > 1):?>      
                                             <font color="#FFFFFF">Runescape Mods Only</font>
                                                   <table border="0" width="100%">
                                                      <tr>
                                                         <!-- Row 1 -->
                                                         <td width="5%">
                                                            <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator News')?>"><img src="ForumsHomepage_files/PlayerModNews.png" height="25" hspace="0" border="0" width="25"></a></td>
                                                         <td width="49%">
                                                            <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator News')?>"><font color="#FFFFFF"><font color="#90C040">Player Moderator News</font></font></a><br><font color="#FFFFFF">Keep up to date with the latest events</font></td>
                                                         <td width="13%">
                                                            <center><?php echo $posts['Player Moderator News'];?></center>
                                                         </td><!-- Col 3 -->
                                                         <td width="13%">
                                                            <center><?php echo $list['Player Moderator News'];?></center>
                                                         </td><!-- Col 4 -->
                                                         <td width="20%">
                                                            <center><?php echo $dates['Player Moderator News'];?></center>
                                                         </td><!-- Col 5 -->
                                                      </tr>
                                                      <tr>
                                                         <!-- Row 2 -->
                                                         <td width="5%">
                                                            <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Procedures')?>"><img src="ForumsHomepage_files/PlayerModProcedures.png" height="25" hspace="0" border="0" width="25"></a></td>
                                                         <td width="49%">
                                                            <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Procedures')?>"><font color="#FFFFFF"><font color="#90C040">Player Moderator Procedures</font></font></a><br><font color="#FFFFFF">For questions about moderating procedures</font></td>
                                                         <td width="13%">
                                                            <center><?php echo $posts['Player Moderator Procedures'];?></center>
                                                         </td><!-- Col 3 -->
                                                         <td width="13%">
                                                            <center><?php echo $list['Player Moderator Procedures'];?></center>
                                                         </td><!-- Col 4 -->
                                                         <td width="20%">
                                                            <center><?php echo $dates['Player Moderator Procedures'];?></center>
                                                         </td><!-- Col 5 -->
                                                      </tr>
                                                      <tr>
                                                         <!-- Row 3 -->
                                                         <td width="5%">
                                                            <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Suggestions')?>"><img src="ForumsHomepage_files/PlayerModSuggestions.png" height="25" hspace="0" border="0" width="25"></a></td>
                                                         <td width="49%">
                                                            <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Suggestions')?>"><font color="#FFFFFF"><font color="#90C040">Player Moderator Suggestions</font></font></a><br><font color="#FFFFFF">Discuss ideas for features/tools or other areas of moderating</font></td>
                                                         <td width="13%">
                                                            <center><?php echo $posts['Player Moderator Suggestions'];?></center>
                                                         </td><!-- Col 3 -->
                                                         <td width="13%">
                                                            <center><?php echo $list['Player Moderator Suggestions'];?></center>
                                                         </td><!-- Col 4 -->
                                                         <td width="20%">
                                                            <center><?php echo $dates['Player Moderator Suggestions'];?></center>
                                                         </td><!-- Col 5 -->
                                                      </tr>
                                                      <tr>
                                                         <!-- Row 4 -->
                                                         <td width="5%">
                                                            <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Archive')?>"><img src="ForumsHomepage_files/PlayerModArchive.png" height="25" hspace="0" border="0" width="25"></a></td>
                                                         <td width="49%">
                                                            <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Archive')?>"><font color="#FFFFFF"><font color="#90C040">Player Moderator Archive</font></font></a><br><font color="#FFFFFF">Old messages (was RS Modding)</font></td>
                                                         <td width="13%">
                                                            <center><?php echo $posts['Player Moderator Archive'];?></center>
                                                         </td><!-- Col 3 -->
                                                         <td width="13%">
                                                            <center><?php echo $list['Player Moderator Archive'];?></center>
                                                         </td><!-- Col 4 -->
                                                         <td width="20%">
                                                            <center><?php echo $dates['Player Moderator Archive'];?></center>
                                                         </td><!-- Col 5 -->
                                                      </tr>
                                                      <tr>
                                                         <!-- Row 5 -->
                                                         <td width="5%">
                                                            <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Lounge')?>"><img src="ForumsHomepage_files/PlayerModLounge.png" height="25" hspace="0" border="0" width="25"></a></td>
                                                         <td width="49%">
                                                            <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Player Moderator Lounge')?>"><font color="#FFFFFF"><font color="#90C040">Player Moderator Lounge</font></font></a><br><font color="#FFFFFF">Place to relax</font></td>
                                                         <td width="13%">
                                                            <center><?php echo $posts['Player Moderator Lounge'];?></center>
                                                         </td><!-- Col 3 -->
                                                         <td width="13%">
                                                            <center><?php echo $list['Player Moderator Lounge'];?></center>
                                                         </td><!-- Col 4 -->
                                                         <td width="20%">
                                                            <center><?php echo $dates['Player Moderator Lounge'];?></center>
                                                         </td><!-- Col 5 -->
                                                      </tr>
                                                   </table>
                                                   <br>
                                                <?php endif?>
                                             <font color="#FFFFFF">Official</font>
                                             <table cellpadding="2" cellspacing="1" border="0" width="490">
                                                <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('News & Announcements')?>"><img src="ForumsHomepage_files/newsannouncements.png" height="25" hspace="0" border="0" width="25"></a></td>
                                                    <td width="49%">
                                                        <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('News & Announcements')?>"><font color="#FFFFFF"><font color="#90C040">News &amp; Announcements</font></font></a><br><font color="#FFFFFF">Discuss the latest news</font></td>
                                                    <td width="13%">
                                                    <center><font color="#FFFFFF"><?php echo $posts['News & Announcements'];?></font></center>
                                                    </td>
                                                    <td width="13%">
                                                    <center><font color="#FFFFFF"><?php echo $list['News & Announcements'];?></font></center>
                                                    </td>
                                                    <td width="20%">
                                                    <center><font color="#FFFFFF"><?php echo $dates['News & Announcements'];?></font>
                                                    <center></center></center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                        <font color="#FFFFFF">Game</font>
                                        <table cellpadding="2" cellspacing="1" border="0" width="490">
                                            <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        <a href="ForumBoard/forumboard.php?category=<?php echo urlencode('General')?>">
                                                        <img src="ForumsHomepage_files/general.gif" height="25" hspace="0" border="0" width="25">
                                                        </a>
                                                    </td>
                                                    <td width="49%">
                                                        <a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('General')?>">
                                                            <font color="#FFFFFF"><font color="#90C040">General</font></font>
                                                        </a>
                                                        <br><font color="#FFFFFF">For any topic not covered by other forums</font>
                                                    </td>
                                                    <td width="13%">
                                                        <center><font color="#FFFFFF"><?php echo $posts['General'];?></font></center>
                                                    </td>
                                                    <td width="13%">
                                                        <center><font color="#FFFFFF"><?php echo $list['General'];?></font></center>
                                                    </td>
                                                    <td width="20%">
                                                        <center><font color="#FFFFFF"><?php echo $dates['General'];?></font>
                                                        <center></center></center>
                                                    </td>
                                                </tr>
                                                <tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Recent Updates')?>"><img src="ForumsHomepage_files/recentupdates.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Recent Updates')?>"><font color="#90C040">Recent Updates</font></a><br><font color="#FFFFFF">Discuss the latest changes</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Recent Updates'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Recent Updates'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Recent Updates'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Future Updates')?>"><img src="ForumsHomepage_files/futureupdates.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Future Updates')?>"><font color="#90C040">Future Updates</font></a><br><font color="#FFFFFF">Discuss suspected future releases</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Future Updates'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Future Updates'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Future Updates'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Item Discussion')?>"><img src="ForumsHomepage_files/itemdiscussion.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Item Discussion')?>"><font color="#90C040">Item Discussion</font></a><br><font color="#FFFFFF">What are the best items?</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Item Discussion'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Item Discussion'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Item Discussion'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Locations')?>"><img src="ForumsHomepage_files/locations.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Locations')?>"><font color="#90C040">Locations</font></a><br><font color="#FFFFFF">Journey to someplace new</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Locations'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Locations'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Locations'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Monsters')?>"><img src="ForumsHomepage_files/monsters.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Monsters')?>"><font color="#90C040">Monsters</font></a><br><font color="#FFFFFF">Monsters, Monsters, Monsters</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Monsters'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Monsters'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Monsters'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Quests')?>"><img src="ForumsHomepage_files/quests.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Quests')?>"><font color="#90C040">Quests</font></a><br><font color="#FFFFFF">Get quest help here</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Quests'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Quests'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Quests'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Clue Scrolls')?>"><img src="ForumsHomepage_files/cluescrolls.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Clue Scrolls')?>"><font color="#90C040">Clue Scrolls</font></a><br><font color="#FFFFFF">Stuck with a clue? Get help here</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Clue Scrolls'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Clue Scrolls'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Clue Scrolls'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Skills')?>"><img src="ForumsHomepage_files/skills.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Skills')?>"><font color="#90C040">Skills</font></a><br><font color="#FFFFFF">Talk about skills</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Skills'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Skills'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Skills'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Off Topic')?>"><img src="ForumsHomepage_files/offtopic.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Off Topic')?>"><font color="#90C040">Off Topic</font></a><br><font color="#FFFFFF">Non-RuneScape related discussion</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Off Topic'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Off Topic'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Off Topic'];?></font>
<center></center></center></td></tr></tbody></table><br><font color="#FFFFFF">Support</font>
<table cellpadding="2" cellspacing="1" border="0" width="490">
<tbody>
<tr>
<td width="5%"><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Suggestions')?>"><img src="ForumsHomepage_files/suggestions.png" height="25" hspace="0" border="0" width="25"></a></td>
<td width="49%"><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Suggestions')?>"><font color="#90C040">Suggestions</font></a><br><font color="#FFFFFF">Ideas for improving the game</font></td>
<td width="13%">
<center><font color="#FFFFFF"><?php echo $posts['Suggestions'];?></font></center></td>
<td width="13%">
<center><font color="#FFFFFF"><?php echo $list['Suggestions'];?></font></center></td>
<td width="20%">
<center><font color="#FFFFFF"><?php echo $dates['Suggestions'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Tech Support')?>"><img src="ForumsHomepage_files/techsupport.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Tech Support')?>" class="c"><font color="#90C040">Tech Support</font></a><br><font color="#FFFFFF">Get tech help from other players</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Tech Support'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Tech Support'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Tech Support'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Compliments')?>"><img src="ForumsHomepage_files/compliments.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Compliments')?>"><font color="#90C040">Compliments</font></a><br><font color="#FFFFFF">Make Jagex feel good</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Compliments'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Compliments'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Compliments'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Rants')?>"><img src="ForumsHomepage_files/rants.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Rants')?>"><font color="#90C040">Rants</font></a><br><font color="#FFFFFF">Vent your frustration but behave!</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Rants'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Rants'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Rants'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Forum Feedback')?>"><img src="ForumsHomepage_files/forumfeedback.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Forum Feedback')?>"><font color="#90C040">Forum Feedback</font></a><br><font color="#FFFFFF">Post feedback about forums here</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Forum Feedback'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Forum Feedback'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Forum Feedback'];?></font>
<center></center></center></td></tr></tbody></table><br><font color="#FFFFFF">Marketplace</font>
<table cellpadding="2" cellspacing="1" border="0" width="490">
<tbody>
<tr>
<td width="5%"><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Crafting')?>"><img src="ForumsHomepage_files/crafting.png" height="25" hspace="0" border="0" width="25"></a></td>
<td width="49%"><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Crafting')?>"><font color="#90C040">Crafting</font></a><br><font color="#FFFFFF">Gems, leather, glass and so forth</font></td>
<td width="13%">
<center><font color="#FFFFFF"><?php echo $posts['Crafting'];?></font></center></td>
<td width="13%">
<center><font color="#FFFFFF"><?php echo $list['Crafting'];?></font></center></td>
<td width="20%">
<center><font color="#FFFFFF"><?php echo $dates['Crafting'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Fletching')?>"><img src="ForumsHomepage_files/fletching.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Fletching')?>"><font color="#90C040">Fletching</font></a><br><font color="#FFFFFF">All a fletcher needs</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Fletching'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Fletching'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Fletching'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Farming')?>"><img src="ForumsHomepage_files/farming.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Farming')?>"><font color="#90C040">Farming</font></a><br><font color="#FFFFFF">Everything a farmer needs</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Farming'];?></font></center></td>
<td>
<center><font color="#FFFFFF"<?php echo $list['Farming'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Farming'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Food')?>"><img src="ForumsHomepage_files/food.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Food')?>"><font color="#90C040">Food</font></a><br><font color="#FFFFFF">Hungry?</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Food'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Food'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Food'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Herblore')?>"><img src="ForumsHomepage_files/herblore.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Herblore')?>"><font color="#90C040">Herblore</font></a><br><font color="#FFFFFF">Trade potions and ingredients</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Herblore'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Herblore'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Herblore'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Ores and Bars')?>"><img src="ForumsHomepage_files/oresandbars.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Ores and Bars')?>"><font color="#90C040">Ores and Bars</font></a><br><font color="#FFFFFF">For all your metallic needs</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Ores and Bars'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Ores and Bars'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Ores and Bars'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Discounted Items')?>"><img src="ForumsHomepage_files/discontinueditems.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Discounted Items')?>"><font color="#90C040">Discontinued Items</font></a><br><font color="#FFFFFF">The rarer the better</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Discontinued Items'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Discontinued Items'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Discontinued Items'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Runes')?>"><img src="ForumsHomepage_files/runes.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Runes')?>"><font color="#90C040">Runes</font></a><br><font color="#FFFFFF">Need a rune?</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Runes'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Runes'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Runes'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Weapons')?>"><img src="ForumsHomepage_files/weapons.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Weapons')?>"><font color="#90C040">Weapons</font></a><br><font color="#FFFFFF">Buy weaponry</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Weapons'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Weapons'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Weapons'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Armour')?>"><img src="ForumsHomepage_files/armour.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Armour')?>"><font color="#90C040">Armour</font></a><br><font color="#FFFFFF">Sell armour</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Armour'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Armour'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Armour'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Treasure Trail Items')?>"><img src="ForumsHomepage_files/treasuretrailitems.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Treasure Trail Items')?>"><font color="#90C040">Treasure Trail Items</font></a><br><font color="#FFFFFF">For treasure trail rewards</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Treasure Trail Items'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Treasure Trail Items'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Treasure Trail Items'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Miscellaneous')?>"><img src="ForumsHomepage_files/miscellaneous.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Miscellaneous')?>"><font color="#90C040">Miscellaneous</font></a><br><font color="#FFFFFF">Trade anything else here</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Miscellaneous'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Miscellaneous'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Miscellaneous'];?></font>
<center></center></center></td></tr></tbody></table><br><font color="#FFFFFF">Community</font>
<table cellpadding="2" cellspacing="1" border="0" width="490">
<tbody>
<tr>
<td width="5%"><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Events')?>"><img src="ForumsHomepage_files/events.png" height="25" hspace="0" border="0" width="25"></a></td>
<td width="49%"><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Events')?>"><font color="#90C040">Events</font></a><br><font color="#FFFFFF">Forthcoming events</font></td>
<td width="13%">
<center><font color="#FFFFFF"><?php echo $posts['Events'];?></font></center></td>
<td width="13%">
<center><font color="#FFFFFF"><?php echo $list['Events'];?></font></center></td>
<td width="20%">
<center><font color="#FFFFFF"><?php echo $dates['Events'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Clan Recruitment')?>"><img src="ForumsHomepage_files/clansrecruitment.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Clan Recruitment')?>"><font color="#90C040">Clans Recruitment</font></a><br><font color="#FFFFFF">Advertise and recruit for your clan</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Clans Recruitment'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Clans Recruitment'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Clans Recruitment'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Clan Discussion')?>"><img src="ForumsHomepage_files/clansdiscussion.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Clan Discussion')?>"><font color="#90C040">Clans Discussion</font></a><br><font color="#FFFFFF">Clan stories, discussions and general chat</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Clans Discussion'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Clans Discussion'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Clans Discussion'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Duelling')?>"><img src="ForumsHomepage_files/duelling.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Duelling')?>"><font color="#90C040">Duelling</font></a><br><font color="#FFFFFF">Organise and discuss duels</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Duelling'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Duelling'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Duelling'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Roleplaying')?>"><img src="ForumsHomepage_files/roleplaying.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Roleplaying')?>"><font color="#90C040">Roleplaying</font></a><br><font color="#FFFFFF">For all things roleplaying</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Roleplaying'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Roleplaying'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Roleplaying'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('PK-ing')?>"><img src="ForumsHomepage_files/pking.gif" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('PK-ing')?>"><font color="#90C040">PK-ing</font></a><br><font color="#FFFFFF">Player Killing</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['PK-ing'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['PK-ing'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['PK-ing'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Goals & Achievements')?>"><img src="ForumsHomepage_files/goalsachievements.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Goals & Achievements')?>"><font color="#90C040">Goals &amp; Achievements</font></a><br><font color="#FFFFFF">Let others know about your goals and achievements</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Goals & Achievements'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Goals & Achievements'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Goals & Achievements'];?></font>
<center></center></center></td></tr>
<tr>
<td><a href="ForumBoard/forumboard.php?category=<?php echo urlencode('Stories')?>"><img src="ForumsHomepage_files/stories.png" height="25" hspace="0" border="0" width="25"></a></td>
<td><a class="c" href="ForumBoard/forumboard.php?category=<?php echo urlencode('Stories')?>"><font color="#90C040">Stories</font></a><br><font color="#FFFFFF">Tell people your cool stories</font></td>
<td>
<center><font color="#FFFFFF"><?php echo $posts['Stories'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $list['Stories'];?></font></center></td>
<td>
<center><font color="#FFFFFF"><?php echo $dates['Stories'];?></font>
                                                            <center></center>
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <center><br></center>
                                             <br>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table><br>
                           </center>
                        </center>
                     </td>
                  </tr>
                  </tbody>
               </table>
               <table cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                        <td valign="bottom">
                           <img src="ForumsHomepage_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                        </td>
                        <td valign="bottom">
                           <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">

                              This webpage and its contents is copyright 2005
                              Jagex Ltd<br>

                              To use our service you must agree to our <a
                                 href="../../../../../../rs-website/2003/work/2005/frame2.cgi?page=terms/terms.html"
                                 class="c">Terms+Conditions</a> + <a
                                 href="../../../../../../rs-website/2003/work/2005/frame2.cgi?page=privacy/privacy.html"
                                 class="c">Privacy policy</a>
                           </div>
                           <img src="ForumsHomepage_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                        </td>
                        <td valign="bottom">
                           <img src="ForumsHomepage_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
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
<?php include "../UserActivity.php"; ?>