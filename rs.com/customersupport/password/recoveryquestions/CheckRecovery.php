<?php
if(isset($_POST['submit'])){
    include "../../../connect.php";
    $score = 0;
    $email = 0;
    $passwords = 0;
    $user = urldecode($_GET['user']);
    $stmt = $conn->prepare("SELECT userID,username,user_password,email,past_passwords,recovery_questions FROM users WHERE username =?");
    $stmt->bind_param("s",$user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user1 = $result->fetch_assoc();


    $stmt = $conn->prepare("SELECT * FROM recoveryanswers WHERE userID =?");
    $stmt->bind_param("i",$user1['userID']);
    $stmt->execute();
    $result2 = $stmt->get_result();
    $user_ans = $result2->fetch_assoc();
    
    //Check for the answers
    if(strcmp($user_ans['answer1'],$_POST['q1']) == 0){
        $score++;
    }
    if(strcmp($user_ans['answer2'],$_POST['q2']) == 0){
        $score++;
    }
    if(strcmp($user_ans['answer3'],$_POST['q3'] == 0)){
        $score++;
    }
    if(strcmp($user_ans['answer4'],$_POST['q4']) == 0){
        $score++;
    }
    if(strcmp($user_ans['answer5'],$_POST['q5']) == 0){
        $score++;
    }

    //Check for the email
    if(strcmp($_POST['email'],$user1['email']) == 0){
        $email++;
    }
    echo $user1['past_passwords'];
    //Check for the 3 passwords
    $stmt = $conn->prepare("SELECT * FROM pastpasswords WHERE pastID =?");
    $stmt->bind_param("i",$user1['past_passwords']);
    $stmt->execute();
    $result3 = $stmt->get_result();
    $user_pass = $result3->fetch_assoc();

    $pass1 = "";
    $pass2 = "";
    $pass3 = "";

    if($user_pass['password3'] != NULL){
        if(password_verify($_POST['p1'],$user_pass['password3'])){
            $pass1 = password_hash($_POST['p1'], PASSWORD_DEFAULT);
            $passwords++;
        }
    }
    if($user_pass['password1'] != NULL){
        if(password_verify($_POST['p2'],$user_pass['password1'])){
            $pass2 = password_hash($_POST['p2'], PASSWORD_DEFAULT);
            $passwords++;
        }
    }
    if($user_pass['password2'] != NULL){
        if(password_verify($_POST['p3'],$user_pass['password2'])){
            $pass3 = password_hash($_POST['p3'], PASSWORD_DEFAULT);
            $passwords++;
        }
    }

    //Check that the request is enough to investigate.
    $total = $passwords + $score + $email;
    if(($score>2 && $passwords > 0) || $total > 5){

        $stmt = $conn->prepare("INSERT INTO recoveryrequest (question1,question2,question3,question4,question5,password1,password2,password3,email,last_login) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss",$user_ans['answer1'],$user_ans['answer2'],$user_ans['answer3'],$user_ans['answer4'],$user_ans['answer5'],$pass1,$pass2,$pass3,$_POST['email'],$_POST['creation_date']);
        $stmt->execute();
        $last_id = $conn->insert_id;

        $tracker = md5($user1['username']);
        $stmt = $conn->prepare("INSERT INTO tracker (trackerID,userID,requestID) VALUES (?,?,?)");
        $stmt->bind_param("sii",$tracker,$user1['userID'],$last_id);
        $stmt->execute();

        header("Location: ../ViewPasswordSupport/RequestSent.php?trackerID=$tracker");
    }

}       
?>