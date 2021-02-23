<?php 
session_start();
$err = array("pass_error" => "","terms_error"=>"","email_error" => "","confirm_error" => "");
if(isset($_POST['create']) && isset($_POST['choice']))
{
    include "../connect.php";
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $email = $_POST['email'];
    preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',$email,$matches);
    if(strcmp($pass1,$pass2) == 0){   
        if(!empty($matches)){
            if(strlen($pass) >= 5 & strlen($pass) <= 20)
            {
                $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
                $user = $_SESSION['username_temp'];
                $n = 1;
                $stmt = $conn->prepare("INSERT INTO users (username,user_password,email,rolesID) VALUES (?, ?, ?, ?)");
                $stmt->bind_param('sssi',$user,$hash_pass,$email,$n);
                $stmt->execute();
                
                $stmt = $conn->prepare("INSERT INTO pastpasswords (password3) VALUES (?)");
                $stmt->bind_param("s",$hash_pass);
                $stmt->execute();

                $_SESSION['username'] = $user;
                unset($_SESSION['temp_user']);
                mysqli_close($conn);
                header('Location: finish.html');
                
            }

            else{
                $err["pass_error"] = 'password is too long or short.';
            }
        }
        else{
            $err["email_error"] = 'Invalid email address.';
        }
    }
    else{
        $err["confirm_error"] = 'passwords must match.';
    }
    
}
else{
    $err["terms_error"] = 'Must agree with the terms & conditions.';
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
                                       <a href="../title.html" class=c>Main Menu</a>
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
                                    <br>
                                    <center>
                                       <table cellspacing=0 cellpadding=2 border=1 BORDERCOLOR=#282318>
                                          <tr>
                                             <td style="background-color:#282318;" height=20px;><a href="index.html"
                                                   class=c>Choose A Username</a></td>
                                             <td> > </td>
                                             <td style="background-color:#282318;"><a href="terms.html" class=c>Terms
                                                   And Conditions</a></td>
                                             <td> > </td>
                                             <td style="background-color:#282318;"><b>
                                                   <font color="#ffbb22">Choose A Password</font>
                                                </b></td>
                                             <td> > </td>
                                             <td style="background-color:#282318;">
                                                <font color="#BCBCBA">Finish</font>
                                             </td>
                                          </tr>
                                       </table>
                                    </center>
                                    <br>
                                    <br>
                                    <center>
                                       NEVER give anyone your password, not even to Jagex staff.<br>
                                       Jagex staff will never ask you for your password.</br>
                                       Passwords must be between 5 and 20 characters long. We recommend you use a
                                       mixture of numbers and letters in your password to make it hard for someone to
                                       guess.
                                       <br><br>
                                    </center>
                                    <center>
                                       <table>
                                          <tr>
                                             <td align=right>
                                                Desired Username:
                                             </td>
                                             <td>
                                                <?php echo $_SESSION['temp_user'];?> (<a href="index.php" class=c>Change</a>)
                                             </td>
                                          </tr>
                                          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                          <tr>
                                             <td align=right>
                                                Desired Password:
                                             </td>
                                             <td>
                                                <INPUT maxLength=12 value="" name=password1>
                                             </td>
                                             <td>
                                                <?php echo $err['confirm_error'];?>
                                            </td>
                                          </tr>
                                          <tr>
                                             <td align=right>
                                                Confirm Password:
                                             </td>
                                             <td>
                                                <INPUT maxLength=12 value="" name=password2>
                                             </td>
                                          </tr>
                                          <tr>
                                            <td align=right>
                                                Desired Email: 
                                            </td>
                                            <td>
                                                <INPUT maxLength=60 value="" name=email>
                                            </td>
                                            <td>
                                                <?php echo $err['email_error'];?>
                                            </td>
                                            </tr>
                                          <tr>
                                             <td>
                                                I agree with the terms and conditions:
                                             </td>
                                             <td>
                                                <input type="checkbox" value="yes" name="choice" id="choice">
                                             </td>
                                             <td>
                                                <?php echo $err['terms_error'];?>
                                            </td>
                                          </tr>
                                          <tr>
                                             <td></td>
                                             <td>
                                                   <Input type=submit name="create" value="Create Account">
                                             </td>
                                          </tr>
                                            </form>
                                       </table>
                                       <br>
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