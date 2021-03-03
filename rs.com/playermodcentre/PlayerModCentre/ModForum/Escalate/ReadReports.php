<?php
    session_start();
    include "../../../../connect.php";
if(!isset($_GET['page'])){
    $page = 1;
}
else{
      $page = $_GET['page'];
}
if(isset($_GET['category'])){
  $stmt = $conn->prepare("SELECT category FROM threads WHERE threadID=?");
  $stmt->bind_param("i",$_GET['threadID']);
  $stmt->execute();
  $result = $stmt->get_result();
  $category = $result -> fetch_assoc();
  $cat = $category['category'];
  $result= mysqli_query($conn, "SELECT * FROM reports WHERE category = $cat ");
  $back = 'EscalateBoard.php?threadID='.$_GET['threadID'].'';
  $title = '<img class="imiddle" title="Refresh" alt="Refresh"
            src="ReadReports_files/refresh.png" border="0" height="13" hspace="0" width="13"><b>Runescape Forums - '.$cat.'</b>';
}
elseif(isset($_GET['threadID'])){
  $stmt = $conn->prepare("SELECT category,title,isLocked,isSticky FROM threads WHERE threadID=?");
  $stmt->bind_param("i",$_GET['threadID']);
  $stmt->execute();
  $result = $stmt->get_result();
  $category = $result -> fetch_assoc();

  $locked ="";
  $stickied ="";
  if($category['isLocked'] == 1){
    $locked =  `<img src="ReadReports_files/locked.png" alt="" title="" height="13" width="13">`;
  }
  if($category['isSticky'] == 1){
    $stickied = '<img src="ReadReports_files/stickied.png" alt="" title="" height="13" width="13">';
  }

  $thread = $_GET['threadID'];
  $result= mysqli_query($conn, "SELECT * FROM reports WHERE threadID = $thread ");
  $back = 'EscalateThread.php?threadID='.$_GET['threadID'].'';
  $title = '<img class="imiddle" title="Refresh" alt="Refresh"
            src="ReadReports_files/refresh.png" border="0" height="13" hspace="0" width="13"><b>Runescape Forums - '.$category['category'].' - '.$category['title'].''.$stickied.''.$locked.'</b>';
}
elseif(isset($_GET['replyID'])){
  $reply = $_GET['replyID'];

  $stmt = $conn->prepare("SELECT threadID FROM replies WHERE replyID=?");
  $stmt->bind_param("i",$_GET['replyID']);
  $stmt->execute();
  $result = $stmt->get_result();
  $reply = $result -> fetch_assoc();

  $stmt = $conn->prepare("SELECT category,title,isLocked,isSticky FROM threads WHERE threadID=?");
  $stmt->bind_param("i",$reply['threadID']);
  $stmt->execute();
  $result = $stmt->get_result();
  $category = $result -> fetch_assoc();

  $result= mysqli_query($conn, "SELECT * FROM reports WHERE replyID = $reply");
  $back = 'Escalate.php?replyID='.$_GET['replyID'].'';
  $title = '<img class="imiddle" title="Refresh" alt="Refresh"
            src="ReadReports_files/refresh.png" border="0" height="13" hspace="0" width="13"><b>Runescape Forums - '.$category['category'].' - '.$category['title'].''.$stickied.''.$locked.'</b>';
}
else{
  header("Location: ../../../../forums/forums.php");
}
$num_per_pages = mysqli_num_rows($result);
$posts_per_page = 3;
if(mysqli_num_rows($result) > 0)
{
      $total_results  = mysqli_num_rows($result);
      $num_per_pages = ceil($total_results/$posts_per_page);
      $start_num = ($page-1) * $posts_per_page;
}
else{
      $num_per_pages  = 1;
      $start_num = 0;
}
 
if(isset($_GET['category'])){
  $result = mysqli_query($conn,"SELECT * FROM reports  WHERE category = $cat ORDER BY `status` ASC LIMIT $start_num,$posts_per_page");
}
elseif(isset($_GET['threadID'])){
  $result = mysqli_query($conn,"SELECT * FROM reports WHERE threadID = $thread ORDER BY `status` ASC LIMIT $start_num,$posts_per_page");
}
elseif(isset($_GET['replyID'])){
  $result = mysqli_query($conn,"SELECT * FROM reports WHERE replyID = $reply ORDER BY `status` ASC LIMIT $start_num,$posts_per_page");
}

$reports=[];
$numberOfUnread = 0;
$line_break = 0;
while($row = mysqli_fetch_assoc($result)){

        $stmt = $conn->prepare("UPDATE reports SET `page` = ? WHERE reportID = ?");
        $stmt->bind_param("ii", $page,$row['reportID']);
        $stmt->execute(); 

      if($row['status'] == 1 && $line_break == 0){
          $line_break = 1;
          $borders = '<tr>
                        <!-- Row 1 -->
                        <td bgcolor="#0B0B0B" width="75px">
                          <hr style="border:2px dotted #ffffff;">
                        </td><!-- Col 1 -->
                        <td bgcolor="#101010">
                          <hr style="border:2px dotted #ffffff;">
                        </td><!-- Col 2 -->
                        <td bgcolor="#0B0B0B" width="80px">
                          <hr style="border:2px dotted #ffffff;">
                        </td><!-- Col 3 -->
                        <td bgcolor="#101010">
                          <hr style="border:2px dotted #ffffff;">
                        </td><!-- Col 4 -->
                        <td bgcolor="#0B0B0B" width="82px">
                          <hr style="border:2px dotted #ffffff;">
                        </td><!-- Col 5 -->
                        <td bgcolor="#101010">
                          <hr style="border:2px dotted #ffffff;">
                        </td>
                      </tr>';
      }
      else{
          $borders = "";
      }
        

        $stmt = $conn->prepare("SELECT title FROM threads WHERE threadID=?");
        $stmt->bind_param("i",$row['threadID']);
        $stmt->execute();
        $result2 = $stmt->get_result();
        $thread = $result2->fetch_assoc();

        $stmt = $conn->prepare("SELECT `page` FROM replies WHERE replyID=?");
        $stmt->bind_param("i",$row['replyID']);
        $stmt->execute();
        $result3 = $stmt->get_result();
        $reply = $result3->fetch_assoc();

        $stmt = $conn->prepare("SELECT username FROM users WHERE userID=?");
        $stmt->bind_param("i",$row['reported_by']);
        $stmt->execute();
        $result4 = $stmt->get_result();
        $user = $result4->fetch_assoc();

        $stmt = $conn->prepare("SELECT username FROM users WHERE userID=?");
        $stmt->bind_param("i",$row['accepted_by']);
        $stmt->execute();
        $result6 = $stmt->get_result();
        $user_action = $result6->fetch_assoc();

        $status = "Pending";
        $dt = strtotime($row['date']);
        $date = date('d M Y', $dt);
        if($row['read_flag'] == 1){
          $read = "Read";
      }
      else{
        $read = "Unread";
        $numberOfUnread += 1;
      }
        if($row['status'] == 1){
            $accepted = 'by '.$user_action['username'];
            $status = "Accepted";
            $read = "";
        }
        else{
          $accepted = "";
        }

        $reports[] = ''.$borders.'<tr><!-- Row 2 -->
                        <td bgcolor="#0B0B0B">'.$date.' </td><!-- Col 1 -->
                        <td bgcolor="#101010">'.$row['message'].'</td><!-- Col 2 -->
                        <td bgcolor="#0B0B0B"><a href="../Profile/ForumProfile.php?user='.$user['username'].'" class="c">'.$user['username'].'</a></td><!-- Col 3 -->
                        <td bgcolor="#101010"><a href="../../../../forums/ForumThread/ThreadView.php?threadID='.$row['threadID'].'&page=1" class="c">'.$thread['title'].'</a></td><!-- Col 4 -->
                        <td bgcolor="#0B0B0B">'.$status.',
                        <br>'.$accepted.''.$read.'</td><!-- Col 5 -->
                        <td bgcolor="#101010"><a href="ReadReportsView.php?reportID='.$row['reportID'].'" class="c">View</a></td>
                        </tr>';
    }
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
  <link rel="shortcut icon" href="../../../../forums/ForumBoard/favicon.ico">
  <link media="all" type="text/css" rel="stylesheet" href="ReadReports_files/main.css">
  <link href="ReadReports_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                  <td valign="top"><img src="ReadReports_files/edge_a.jpg" height="43" hspace="0" vspace="0"
                      width="100"></td>
                  <td valign="top"><img src="ReadReports_files/edge_c.jpg" height="42" hspace="0" vspace="0"
                      width="400"></td>
                  <td valign="top"><img src="ReadReports_files/edge_d.jpg" height="43" hspace="0" vspace="0"
                      width="100"></td>
                </tr>
              </tbody>
            </table>
            <table background="ReadReports_files/background2.jpg" border="0" cellpadding="0" cellspacing="0"
              width="600">
              <tbody>
                <tr>
                  <td valign="bottom">
                    <center>
                      <table bgcolor="black" cellpadding="4" width="500">
                        <tbody>
                          <tr>
                            <td class="e">
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
                      <table bgcolor="black" border="0" cellpadding="4" width="500">
                        <tbody>
                          <tr>
                            <td class="e">
                              <center><?php echo $title;?>
                                <br><b>Escalate - Read Reports</b>
                                <br>
                                <table border="0" width="220px">
                                  <tbody>
                                    <tr>
                                      <!-- Row 1 -->
                                      <?php

                                        $next = $page + 1;
                                        $prev = $page - 1;

                                                                                                                                                                                       
                                                                                                                                                                if($page == 1){
                                                                                                                                                                        if($num_per_pages > 1){
                                                                                                                                                                                
                                                                                                                                                                                echo'<td><img src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"> <img
                                                                                                                                                                                src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 1 -->
                                                                                                                                                                                <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text">
                                                                                                                                                                                        of
                                                                                                                                                                                        '.$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                                <td><a href="ReadReports.php?&page='.$next.'"><img src="ReadReports_files/next.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                                <a href="ReadReports.php?&page='.$num_per_pages.'">
                                                                                                                                                                                                <img
                                                                                                                                                                                                src="ReadReports_files/last.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 3 -->';
                                                                                                                                                                        }
                                                                                                                                                                        else{
                                                                                                                                                                                echo'<td><img src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"><img
                                                                                                                                                                                src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"> 
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 1 -->
                                                                                                                                                                                <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text"> of ' .$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                                <td> <img src=""
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"> <img
                                                                                                                                                                                                src=""
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26">
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 3 -->';
                                                                                                                                                                        }
                                                                                                                                                                }
                                                                                                                                                                elseif($page > 1 && $page == $num_per_pages){
                                                                                                                                                                        echo'<td><a href="ReadReports.php?&page=1"><img src="ReadReports_files/first.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        <a href="ReadReports.php?&page='.$prev.'">
                                                                                                                                                                        <img
                                                                                                                                                                        src="ReadReports_files/previous.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                                        <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text">
                                                                                                                                                                                        of
                                                                                                                                                                                        '.$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                        <!-- Col 2 -->
                                                                                                                                                                        <td><img src="" alt=""
                                                                                                                                                                                        title=""
                                                                                                                                                                                        height="13"
                                                                                                                                                                                        width="26">
                                                                                                                                                                                        <img
                                                                                                                                                                                        src=""
                                                                                                                                                                                        alt=""
                                                                                                                                                                                        title=""
                                                                                                                                                                                        height="13"
                                                                                                                                                                                        width="26">
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 3 -->';
                                                                                                                                                                }
                                                                                                                                                                else{
                                                                                                                                                                        echo'<td><a href="ReadReports.php?&page=1"><img src="ReadReports_files/first.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        <a href="ReadReports.php?&page='.$prev.'">
                                                                                                                                                                        <img
                                                                                                                                                                        src="ReadReports_files/previous.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"> 
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                                        <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text">
                                                                                                                                                                                                of
                                                                                                                                                                                        '.$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                        <td><a href="ReadReports.php?&page='.$next.'"><img src="ReadReports_files/next.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                                <a href="ReadReports.php?&page='.$num_per_pages.'">
                                                                                                                                                                                                <img
                                                                                                                                                                                                src="ReadReports_files/last.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 3 -->';
                                                                                                                                                                }
                                                                                                                                                                ?>
                                    </tr>
                                  </tbody>
                                </table>
                                <a href="<?php echo $back;?>" class="c">Back to Escalate</a>
                                <br>
                                <div style="text-align:left;"><b>Reports:</b></div>
                                <br>
                                <table border="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <!-- Row 1 -->
                                      <td width="50px"><img src="ReadReports_files/letters.jpg" alt="" title=""
                                          height="65" width="95"></td>
                                      <td align="left">You have <font color="#00FF00"><?php echo $numberOfUnread;?></font>
                                        <br>unread reports
                                      </td><!-- Col 1 -->
                                    </tr>
                                  </tbody>
                                </table>
                                <table border="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <!-- Row 1 -->
                                      <td bgcolor="#0B0B0B" width="75px"><b>Date</b></td><!-- Col 1 -->
                                      <td bgcolor="#101010"><b>Message</b></td><!-- Col 2 -->
                                      <td bgcolor="#0B0B0B" width="80px"><b>Reported By</b></td><!-- Col 3 -->
                                      <td bgcolor="#101010"><b>Thread</b></td><!-- Col 4 -->
                                      <td bgcolor="#0B0B0B" width="82px"><b>Status</b></td><!-- Col 5 -->
                                      <td bgcolor="#101010"></td>
                                    </tr>
                                    <?php
                                        foreach($reports as $r){
                                            echo $r;
                                        }
                                    ?>
                                  </tbody>
                                </table>

                                <br>
                                <table border="0" width="220px">
                                  <tbody>
                                    <tr>
                                      <!-- Row 1 -->
                                      <?php

                                        $next = $page + 1;
                                        $prev = $page - 1;

                                                                                                                                                                                       
                                                                                                                                                                if($page == 1){
                                                                                                                                                                        if($num_per_pages > 1){
                                                                                                                                                                                
                                                                                                                                                                                echo'<td><img src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"> <img
                                                                                                                                                                                src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 1 -->
                                                                                                                                                                                <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text">
                                                                                                                                                                                        of
                                                                                                                                                                                        '.$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                                <td><a href="ReadReports.php?&page='.$next.'"><img src="ReadReports_files/next.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                                <a href="ReadReports.php?&page='.$num_per_pages.'">
                                                                                                                                                                                                <img
                                                                                                                                                                                                src="ReadReports_files/last.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 3 -->';
                                                                                                                                                                        }
                                                                                                                                                                        else{
                                                                                                                                                                                echo'<td><img src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"><img
                                                                                                                                                                                src=""
                                                                                                                                                                                alt=""
                                                                                                                                                                                title=""
                                                                                                                                                                                height="13"
                                                                                                                                                                                width="26"> 
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 1 -->
                                                                                                                                                                                <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text"> of ' .$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                                <td> <img src=""
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"> <img
                                                                                                                                                                                                src=""
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26">
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 3 -->';
                                                                                                                                                                        }
                                                                                                                                                                }
                                                                                                                                                                elseif($page > 1 && $page == $num_per_pages){
                                                                                                                                                                        echo'<td><a href="ReadReports.php?&page=1"><img src="ReadReports_files/first.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        <a href="ReadReports.php?&page='.$prev.'">
                                                                                                                                                                        <img
                                                                                                                                                                        src="ReadReports_files/previous.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                                        <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text">
                                                                                                                                                                                        of
                                                                                                                                                                                        '.$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                        <!-- Col 2 -->
                                                                                                                                                                        <td> <img src=""
                                                                                                                                                                                        alt=""
                                                                                                                                                                                        title=""
                                                                                                                                                                                        height="13"
                                                                                                                                                                                        width="26">
                                                                                                                                                                                        <img
                                                                                                                                                                                        src=""
                                                                                                                                                                                        alt=""
                                                                                                                                                                                        title=""
                                                                                                                                                                                        height="13"
                                                                                                                                                                                        width="26">
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 3 -->';
                                                                                                                                                                }
                                                                                                                                                                else{
                                                                                                                                                                        echo'<td><a href="ReadReports.php?&page=1"><img src="ReadReports_files/first.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        <a href="ReadReports.php?&page='.$prev.'">
                                                                                                                                                                        <img
                                                                                                                                                                        src="ReadReports_files/previous.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"> 
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 1 -->
                                                                                                                                                                        <td>page <input value="'.$page.'"
                                                                                                                                                                                                id="uid"
                                                                                                                                                                                                type="text">
                                                                                                                                                                                        of
                                                                                                                                                                                        '.$num_per_pages.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                        <td><a href="ReadReports.php?&page='.$next.'"><img src="ReadReports_files/next.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                                <a href="ReadReports.php?&page='.$num_per_pages.'">
                                                                                                                                                                                                <img
                                                                                                                                                                                                src="ReadReports_files/last.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 3 -->';
                                                                                                                                                                }
                                                                                                                                                                ?>
                                    </tr>
                                  </tbody>
                                </table>
                                <center><a href="<?php echo $back;?>" class="c">Back to Escalate</a>
                                  <br>
                                  <center>


                                    <div style="clear: both;"></div>

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
                    <img src="ReadReports_files/edge_g2.jpg" height="82" hspace="0" vspace="0" width="100">
                  </td>
                  <td valign="bottom">
                    <div style="font-family:Arial,Helvetica,sans-serif; font-size:11px;" align="center">

                      This webpage and its contents is copyright 2005
                      Jagex Ltd<br>

                      To use our service you must agree to our <a
                        href="../../../../forums/ForumBoard/frame2.cgi?page=terms/terms.html"
                        class="c">Terms+Conditions</a> + <a
                        href="../../../../forums/ForumBoard/frame2.cgi?page=privacy/privacy.html" class="c">Privacy
                        policy</a>
                    </div>
                    <img src="ReadReports_files/edge_c.jpg" height="42" hspace="0" vspace="0" width="400">
                  </td>
                  <td valign="bottom">
                    <img src="ReadReports_files/edge_h2.jpg" height="82" hspace="0" vspace="0" width="100">
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