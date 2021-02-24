<?php
session_start();
$err = array("name_error" => "","length_error" =>"","invalid_error" =>"");
$mod_arr = ["mod ","Mod ","moderator","Moderator"];
include "../connect.php";
if(isset($_POST['new_check']))
{
    $user = trim($_POST['username']);
    $user = ucfirst($user);
    $user = str_replace("_"," ",$user);
    if(strlen($user) > 12){
      $err["length_error"] = "Username must be less then 12 characters.";
    }
    elseif(empty($user)){
       echo "here";
      $err["length_error"] = "Username can not be empty.";
    }
    elseif(strcmp(substr($user,0,4),"mod ")==0 || strcmp(substr($user,0,4),"Mod ")==0 || strcmp(substr($user,0,10),"moderator ")==0 || strcmp(substr($user,0,10),"Moderator ")==0 ||
    strcmp($user,"mod")==0 || strcmp($user,"Mod")==0 || strcmp($user,"moderator")==0 || strcmp($user,"Moderator")==0){
      $err["invalid_error"] = "Invalid name.";
    }
    else{
                $stmt = $conn->prepare("SELECT userID FROM users WHERE username = ?");
                $stmt->bind_param("s",$user);
                $stmt->execute();
                $result = $stmt->get_result();
          if (mysqli_num_rows($result)==0) 
          {
              $_SESSION["temp_user"] = $user;
              mysqli_close($conn);
              header('Location: terms.php');
          }
          else{
             $_SESSION['temp_user'] = trim($_POST['username']);
             mysqli_close($conn);
            header('Location: unavailable_username.php');
          }
    }
}
mysqli_close($conn);
if(isset($_POST['suggested_check'])){
    $_SESSION["temp_user"] = $_POST['username'];
    echo $_SESSION["temp_user"];
    header('Location: terms.php');
    mysqli_close($conn);
}
?>
<?php
/*
 This function will generate a random username based on the inputed username from the create username page.
 It adds randomly generated numbers to the end of the username to try and make it unique. It uses the other
 function "username_exists_in_database()" to make sure the usernames displayed are unqiue.
 
 @param
 $string_name : Is the username that was inputed previously and is unavailable.
 $random_no : number range for the generated usernames. e.g. 0 to $random_no.
*/
function generate_unique_username($string_name, $rand_no){
	while(true){
		$username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
		$username_parts = array_slice($username_parts, 0, 2); //return only first two arry part
	
		$part1 = (!empty($username_parts[0]))?substr($username_parts[0], 0,8):""; //cut first name to 8 letters
		$part2 = (!empty($username_parts[1]))?substr($username_parts[1], 0,5):""; //cut second name to 5 letters
		$part3 = ($rand_no)?rand(0, $rand_no):"";
		
		$username = $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters 
		
		$username_exist_in_db = username_exist_in_database($username); //check username in database
		if(!$username_exist_in_db){
			return ucfirst($username);
		}
	}
}
?>
<?php 
/*
 This function checks the current databse to see if the random username is unique.
 
 @param
 $username : random generated username
*/
function username_exist_in_database($username){
    include "../connect.php"; //connect to database
 
    if ($conn->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    
    $statement = $conn->prepare("SELECT userID FROM users WHERE username =?");
    $statement->bind_param('s', $username);
    if($statement->execute()){
        $statement->store_result();
        return $statement->num_rows;
    }
}
?>
<?php 
    $temp_usernames = [];
    for ($i = 0; $i < 5; $i++){
        $temp_usernames[] = generate_unique_username($_SESSION['temp_user'],999);
    }
?>
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<STYLE>
   BODY,
   TD,
   P {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 13px;
   }
 
   .b {
      border-style:
         outset;
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
 
   .white {
      text-decoration: none;
      color: #FFFFFF;
   }
 
   .red {
      text-decoration: none;
      color: #E10505;
   }
 
   .lblue {
      text-decoration: none;
      color: #9DB8C3;
   }
 
   .dblue {
      text-decoration: none;
      color: #0D6083;
   }
 
   .yellow {
      text-decoration: none;
      color: #FFE139;
   }
 
   .green {
      text-decoration: none;
      color: #04A800;
   }
 
   .purple {
      text-decoration: none;
      color: #C503FD;
   }
 
   .pink {
      text-decoration: none;
      color: #FAA8AA;
   }
 
   A.c:hover {
      text-decoration: underline
   }
 
   A.white:hover {
      text-decoration: underline
   }
 
   A.red:hover {
      text-decoration: underline
   }
 
   A.lblue:hover {
      text-decoration: underline
   }
 
   A.dblue:hover {
      text-decoration: underline
   }
 
   A.yellow:hover {
      text-decoration: underline
   }
 
   A.green:hover {
      text-decoration: underline
   }
 
   A.purple:hover {
      text-decoration: underline
   }
 
   A.pink:hover {
      text-decoration: underline
   }
</STYLE>
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
                           <table width=250 bgcolor=black cellpadding=4>
                              <tr>
                                 <td class=e>
                                    <center>
                                       <b>Create Account</b><br>
                                       <a href="../title.php" class=c>Main Menu</a>
                                    </center>
                                 </td>
                              </tr>
                           </table>
                        </center>
                        <br>
                        <center>
                           <table width=500 bgcolor=black cellpadding=4 border=0>
                              <tr>
                                 <td class=e>
                                    <center>
                                       <br>
                                       <table cellspacing=0 cellpadding=2 border=1 BORDERCOLOR=#282318>
                                          <tr>
                                             <td style="background-color:35210F;" height=20px;><b>
                                                   <font color="#ffbb22">Choose A Username</font>
                                                </b></td>
                                             <td> > </td>
                                             <td style="background-color:#282318;">
                                                <font color="#BCBCBA">Terms And Conditions</font>
                                             </td>
                                             <td> > </td>
                                             <td style="background-color:#282318;">
                                                <font color="#BCBCBA">Choose A Password</font>
                                             </td>
                                             <td> > </td>
                                             <td style="background-color:#282318;">
                                                <font color="#BCBCBA">Finish</font>
                                             </td>
                                          </tr>
                                       </table>
                                    </center>
                                    <br>
                                    <center>
                                       <TABLE>
                                          <TBODY>
                                             <TR>
                                                <TD align=middle>Sorry, that username is not available</TD>
                                             </TR>
                                             <TR>
                                                <TD align=middle>Perhaps you could try one of the following:</TD>
                                             <TR>
                                                <TD align=middle>
                                                   <TABLE cellSpacing=4>
                                                      <TBODY>
                                                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                         <TR>
                                                            <TD><INPUT type=radio value="<?php echo $temp_usernames[0];?>"
                                                                  name=username>&nbsp;<?php echo $temp_usernames[0];?></TD>
                                                         </TR>
                                                         <TR>
                                                            <TD><INPUT type=radio value="<?php echo $temp_usernames[1];?>"
                                                                  name=username>&nbsp;<?php echo $temp_usernames[1];?></TD>
                                                         </TR>
                                                         <TR>
                                                            <TD><INPUT type=radio value="<?php echo $temp_usernames[2];?>"
                                                                  name=username>&nbsp;<?php echo $temp_usernames[2];?></TD>
                                                         </TR>
                                                         <TR>
                                                            <TD><INPUT type=radio value="<?php echo $temp_usernames[3];?>"
                                                                  name=username>&nbsp;<?php echo $temp_usernames[3];?></TD>
                                                         </TR>
                                                         <TR>
                                                            <TD><INPUT type=radio value="<?php echo $temp_usernames[4];?>"
                                                                  name=username>&nbsp;<?php echo $temp_usernames[4];?></TD>
                                                         </TR>
                                                      </TBODY>
                                                   </TABLE>
                                       </TABLE>
                                       <table border=0>
                                          <td></td>
                                          <td><input type="submit" name="suggested_check" value="Check Availability"></td>
                                        </form>
                              </tr>
                              <tr>
                                 <td colspan=2 width=292px;>
                                    or you could try something else entirely.
                                 </td>
                              </tr>
                              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                              <tr>
                                 <td align=left>
                                    Desired Username:
                                 </td>
                                 <TD><INPUT maxLength=12 value="" name=username></TD>
                     
                  </tr>
                  <tr>
                  <TD></TD>
                   <TD style="float:left;"><font color="#ffbb22"><?php echo $err["length_error"];?><?php echo $err["invalid_error"];?></font></TD>
                  <tr>
                  <tr>
                     <td></td>
                     <td width="160px">
                           <Input type=submit name="new_check" value="Check Availability">
                     </TD>
         </td>
      </tr>
</form>
   </table>
   <br>
   </td>
   </tr>
   </table>
   <br>
   </td>
   </tr>
   </table>
   <table cellpadding=0 cellspacing=0>
      <tr>
         <td valign=bottom>
            <img src=../../../img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
         </td>
         <td valign=bottom>
            <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
               This webpage and its contents is copyright 2005 Jagex Ltd<br>
               To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html"
                  class=c>Terms+Conditions</a> + <a href="frame2.cgi?page=privacy/privacy.html" class=c>Privacy
                  policy</a>
            </div>
            <img src=../../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
         </td>
         <td valign=bottom>
            <img src=../../../img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
         </td>
      </tr>
   </table>
   </center>
</body>
 
</html>
