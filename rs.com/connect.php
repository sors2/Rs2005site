<?php
    $username = 'rs05main';
    $password = 'qbV7nh34W8acf#a';
    $db = 'runescape';

    $conn = mysqli_connect('localhost', $username , $password,$db);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>