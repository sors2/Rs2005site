<?php session_start();?>
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
                                       <b>Terms and Conditions</b><br>
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
                                    <br>
                                    <center>
                                       <table cellspacing=0 cellpadding=2 border=1 BORDERCOLOR=#282318>
                                          <tr>
                                             <td style="background-color:#282318;" height=20px;><a href="index.html"
                                                   class=c>Choose A Username</a></td>
                                             <td> > </td>
                                             <td style="background-color:#35210F;"><b>
                                                   <font color="#ffbb22">Terms And Conditions</font>
                                                </b></td>
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
                                    <p>The username <a href="index.php" class=c><?php echo $_SESSION['temp_user'];?></a> is currently available. To
                                       sign up to an account you must agree to our Terms and Conditions:</p>
                                    <br>
                                    <b> Terms and Conditions</b>
                                    <br>
                                    <br>
                                    <p>This website is operated and maintained by Jagex Limited, a company registered in
                                       England and Wales (registered number 3982706), whose registered office is 11
                                       Sturton Street, Cambridge, CB1 2SN, UK and its suppliers and partners ("Jagex").
                                       Jagex and Runescape are registered trademarks of Jagex Limited in the United
                                       Kingdom, the United States and other countries.</p>
                                    <p>Use of this website and the services provided via it are conditional upon you
                                       accepting the following Terms and Conditions. Unless otherwise specified, your
                                       acceptance shall be indicated by your use of this website. If you do not accept
                                       these Terms and Conditions, you must not use this website.</p>
                                    <br>
                                    <b>Online games</b>
                                    <br>
                                    <br>
                                    <p>
                                       <u>Single Player Games</u><br>
                                       These require no registration or subscription to access and play.
                                    </p>
                                    <p>
                                       <u>Multiplayer Games</u><br>
                                       These require no subscription, but do require you to choose a Username and a
                                       Password to access and play.
                                    </p>
                                    <p>
                                       <u>RuneScape</u><br>
                                       There are two versions of RuneScape, a Free Version which requires no
                                       subscription but does require you to choose a Username and a Password to access
                                       and play, and a Members Version which is Subscription-based. Your use of
                                       RuneScape is also subject to our Rules of Conduct.
                                    </p>
                                    <b>Your responsibilities</b>
                                    <br>
                                    <p>
                                       <u>Username</u><br>
                                       You must not choose a Username that infringes the rights of any third party,
                                       impersonates Jagex staff of other users, or which is deliberately confusing or
                                       which is offensive, racist, obscene or otherwise unlawful. We reserve the right
                                       to change any Username for any reason.
                                    </p>
                                    <p>
                                       <u>Password</u><br>
                                       You agree to keep your Password safe at all times and not to disclose it to any
                                       other person. You must ensure that your computer is kept free of viruses and
                                       Trojans to ensure the safety of your password. Real Jagex staff will never ask
                                       you for your current password.
                                    </p>
                                    <p>
                                       <u>Subscription</u><br>
                                       Some contents and/or services on this website are subscription-based. If you
                                       elect to purchase subscription-based content/services and transmit to us a
                                       subscription purchase request, you warrant that all the information that you
                                       submit is true and accurate (including without limitation your credit card number
                                       and expiration date, and other payment details), and you agree to pay all
                                       subscription fees you incur including all applicable taxes.
                                    </p>
                                    <p>
                                       <u>RuneScape Account</u><br>
                                       You agree that your RuneScape character and account and items are and remain the
                                       property of Jagex. You may not sell, transfer or lend your account to anyone
                                       else, or permit anyone else to use your account, and you may not accept an
                                       account which anybody else offers you.
                                    </p>
                                    <p>You may create more than one RuneScape account, but if you do, you may not log
                                       into more than one account at any time, and they must not interact with each
                                       other in any way. Using one account to drop objects for transfer to another of
                                       your accounts is not allowed.</p>
                                    <p>We reserve the right to delete all your accounts, block your access to our
                                       website and services, and/or take further legal action if you violate any of
                                       these terms and conditions. We may delete or modify any account at any time for
                                       any reason.</p>
                                    <p>
                                       <u>Sign-Up</u><br>
                                       By signing-up for an account you are opting-in to allow us to store personal
                                       information, cookies, etc. as described in our Privacy Policy.
                                    </p>
                                    <p>
                                       <u>Chat facility</u><br>
                                       When using the chat facility you must not use any language which may be
                                       considered by others to be offensive, racist or obscene, or otherwise infringes
                                       the rights of third parties. You must not use the chat facility to harass,
                                       threaten, scam or deceive other players. You agree that the chat facility is only
                                       for role-playing in the game, and is not designed or intended to be used as a
                                       forum for other types of discussion. You must not use the chat facility to
                                       advertise other websites or products.
                                    </p>
                                    <p>You agree that for the purpose of preventing offensive language and cheating we
                                       may automatically or manually censor the chat as we see fit, and that we may
                                       record or monitor the chat to help us identify offenders. Sexually harassing,
                                       threatening, stalking or otherwise harassing others may result in legal action
                                       being taken against you.</p>
                                    <p>If you are the victim of the sort of behaviour described above, or receive any
                                       other unwanted communications you must use the built in facilities to block the
                                       messages. If there is a particular user causing a problem then use the ignore
                                       function to block further messages (to do this point at the friends menu, click
                                       on the 'ignore' tab, click where it says 'click here to add a name' and enter the
                                       name of the user to block). If you continue to receive unwanted messages, or
                                       receive harassment from multiple players you must use the privacy controls to
                                       block all messages from everyone except your friends (to do this point at the
                                       configuration menu, and ensure all four privacy settings are switched to 'on').
                                       If you continue to suffer problems, or are not satisfied then you must stop using
                                       this web site.</p>
                                    <p>
                                       <u>Cheating</u><br>
                                       You must not exploit any cheats or errors which you find in the Multiplayer Games
                                       or RuneScape. Any cheats or errors which you discover must be reported
                                       immediately to us.
                                    </p>
                                    <p>You must not attempt to use other programs in conjunction with the Multiplayer
                                       Games or RuneScape to give yourself an unfair advantage. You may not use any bots
                                       or macros to control your character for you. When you are not playing a Game you
                                       must logout. You may not circumvent any of our mechanisms designed to logout
                                       inactive users automatically.</p>
                                    <p>You must not misuse any of our customer service facilities. You must not
                                       deliberately enter false information into any of the forms on our website, or in
                                       our games. You must not encourage, or attempt to trick other players into
                                       breaking our rules.</p>
                                    <p>
                                       <u>Provision of service</u><br>
                                       You must not reverse-engineer, decompile or modify the RuneScape client in any
                                       way. You must not use a modified/customised version of the RuneScape client. You
                                       must not create or provide any other means by which any of the Games provided by
                                       this web site may be played by others (including, without limitation, replacement
                                       or modified client/server software, server emulators).
                                    </p>
                                    <center><br>
                                       <input type="button" value="I Agree"
                                          onClick="window.location.href='password.php'"> <input type="button"
                                          value="I Do Not Agree" onClick="window.location.href='terms.php'">
                                    </center>
                                    <br>
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