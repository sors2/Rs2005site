<?php 
session_start();
include "../../../../connect.php";
$profile_user = urldecode($_GET['user']);
if(isset($_POST['mute'])){
    if(isset($_POST['mute_check'])){
            $stmt = $conn->prepare("UPDATE users SET ban_status = NULL FROM users WHERE username = ?");
            $stmt->bind_param("s",$profile_user);
            $stmt->execute();
    }
    else{
        if(isset($_POST['mute_length'])){
            $hours = $_POST['mute_length'];
            $date = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $hours)));

            $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
            $stmt->bind_param("s",$_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $action_user = $result->fetch_assoc();

            $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
            $stmt->bind_param("s",$profile_user);
            $stmt->execute();
            $result = $stmt->get_result();
            $receiver_user = $result->fetch_assoc();

            $date_current = date("Y-m-d H:i:s");
            //0 is default which is mute for "type"
            $query = ("INSERT INTO mutedetails (userID,muted_by,rule,`date`,amount,expire) VALUES (?,?,?,?,?,?)");
            if (!$stmt = mysqli_prepare($conn, $query))
            {
                echo "Error: ".$stmt->error;
                exit();
            }
            if(!$stmt->bind_param("iissis",$receiver_user['userID'],$action_user['userID'],$_POST['mute_offense'],$date_current,$hours,$date))
            {
                echo "Error: ".$stmt->error;
                exit();
            }
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error: ".$stmt->error;
            }
            $stmt->close();
        }
    }
    mysqli_close($conn);
}
if(isset($_POST['ban'])){
    if(isset($_POST['ban_check'])){
        $stmt = $conn->prepare("UPDATE users SET ban_status = NULL FROM users WHERE username = ?");
        $stmt->bind_param("s",$profile_user);
        $stmt->execute();
    }
    else{
        if(isset($_POST['ban_length'])){
                $hours = $_POST['ban_length'];
                $date = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $hours)));
    
                $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
                $stmt->bind_param("s",$_SESSION['username']);
                $stmt->execute();
                $result = $stmt->get_result();
                $action_user = $result->fetch_assoc();
    
                $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
                $stmt->bind_param("s",$profile_user);
                $stmt->execute();
                $result = $stmt->get_result();
                $receiver_user = $result->fetch_assoc();

                $date_current = date("Y-m-d H:i:s");
                $n = 1;
                $query = ("INSERT INTO bandetails (userID,rule,`type`,ban_by,`date`,amount,expire) VALUES (?,?,?,?,?,?,?)");
                if (!$stmt = mysqli_prepare($conn, $query))
                {
                    echo "Error: ".$stmt->error;
                    exit();
                }
                if(!$stmt->bind_param("isiisis",$receiver_user['userID'],$_POST['ban_offense'],$n,$action_user['userID'],$date_current,$hours,$date))
                {
                    echo "Error: ".$stmt->error;
                    exit();
                }
                if ($stmt->execute()) {
                    echo "success";
                } else {
                    echo "Error: ".$stmt->error;
                }
                $stmt->close();
            }
    }
    mysqli_close($conn);
}
$profile_user_encode = urlencode($profile_user);
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
        <link rel="shortcut icon" href="ForumBoard/favicon.ico">
        <link media="all" type="text/css" rel="stylesheet" href="ProfileMuteBan_files/main.css">
        <link href="ProfileMuteBan_files/forum-3.css" rel="stylesheet" type="text/css" media="all">
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
                                                                                        src="ProfileMuteBan_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="ProfileMuteBan_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="ProfileMuteBan_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="ProfileMuteBan_files/background2.jpg" border="0"
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
                                                                                                                        <center><b>Forum Profile
                                                                                                                                        -
                                                                                                                                        <?php echo $profile_user;?> 
                                                                                                                                        -
                                                                                                                                        Mute/Ban</b>
                                                                                                                                <br><a href="ForumProfile.php?user=<?php echo urlencode($profile_user);?>"
                                                                                                                                        class="c">Back
                                                                                                                                        to
                                                                                                                                        forum
                                                                                                                                        profile</a>
                                                                                                                        </center>
                                                                                                                        <br>
                                                                                                                        <br>
                                                                                                                        <div
                                                                                                                                style="float:left; text-align:left;">
                                                                                                                                <b>Mute:
                                                                                                                                        <br>
                                                                                                                                        <br></b>Mark
                                                                                                                                to
                                                                                                                                unmute
                                                                                                                                user
                                                                                                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?user=$profile_user_encode");?>" method="POST">
                                                                                                                                <input  name="mute_check"
                                                                                                                                        type="checkbox">
                                                                                                                                <br>
                                                                                                                                Mute
                                                                                                                                length:
                                                                                                                                <select name="mute_length">
                                                                                                                                        <option
                                                                                                                                                selected="selected">
                                                                                                                                                4
                                                                                                                                        </option>
                                                                                                                                        <option>8
                                                                                                                                        </option>
                                                                                                                                        <option>16
                                                                                                                                        </option>
                                                                                                                                        <option>32
                                                                                                                                        </option>
                                                                                                                                        <option>48
                                                                                                                                        </option>
                                                                                                                                </select>
                                                                                                                                hours
                                                                                                                                <br>
                                                                                                                                Type of offense:
                                                                                                                                <select name="mute_offense">
                                                                                                                                    <option>Spamming</option>
                                                                                                                                    <option>Flaming</option>
                                                                                                                                    <option>Advertising</option>
                                                                                                                                    <option>Staff Impersonation</option>
                                                                                                                                    <option>Offensive Lanuage</option>
                                                                                                                                    <option>Malicious Activity</option>
                                                                                                                                </select>
                                                                                                                                <br><br><input
                                                                                                                                        name="mute"
                                                                                                                                        value="Mute"
                                                                                                                                        type="submit">
                                                                                                                                    </form>
                                                                                                                                <br>
                                                                                                                                <br><b>Ban:</b>
                                                                                                                                <br>
                                                                                                                                <br>Mark
                                                                                                                                to
                                                                                                                                unban
                                                                                                                                user
                                                                                                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?user=$profile_user_encode");?>" method="POST">
                                                                                                                                <input
                                                                                                                                        type="checkbox" name="ban_check">
                                                                                                                                <br>Ban
                                                                                                                                from
                                                                                                                                forums:
                                                                                                                                <select name="ban_length">
                                                                                                                                        <option
                                                                                                                                                selected="selected">
                                                                                                                                                4
                                                                                                                                        </option>
                                                                                                                                        <option>8
                                                                                                                                        </option>
                                                                                                                                        <option>16
                                                                                                                                        </option>
                                                                                                                                        <option>32
                                                                                                                                        </option>
                                                                                                                                        <option>48
                                                                                                                                        </option>
                                                                                                                                        <option>72
                                                                                                                                        </option>
                                                                                                                                        <option>96
                                                                                                                                        </option>
                                                                                                                                        <option>permanent
                                                                                                                                        </option>
                                                                                                                                </select>
                                                                                                                                hours
                                                                                                                                <br>
                                                                                                                                Type of offense:
                                                                                                                                <select name="ban_offense">
                                                                                                                                    <option>Spamming</option>
                                                                                                                                    <option>Flaming</option>
                                                                                                                                    <option>Advertising</option>
                                                                                                                                    <option>Staff Impersonation</option>
                                                                                                                                    <option>Offensive Lanuage</option>
                                                                                                                                    <option>Malicious Activity</option>
                                                                                                                                </select>
                                                                                                                                <br><br><input
                                                                                                                                        name="ban"
                                                                                                                                        value="Ban"
                                                                                                                                        type="submit">
                                                                                                                                        </form>
                                                                                                                        </div>



                                                                                                                        <table border="0"
                                                                                                                                cellpadding="2"
                                                                                                                                cellspacing="1"
                                                                                                                                width="455">







                                                                                                                        </table>
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
                                                                                <img src="ProfileMuteBan_files/edge_g2.jpg"
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
                                                                                <img src="ProfileMuteBan_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="ProfileMuteBan_files/edge_h2.jpg"
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