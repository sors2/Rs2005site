<?php
session_start();
include "../connect.php";  
$user = $_SESSION['username'];
$user_row = mysqli_query($conn, "SELECT * FROM users WHERE username ='$user'");
while($row = mysqli_fetch_assoc($user_row))
{
      $dt = strtotime($row['last_password']);
      $last_password = date('d M Y', $dt);
      $recovery_questions = "Recovery Questions not yet set!";
      if($row['recovery_questions'] != 0){
        $recovery_questions ="Recovery Questions set!";
      }
      $dt = strtotime($row['last_activity']);
      $last_visit = date('d M Y', $dt);

      $userID = $row['userID'];

      $message_rows = mysqli_query($conn, "SELECT * FROM messagecentre WHERE toID = '{$userID}' AND flag = 0");
      $unread = mysqli_num_rows($message_rows);

      $posts = mysqli_query($conn, "SELECT replyID FROM replies WHERE dateReply > '{$row['last_activity']}'");
      $posts = mysqli_num_rows($posts);
      $threads = mysqli_query($conn, "SELECT threadID FROM threads WHERE date_posted > '{$row['last_activity']}'");
      $threads = mysqli_num_rows($threads);
      $posts = $posts + $threads;
}

$online = mysqli_query($conn, "SELECT * FROM users 
                        WHERE last_activity
                        BETWEEN TIMESTAMP( DATE_SUB( NOW() , INTERVAL 5 MINUTE ) ) AND TIMESTAMP( NOW() )");
$total_online = mysqli_num_rows($online);

mysqli_close($conn);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>



<HEAD>
  <META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
  <META http-equiv=refresh content=600;URL=banner.cgi?size=120&amp;rs=1&amp;showside=-1>
  <META http-equiv=Expires content=0>
  <META http-equiv=Pragma content=no-cache>
  <META http-equiv=Cache-Control content=no-cache>
  <META content="MSHTML 6.00.2800.1505" name=GENERATOR>
  <style>
    BODY,
    TD,
    P {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    a:link {
      color: white;
    }
  </style>
</HEAD>

<BODY style="MARGIN: 0px" bgColor=#222233>

  <TABLE height="100%">
    <TBODY>
      <TR vAlign=top>
        <TD align=middle>
          <TABLE cellSpacing=0 cellPadding=0>
            <TBODY>
              <TR>
                <TD vAlign=center align=top><IMG width=44 height=59 src="frame_files/lock.gif" border=0></TD>

        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>

                </NOSCRIPT></CENTER>
        </TD>
      </TR>
    </TBODY>
  </TABLE>
  </TD>
  </TR>
  </TBODY>
  </TABLE>
</BODY>

</HTML>