<?php 
session_start();
if (isset($_POST["login"])){
    include "connect.php";

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    
    $stmt= $conn->prepare("SELECT userID,user_password,rolesID FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();   
    $result = $stmt->get_result();

    if(mysqli_num_rows($result)== 0){
        die("user not found");
    }

    $user = $result->fetch_assoc();

        if(password_verify($pass,$user['user_password'])){

            $stmt= $conn->prepare("SELECT expire FROM bandetails WHERE userID = ?");
            $stmt->bind_param("i", $user['userID']);
            $stmt->execute();   
            $ban = $stmt->get_result();
            $user_ban = $ban->fetch_assoc();
        
            $current = date("d-m-Y H:i:s");
            if((mysqli_num_rows($ban) == 0) || strtotime($user_ban['duration']) < strtotime($current)){
                session_start();
                $_SESSION['username'] =$username;
                $_SESSION['permission'] = $user['rolesID'];
                $_SESSION['vote'] = "vote";
                $dt = date('Y-m-d H:i:s');
                $statement = $conn->prepare("UPDATE users SET last_activity = ? WHERE userID = ?");
                $statement->bind_param("si",$dt,$user['userID']);
                $statement->execute();
                header('Location: title.php');
                
            }
            else{
                echo "You are Banned.";
            }
        }  
        else{
            echo "failed";
        }
    
    mysqli_close($conn);
}
?>
<title>RuneScape - the massive online adventure game by Jagex Ltd</title>
<STYLE>BODY, TD, P{ font-family:Arial,Helvetica,sans-serif; font-size:13px;}.b {border-style:
   outset; border-width:3pt; border-color:#373737}.b2 {border-style: outset; border-width:3pt; border-color:#570700}.e {border:2px
   solid #382418}.c {text-decoration:none}A.c:hover {text-decoration:underline}.white {text-decoration:none; color:#FFFFFF;}
   .red {text-decoration:none; color:#E10505;} .lblue {text-decoration:none; color:#9DB8C3;} .dblue {text-decoration:none; color:#0D6083;}
   .yellow {text-decoration:none; color:#FFE139;} .green {text-decoration:none; color:#04A800;} .purple {text-decoration:none;
   color:#C503FD;} .pink {text-decoration:none; color:#FAA8AA;} A.c:hover {text-decoration:underline} A.white:hover {text-decoration:underline}
   A.red:hover {text-decoration:underline} A.lblue:hover {text-decoration:underline} A.dblue:hover {text-decoration:underline}
   A.yellow:hover {text-decoration:underline} A.green:hover {text-decoration:underline} A.purple:hover {text-decoration:underline}
   A.pink:hover {text-decoration:underline} 
</STYLE>
</head>
<body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040
   style="margin:0">
   <table width=100% height=100% cellpadding=0 cellspacing=0>
   <tr>
      <td valign=middle>
         <center>
         <table cellpadding=0 cellspacing=0>
            <tr>
               <td valign=top><img src=../img/edge_a.jpg width=100 height=43
                                   hspace=0 vspace=0></td>
               <td valign=top><img src=../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td>
               <td
                  valign=top><img src=../img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td>
            </tr>
         </table>
         <table
            width=600 cellpadding=0 cellspacing=0 border=0 background=../img/background2.jpg>
            <tr>
               <td valign=bottom>
                  <center>
                     <table width=250 bgcolor=black cellpadding=4>
                        <tr>
                           <td class=e>
                              <center>
                                 <b>Secure Login</b><br>
                                 <a href="title.html" class=c>Main Menu</a>
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
                              <center><b><font color='#ffbb22'>You need to login to access this feature</font></b></center>
                              <center>
                                 <p>Never enter your password anywhere except <b>RuneScape.com</b><br /><br />
                                    <img src="../img/weblogin/onlyrs4.gif" />
                              </center>
                              <center>
                                 <table>
                                    <tr>
                                       <td>
                                          <p>
                                             <font color='black'>
                                             |
                                             </color>
                                          </p>
                                          <TABLE BORDER="0" BGCOLOR="black" CELLSPACING="0" 
                                             CELLPADDING="3">
                                             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                             <TR>
                                                <TD><font size="-1" face="Helvetica, Arial, Verdana" 
                                                   color="white">Runescape username:</font></TD>
                                                <TD><INPUT TYPE="TEXT"
                                                   NAME="username" SIZE="20" MAX="16"></TD>
                                             </TR>
                                             <TR>
                                                <TD><font size="-1" face="Helvetica, Arial, Verdana" 
                                                   color="white">Runescape password:</font></TD>
                                                <TD><INPUT TYPE="password"
                                                   NAME="pass" SIZE="20" MAX="16"></TD>
                                             </TR>
                                             <TR>
                                                <TD COLSPAN="2" ALIGN="right"><a href="frame.html" class=c target="_top"><INPUT TYPE="SUBMIT" name="login"
                                                                                                                                VALUE="Secure Login"></a></TD>
                                             </TR>
                                            </form>
                                          </TABLE>
                                          </form>
                                       </td>
                                       </p>
                                       <br>
                                       <table>
                                          <tr>
                                             <td align=center>
                                                <table width=200 bgcolor=black cellpadding=4>
                                                   <tr>
                                                      <td class=b bgcolor=#474747 background='../img/stoneback.gif'>
                                                         <center><a href="customersupport/password/passwordsupport.html" class=c><b>Lost password?</b></a><br>If you
                                                            have lost/forgotten your password or need to recover your account.
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </table>
                                             <td>
                                             <td width=20></td>
                                             <td align=center>
                                                <table width=200 bgcolor=black cellpadding=4>
                                                   <tr>
                                                      <td class=b bgcolor=#474747 background='../img/stoneback.gif'>
                                                         <center><a href="about/createl" class=c><b>Need an account?</b></a><br>Create
                                                            a RuneScape account to access our game and secure services.
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </table>
                                             </td>
                                          </tr>
                                       </table>
                                       <br>
                                       </td>
                                    </tr>
                                 </table>
                                 <br>
                              </center>
                           </td>
                        </tr>
                     </table>
                     <table cellpadding=0 cellspacing=0>
                        <tr>
                           <td valign=bottom><img src=../img/edge_g2.jpg
                              width=100 height=82 hspace=0 vspace=0></td>
                           <td valign=bottom>
                              <div align=center style="font-family:Arial,Helvetica,sans-serif;
                                 font-size:11px;">  This webpage and its contents is copyright 2005 Jagex Ltd<br>  To use our service you must agree to our
                                 <a href="terms/terms.html" class=c>Terms+Conditions</a>  +   <a href="privacy/privacy.html"
                                                                                                 class=c>Privacy policy</a>
                              </div>
                              <img src=../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                           </td>
                           <td
                              valign=bottom><img src=../img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0></td>
                        </tr>
                     </table>
                  </center>
               </td>
            </tr>
         </table>
</body>
</html>