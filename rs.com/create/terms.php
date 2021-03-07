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
                     <td valign=top><img src=../../img/edge_a.jpg width=100 height=43 hspace=0 vspace=0></td>
                     <td valign=top><img src=../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td>
                     <td valign=top><img src=../../img/edge_d.jpg width=100 height=43 hspace=0 vspace=0></td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=../../img/background2.jpg>
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
                                             <td style="background-color:#282318;" height=20px;><a href="index.php"
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
                                  <p>
<b>Terms and Conditions</b><br>
<p>
This website is operated and maintained by Jagex Limited, a company registered in England and Wales (registered number 3982706), whose registered office is 11 Sturton Street, Cambridge, CB1 2SN, UK and its suppliers and partners ("Jagex"). Jagex and Runescape are registered trademarks of Jagex Limited in the United Kingdom, the United States and other countries.
<p>
Use of this website and the services provided via it are conditional upon you accepting the following Terms and Conditions. Unless otherwise specified, your acceptance shall be indicated by your use of this website. If you do not accept these Terms and Conditions, you must not use this website.
<p>
<b>Definitions</b><br>
"RuneScape" refers to both the main runescape game, and the runescape-classic version of the game. Both versions of the game use the same account, and the same Terms and Conditions apply to both of them.
<p>
<b>RuneScape Account</b><br>
To play RuneScape or use many features of this website, we require you to create an account, and choose a username and password.
<p>
You must not choose a Username that infringes the rights of any third party, impersonates Jagex staff or other users, or which is deliberately confusing or which is offensive, racist, obscene or otherwise unlawful. We reserve the right to change any Username for any reason.
<p>
You agree to keep your Password safe at all times and not to disclose it to any other person. You must ensure that your computer is kept free of viruses and Trojans to ensure the safety of your password. Real Jagex staff will never ask you for your current password.
<p>
You may create more than one RuneScape account, but if you do, you may not log into more than one account at any time, and they must not interact with each other in any way. Using one account to drop objects for transfer to another of your accounts is not allowed.
<p>
You agree that your RuneScape character and account and items are and remain the property of Jagex. You may not sell, transfer or lend your account to anyone else, or permit anyone else to use your account, and you may not accept an account which anybody else offers you.
<p>
We reserve the right to delete all your accounts, block your access to our website and services, and/or take further legal action if you violate any of these terms and conditions. We may delete or modify any account at any time for any reason.
<p>
<b>Chat facility</b><br>
When using the chat facility you must not use any language which may be considered by others to be offensive, racist or obscene, or otherwise infringes the rights of third parties. You must not use the chat facility to harass, threaten, scam or deceive other players. You agree that the chat facility is only for role-playing in the game, and is not designed or intended to be used as a forum for other types of discussion. You must not use the chat facility to advertise other websites or products.
<p>
You agree that for the purpose of preventing offensive language and cheating we may automatically or manually censor the chat as we see fit, and that we may record or monitor the chat to help us identify offenders. Sexually harassing, threatening, stalking or otherwise harassing others may result in legal action being taken against you.
<p>
If you are the victim of the sort of behaviour described above, or receive any other unwanted communications you must use the built in facilities to block the messages. If there is a particular user causing a problem then use the ignore function to block further messages (to do this in runescape-classic point at the friends menu, click on the 'ignore' tab, click where it says 'click here to add a name' and enter the name of the user to block. In the main runescape game, click on the 'Ignore List' button, click where it says 'Add Name' and enter the name of the user to block). If you continue to receive unwanted messages, or receive harassment from multiple players you must use the privacy controls to block all messages from everyone except your friends (to do this In runescape-classic point at the configuration menu, and ensure all four privacy settings are switched to 'on'. In the main runescape game there are three buttons below the game window marked 'Public chat', Private chat', and 'Trade/duel'. To block anyone other than your friends you will need to click the buttons until they display 'Friends'. To block everyone, including friends for complete privacy, click them until they display 'Off'.). If you continue to suffer problems, or are not satisfied then you must stop using this web site.
<p>
<b>Cheating</b><br>
Your use of RuneScape is also subject to our <a href="../guides/rules.html" class=c>Rules of Conduct</a>. You must not infringe these rules.
<p>
You must not exploit any cheats or errors which you find in RuneScape. Any cheats or errors which you discover must be reported immediately to us.
<p>
You must not attempt to use other programs in conjunction with RuneScape to give yourself an unfair advantage. You may not use any bots or macros to control your character for you. You agree not to distribute such programs to other RuneScape players. When you are not playing you must logout. You may not circumvent any of our mechanisms designed to logout inactive users automatically.
<p>
You must not misuse any of our customer service facilities. You must not deliberately enter false information into any of the forms on our website, or in RuneScape. You must not encourage, or attempt to trick other players into breaking our rules.
<p>
RuneScape items may only be exchanged for other items/services within the game. You must not exchange RuneScape items, gold or in-game services for real-life money, real-life benefits, or benefits in other online games. You acknowledge that doing so would harm RuneScape, by allowing players to 'buy' their way to success, which spoils the experience for others and thus causes damage to us. You must not act as an intermediary to help others make infringing trades. You may not 'sell the time' you have invested in your account or items, since this falls under selling an in-game service. You may not offer RuneScape items or services as a free-gift which is given along with another purchase.
<p>
You must not reverse-engineer, decompile or modify the RuneScape client in any way. You must not use a modified/customised version of the RuneScape client. You must not create or provide any other means by which RuneScape may be played by others (including, without limitation, replacement or modified client/server software, server emulators).
<p>
<b>Submission of content</b><br>
Occasionally we may accept ideas and game additions that are submitted by users. You agree that by submitting material for inclusion in RuneScape you are giving us a non-exclusive, perpetual, worldwide, royalty-free license to use and/or modify the submitted materials as we see fit. You agree that you will not withdraw the submission or attempt to make a charge for its use. Furthermore you warrant that you are the exclusive copyright holder of the submission, and that the submission in no way violates any other person or entity's rights
<p>
<b>Subscription</b><br>
Some contents and/or services on this website are subscription-based. If you elect to purchase subscription-based content/services and transmit to us a subscription purchase request, you warrant that all the information that you submit is true and accurate (including without limitation your credit card number and expiration date, and other payment details), and you agree to pay all subscription fees you incur including all applicable taxes.
<p>
We reserve the right to cancel your Subscription at any time with immediate effect if you breach any of these terms and conditions, or our <a href="../guides/rules.html" class=c>Rules of Conduct</a>.
<p>
You may cancel your Subscription to any fee-based content and/or services by contacting <a href="../login.php" class=c>Customer Support</a>.
<p>
Upon cancellation you will not be charged any further subscription fees, and you will not be refunded any subscription fees already paid, except that we reserve the right to charge you for any unauthorised use of your Subscription by third parties.
<p>
<b>Privacy Policy</b><br>
By signing-up for an account you are opting-in to allow us to store personal information, cookies, etc. We shall comply with all applicable Data Protection laws in the UK. For a description of how we use your personal data, please see our <a href="../privacy/privacy.html" class=c>Privacy Policy</a>.
<p>
<b>Cookies</b><br>
This website uses cookies to track your country (to enable locale enhanced information) and to track where you entered our site from. If you wish to opt-out of the use of these cookies <a href="../cookies.html" class=c>click here</a> for clear instructions.
<p>
<b>Availability</b><br>
We will make reasonable commercial efforts to ensure that this web site is available 24 hours per day without any interruptions. However, we reserve the right to make this web site unavailable at any time or to restrict access to parts or all of this website without notice.
<p>
<b>Safety Guides</b><br>
Before using our services you should read the guides found in our <a href="../guides/guides.html" class=c>Rules & Security</a> section. Of particular importance, please read the <a href="../guides/guides/playsafely.html" class=c>safety guide</a> and the <a href="../guides/guides/healthepilepsy.htm" class=c>epilepsy warning</a>.
<p>
<b>Parental guidance</b><br>
Whilst we reserve the right to monitor and take action upon inappropriate use of this web site (including the posting of inappropriate or offensive material via the chat facility or otherwise), we cannot guarantee that this web site will not contain any content provided by third parties that is inappropriate, offensive or otherwise objectionable.
<p>
<b>Intellectual property</b><br>
You hereby acknowledge that Jagex owns all intellectual property rights in the materials on this web site, including all materials associated with RuneScape. You may not use these materials except as expressly provided in these terms and conditions.
<p>
<b>Links</b><br>
This web site includes links to other internet sites. We make no representations or warranties about those sites or their content, nor that the links work.
<p>
Changes to these terms and conditions
Any variations to these terms and conditions shall be inapplicable unless agreed in writing by Jagex. We may change or supplement these terms and conditions from time to time, and these changes shall form part of these terms and conditions, even if you do not re-visit this page to re-read the terms and conditions.
<p>
<b>Your liability</b><br>
If you use this web site for any illegal purpose or for any purpose other than that expressly permitted by these terms and conditions or otherwise in breach of these terms and conditions, you will be liable to indemnify us in full for any loss, liability or costs which we incur arising from or in connection with such use or alleged use.
<p>
<b>Our liability</b><br>
Except as expressly provided in these terms and conditions, we expressly disclaim any further representations, warranties, conditions or other terms, express or implied, by statute, collaterally or otherwise, including but not limited to implied warranties, conditions or other terms of satisfactory quality, fitness for a particular purpose or reasonable care and skill.
<p>
We shall not be liable in contract, tort (including negligence), statutory duty or collaterally or otherwise arising out of or in connection with these terms and conditions or this web site for consequential, indirect or special loss or damage or any economic losses (including loss of revenues, profits, contracts, business or anticipated savings), in each case, even if we have been advised of the possibility of such loss or damage and howsoever incurred.
<p>
Our maximum liability to you in contract, tort (including negligence), statutory duty or collaterally or otherwise arising out of or in connection with these terms and conditions or this web site shall be limited to £50, or the sums paid by you to us in respect of any twelve month period, whichever is greater.
<p>
Notwithstanding any other provision of these terms and conditions, we will be liable to you without limit for any death or personal injury caused by our negligence and to the extent that liability arises under Part 1 or section 41 of the Consumer Protection Act 1987 and for liability arising from statements made fraudulently by us.
<p>
<b>Assignment</b><br>
You may not transfer any of your rights or delegate any of your obligations under these terms and conditions without our prior written consent.
<p>
<b>Failure to enforce</b><br>
If we fail to enforce any provision of these terms and conditions, that failure will not preclude us from enforcing either that provision (or any similar provision) on a later occasion.
<p>
<b>General</b><br>
Nothing in these terms and conditions affects your statutory rights as a consumer. These terms and conditions are governed by English law and any dispute connected with this is subject to the exclusive jurisdiction of the English courts.
<p>
<b>Copyright</b><br>
For all cases of requests regarding use of graphics or the reproduction of Jagex/RuneScape material please see our <a href="../faq/faqindex.html" class=c>Copyright FAQ</a>.
<p>
<b>Complaints</b><br>
If you are dissatisfied with this web site or any aspect of it, please contact <a href="../login.php" class=c>Customer Support</a>.
<p>
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
                        <img src=../../img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0>
                     </td>
                     <td valign=bottom>
                        <div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
                           This webpage and its contents is copyright 2005 Jagex Ltd<br>
                           To use our service you must agree to our <a href="frame2.cgi?page=terms/terms.html"
                              class=c>Terms+Conditions</a> + <a href="frame2.cgi?page=privacy/privacy.html"
                              class=c>Privacy policy</a>
                        </div>
                        <img src=../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                     </td>
                     <td valign=bottom>
                        <img src=../../img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0>
                     </td>
                  </tr>
               </table>