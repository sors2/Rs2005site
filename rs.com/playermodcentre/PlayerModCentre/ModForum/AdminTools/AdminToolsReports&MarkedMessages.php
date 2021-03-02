<?php 
session_start();
include "../../../../connect.php";

if(!isset($_GET['page'])){
        $page = 1;
}
else{
        $page = $_GET['page'];
}
$result= mysqli_query($conn, "SELECT * FROM reports");
$num_per_pages1 = mysqli_num_rows($result);
$posts_per_page = 5;
if(mysqli_num_rows($result) > 0)
{
        $total_results  = mysqli_num_rows($result);
        $num_per_pages1 = ceil($total_results/$posts_per_page);
        $start_num = ($page-1) * $posts_per_page;
}
else{
        $num_per_pages1  = 1;
        $start_num = 0;
}
   

$result1 = mysqli_query($conn,"SELECT * FROM reports ORDER BY `status` LIMIT $start_num,$posts_per_page");
$reports=[];
while($row = mysqli_fetch_assoc($result1))
{   
        $stmt = $conn->prepare("UPDATE reports SET `page` = ? WHERE reportID = ?");
        $stmt->bind_param("ii", $page,$row['reportID']);
        $stmt->execute(); 
     
         $message1 = htmlspecialchars_decode($row['message']);
         $message1 = substr($message1,0,20).'...';
     
         $status = "Pending";
         if($row['status'] == 1){
             $status = "Accepted";
         }

         $date = strtotime($row['date']);
         $date_format = date('d M Y', $date);
         $reports[]= '<tr>
                                <!-- Row 1 -->
                                <td
                                        align="left">
                                        <br>'.$date_format.'
                                </td>
                                <!-- Col 1 -->
                                <td align="left"
                                        width="200px">
                                        <br>'.$message1.'
                                </td>
                                <!-- Col 2 -->
                                <td align="left"
                                        width="100px">
                                        <br>'.$status.'
                                </td>
                                <!-- Col 3 -->
                                <td>
                                </td>
                                <!-- Col 4 -->
                                <td
                                        align="right">
                                        <br><a
                                                href="AdminToolsReportsMessagesView.php?reportID='.$row['reportID'].'">View</a>
                                </td>
                                <!-- Col 5 -->
                        </tr>';
     }

$result= mysqli_query($conn, "SELECT * FROM marks");
$num_per_pages2 = mysqli_num_rows($result);
$posts_per_page = 5;
if(mysqli_num_rows($result) > 0)
{
        $total_results  = mysqli_num_rows($result);
        $num_per_pages2 = ceil($total_results/$posts_per_page);
        $start_num = ($page-1) * $posts_per_page;
}
else{
        $num_per_pages2  = 1;
        $start_num = 0;
}
   

$result2 = mysqli_query($conn,"SELECT * FROM marks ORDER BY `status` LIMIT $start_num,$posts_per_page");
$marks=[];
while($row = mysqli_fetch_assoc($result2))
{   
        $stmt = $conn->prepare("UPDATE marks SET `page` = ? WHERE markID = ?");
        $stmt->bind_param("ii", $page,$row['markID']);
        $stmt->execute(); 
     
         $message1 = htmlspecialchars_decode($row['message']);
         $message1 = substr($message1,0,20).'...';
     
         $status = "Pending";
         if($row['status'] == 1){
             $status = "Accepted";
         }

         $date = strtotime($row['date']);
         $date_format = date('d M Y', $date);
         $marks[]= '<tr>
                                <!-- Row 1 -->
                                <td
                                        align="left">
                                        <br>'.$date_format.'
                                </td>
                                <!-- Col 1 -->
                                <td align="left"
                                        width="200px">
                                        <br>'.$message1.'
                                </td>
                                <!-- Col 2 -->
                                <td align="left"
                                        width="100px">
                                        <br>'.$status.'
                                </td>
                                <!-- Col 3 -->
                                <td>
                                </td>
                                <!-- Col 4 -->
                                <td
                                        align="right">
                                        <br><a
                                        href="AdminToolsMarkedMessagesView.php?markID='.$row['markID'].'">View</a>
                                </td>
                                <!-- Col 5 -->
                        </tr>';
     }
     ?>






<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
        <style>
                <!--
                A {
                        text-decoration: none
                }
                -->
        </style>
        <style>
                BODY,
                P,
                TABLE,
                HTML {
                        height: 100%;
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 13px;
                }

                .b {
                        border-style: outset;
                        border-width: 3pt;
                        border-color: #373737
                }

                .b2 {
                        border-style: outset;
                        border-width: 3pt;
                        border-color: #570700
                }

                .e {
                        border: 2px solid #382418
                }

                .c {
                        text-decoration: none
                }

                A.c:hover {
                        text-decoration: underline
                }
        </style>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
        <meta content="0" http-equiv="Expires">
        <meta content="no-cache" http-equiv="Pragma">
        <meta content="no-cache" http-equiv="Cache-Control">
        <meta content="TRUE" name="MSSmartTagsPreventParsing">
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <meta content="runescape, free, games, online, multiplayer, magic, spells, java, MMORPG, MPORPG, gaming"
                name="Keywords">
        <link rel="shortcut icon" href="../../../../../../../../../../2003/Forums/work/work/favicon.ico">
        <link media="all" type="text/css" rel="stylesheet" href="AdminToolsReports&amp;MarkedMessages_files/main.css">
        <link href="AdminToolsReports&amp;MarkedMessages_files/forum-3.css" rel="stylesheet" type="text/css"
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
                                                                                        src="AdminToolsReports&amp;MarkedMessages_files/edge_a.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                        <td valign="top"><img
                                                                                        src="AdminToolsReports&amp;MarkedMessages_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400"></td>
                                                                        <td valign="top"><img
                                                                                        src="AdminToolsReports&amp;MarkedMessages_files/edge_d.jpg"
                                                                                        height="43" hspace="0"
                                                                                        vspace="0" width="100"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <table background="AdminToolsReports&amp;MarkedMessages_files/background2.jpg"
                                                        border="0" cellpadding="0" cellspacing="0" width="600">
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
                                                                                <center><br>
                                                                                        <table bgcolor="black"
                                                                                                border="0"
                                                                                                cellpadding="5"
                                                                                                width="500">
                                                                                                <tbody>
                                                                                                        <tr>
                                                                                                                <td
                                                                                                                        class="e">


                                                                                                                        <div
                                                                                                                                style="height:5px;">
                                                                                                                        </div>
                                                                                                                        <center><img src="../PlayerModTools/PlayerModQuote_files/refresh.png"
                                                                                                                                        width="13"
                                                                                                                                        height="13"
                                                                                                                                        alt=""
                                                                                                                                        title="" />
                                                                                                                                <b>Admin Tools
                                                                                                                                        -
                                                                                                                                        Reports
                                                                                                                                        &amp;
                                                                                                                                        Marked
                                                                                                                                        Messages</b>
                                                                                                                                <br><a
                                                                                                                                        href="admintools">Back
                                                                                                                                        to
                                                                                                                                        Admin
                                                                                                                                        Tools</a>
                                                                                                                        </center>
                                                                                                                        <br>
                                                                                                                        <div
                                                                                                                                style="float:left; text-align:left;">
                                                                                                                                <b>Reports:</b>
                                                                                                                                <table style="height:100px"
                                                                                                                                        border="0"
                                                                                                                                        width="500px">
                                                                                                                                        <tbody>
                                                                                                                                        <tr>
                                                                                                                                                <!-- Row 1 -->
                                                                                                                                                <td
                                                                                                                                                        align="left">
                                                                                                                                                        <b>Date</b>
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 1 -->
                                                                                                                                                <td align="left"
                                                                                                                                                        width="200px">
                                                                                                                                                        <b>Type</b>
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                <td align="left"
                                                                                                                                                        width="100px">
                                                                                                                                                        <b>Status</b>
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 3 -->
                                                                                                                                                <td>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 4 -->
                                                                                                                                                <td
                                                                                                                                                        align="right">
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 5 -->
                                                                                                                                        </tr>
                                                                                                                                                <?php
                                                                                                                                                if(isset($reports)){
                                                                                                                                                        foreach($reports as $r){
                                                                                                                                                                echo $r;
                                                                                                                                                        }
                                                                                                                                                }
                                                                                                                                                ?>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                                <br>
                                                                                                                                <b>Marked
                                                                                                                                        Messages:</b>
                                                                                                                                <table style="height:100px"
                                                                                                                                        border="0"
                                                                                                                                        width="500px">
                                                                                                                                        <tbody>
                                                                                                                                        <tr>
                                                                                                                                                <!-- Row 1 -->
                                                                                                                                                <td
                                                                                                                                                        align="left">
                                                                                                                                                        <b>Date</b>
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 1 -->
                                                                                                                                                <td align="left"
                                                                                                                                                        width="200px">
                                                                                                                                                        <b>Message</b>
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                <td align="left"
                                                                                                                                                        width="100px">
                                                                                                                                                        <b>Status</b>
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 3 -->
                                                                                                                                                <td>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 4 -->
                                                                                                                                                <td
                                                                                                                                                        align="right">
                                                                                                                                                        <br>
                                                                                                                                                </td>
                                                                                                                                                <!-- Col 5 -->
                                                                                                                                        </tr>
                                                                                                                                        <?php
                                                                                                                                                if(isset($marks)){
                                                                                                                                                        foreach($marks as $m){
                                                                                                                                                                echo $m;
                                                                                                                                                        }
                                                                                                                                                }
                                                                                                                                                ?>
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                                <br>
                                                                                                                                <center>
                                                                                                                                        <table border="0"
                                                                                                                                                width="233px">
                                                                                                                                                <tbody>
                                                                                                                                                        <tr>
                                                                                                                                                                <!-- Row 1 -->
                                                                                                                                                                <?php

                                                                                                                                                                $next = $page + 1;
                                                                                                                                                                $prev = $page - 1;


                                                                                                                                                                if($num_per_pages1 > $num_per_pages2){
                                                                                                                                                                        $max = $num_per_pages1;
                                                                                                                                                                }
                                                                                                                                                                if($num_per_pages1 < $num_per_pages2){
                                                                                                                                                                        $max = $num_per_pages2;
                                                                                                                                                                }
                                                                                                                                                                if($num_per_pages1 == $num_per_pages2){
                                                                                                                                                                        $max = $num_per_pages1;
                                                                                                                                                                }                               
                                                                                                                                                                if($page == 1){
                                                                                                                                                                        if($max > 1){
                                                                                                                                                                                
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
                                                                                                                                                                                        '.$max.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                                <td><a href="AdminToolsReports&MarkedMessages.php?&page='.$next.'"><img src="AdminToolsReports&amp;MarkedMessages_files/next.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                                <a href="AdminToolsReports&MarkedMessages.php?&page='.$max.'">
                                                                                                                                                                                                <img
                                                                                                                                                                                                src="AdminToolsReports&amp;MarkedMessages_files/last.png"
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
                                                                                                                                                                                width="26"> <img
                                                                                                                                                                                src=""
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
                                                                                                                                                                                        '.$max.'
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
                                                                                                                                                                elseif($page > 1 && $page == $max){
                                                                                                                                                                        echo'<td><a href="AdminToolsReports&MarkedMessages.php?&page=1"><img src="AdminToolsReports&amp;MarkedMessages_files/first.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        <a href="AdminToolsReports&MarkedMessages.php?&page='.$prev.'">
                                                                                                                                                                        <img
                                                                                                                                                                        src="AdminToolsReports&amp;MarkedMessages_files/previous.png"
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
                                                                                                                                                                                        '.$max.'
                                                                                                                                                                                </td>
                                                                                                                                                                        <!-- Col 2 -->
                                                                                                                                                                        <td> <img src=""
                                                                                                                                                                                        alt=""
                                                                                                                                                                                        title=""
                                                                                                                                                                                        height="13"
                                                                                                                                                                                        width="26">
                                                                                                                                                                                        <img
                                                                                                                                                                                        src=" "
                                                                                                                                                                                        alt=""
                                                                                                                                                                                        title=""
                                                                                                                                                                                        height="13"
                                                                                                                                                                                        width="26">
                                                                                                                                                                        </td>
                                                                                                                                                                        <!-- Col 3 -->';
                                                                                                                                                                }
                                                                                                                                                                else{
                                                                                                                                                                        echo'<td><a href="AdminToolsReports&MarkedMessages.php?&page=1"><img src="AdminToolsReports&amp;MarkedMessages_files/first.png"
                                                                                                                                                                        alt=""
                                                                                                                                                                        title=""
                                                                                                                                                                        height="13"
                                                                                                                                                                        width="26"></a>
                                                                                                                                                                        <a href="AdminToolsReports&MarkedMessages.php?&page='.$prev.'">
                                                                                                                                                                        <img
                                                                                                                                                                        src="AdminToolsReports&amp;MarkedMessages_files/previous.png"
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
                                                                                                                                                                                        '.$max.'
                                                                                                                                                                                </td>
                                                                                                                                                                                <!-- Col 2 -->
                                                                                                                                                                        <td><a href="AdminToolsReports&MarkedMessages.php?&page='.$next.'"><img src="AdminToolsReports&amp;MarkedMessages_files/next.png"
                                                                                                                                                                                                alt=""
                                                                                                                                                                                                title=""
                                                                                                                                                                                                height="13"
                                                                                                                                                                                                width="26"></a>
                                                                                                                                                                                                <a href="AdminToolsReports&MarkedMessages.php?&page='.$max.'">
                                                                                                                                                                                                <img
                                                                                                                                                                                                src="AdminToolsReports&amp;MarkedMessages_files/last.png"
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

                                                                                                                                        <table border="0"
                                                                                                                                                cellpadding="2"
                                                                                                                                                cellspacing="1"
                                                                                                                                                width="455">







                                                                                                                                        </table>
                                                                                                                                </center>
                                                                                                                        </div>
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
                                                                                <img src="AdminToolsReports&amp;MarkedMessages_files/edge_g2.jpg"
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
                                                                                                href="../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=terms/terms.html"
                                                                                                class="c">Terms+Conditions</a>
                                                                                        + <a href="../../../../../../../../../../2003/Forums/work/work/frame2.cgi?page=privacy/privacy.html"
                                                                                                class="c">Privacy
                                                                                                policy</a>
                                                                                </div>
                                                                                <img src="AdminToolsReports&amp;MarkedMessages_files/edge_c.jpg"
                                                                                        height="42" hspace="0"
                                                                                        vspace="0" width="400">
                                                                        </td>
                                                                        <td valign="bottom">
                                                                                <img src="AdminToolsReports&amp;MarkedMessages_files/edge_h2.jpg"
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