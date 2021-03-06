<?php
session_start();
$err = array("name_error" => "","length_error" =>"","invalid_error" =>"");
$mod_arr = ["mod ","Mod ","moderator","Moderator"];
if(isset($_POST['check']))
{
    include "../connect.php";
    $user = trim($_POST['username']);
    $user = ucfirst($user);
    $user = str_replace("_"," ",$user);
    if(strlen($user) > 12){
      $err["length_error"] = "Username must be less then 12 characters.";
    }
    else if(empty($user)){
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
              header('Location: terms.php');
              mysqli_close($conn);
          }
          else{
             $_SESSION['temp_user'] = trim($_POST['username']);
              header('Location: unavailable_username.php');
          }
    }
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
                                    <p>Creating an acccount for RuneScape is a very simple process.</p>
                                    <p>To begin you must first select a username. Once you have found a username that
                                       you like and is not already taken, you will be asked to choose a password.</p>
                                    <p>When you have done that, you are ready to play!</p>
                                    <p>Remember creating an account is totally free, you can keep playing on our free
                                       worlds for as you like with no obligation to buy anything.</p>
                                    <p>Usernames can be a maximum of 12 characters long and may contain letters, numbers
                                       and underscores. When playing RuneScape, underscores in usernames are translated
                                       into spaces and first letters are capitalised. For example the username
                                       red_rooster would appear as Red Rooster.</p>
                                    <center>
                                       <br>
                                       <table>
                                          <tr>
                                             <td>
                                                <TABLE cellSpacing=1 border=0>
                                                   <TBODY>
                                                      <TR>
                                                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                         <TD>Desired Username:</TD>
                                                         <TD><INPUT maxLength=12 value="" name=username></TD>
                                                      </TR>
                                                      <TR>
                                                         <TD></TD>
                                                         <TD style="float:left;"><font color="#ffbb22"><?php echo $err["length_error"];?><?php echo $err["invalid_error"];?></font></TD>
                                                      </TR>
                                                      <tr>
                                                         <td></td>
                                                         <td align=left>
                                                               <Input type=submit name="check" value="Check Availability">
                                                         </TD>
                                                      </TR>
                                                   </form>
                                                   </TBODY>
                                                </TABLE>
                                             </td>
                                          </tr>
                                       </table>
                                    </center>
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
                              class=c>Terms+Conditions</a> + <a href="frame2.cgi?page=privacy/privacy.html"
                              class=c>Privacy policy</a>
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
