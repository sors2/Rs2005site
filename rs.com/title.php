<?php 
session_start();
include "connect.php";

$news = [];
$result = mysqli_query($conn, "SELECT * FROM news ORDER BY Newsdate DESC LIMIT 6");
while($row = mysqli_fetch_assoc($result))
{
    $date = strtotime($row['Newsdate']);
    $date_format = date('d-M-Y', $date);
    $news[] = '<TR>
               <TD><A class=c href="news/NewsView.php?newsID='.$row['newsID'].'">'.$row['title'].'</A></TD>
               <TD align=right>'.$date_format.'</TD>
               </TR>';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
   <HEAD>
      <TITLE>RuneScape - the massive online adventure game by Jagex Ltd</TITLE>
      <META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
      <META http-equiv=Expires content=0>
      <META http-equiv=Pragma content=no-cache>
      <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon" />
      <META http-equiv=Cache-Control content=no-cache>
      <META content=TRUE name=MSSmartTagsPreventParsing>
      <STYLE>BODY {
         FONT-SIZE: 13px; FONT-FAMILY: Arial,Helvetica,sans-serif
         }
         TD {
         FONT-SIZE: 13px; FONT-FAMILY: Arial,Helvetica,sans-serif
         }
         P {
         FONT-SIZE: 13px; FONT-FAMILY: Arial,Helvetica,sans-serif
         }
         .b {
         BORDER-RIGHT: #373737 3pt outset; BORDER-TOP: #373737 3pt outset; BORDER-LEFT: #373737 3pt outset; BORDER-BOTTOM: #373737 3pt outset
         }
         .b2 {
         BORDER-RIGHT: #570700 3pt outset; BORDER-TOP: #570700 3pt outset; BORDER-LEFT: #570700 3pt outset; BORDER-BOTTOM: #570700 3pt outset
         }
         .e {
         BORDER-RIGHT: #382418 2px solid; BORDER-TOP: #382418 2px solid; BORDER-LEFT: #382418 2px solid; BORDER-BOTTOM: #382418 2px solid
         }
         .c {
         TEXT-DECORATION: none
         }
         A.c:hover {
         TEXT-DECORATION: underline
         }
         .white {
         COLOR: #ffffff; TEXT-DECORATION: none
         }
         .red {
         COLOR: #e10505; TEXT-DECORATION: none
         }
         .lblue {
         COLOR: #9db8c3; TEXT-DECORATION: none
         }
         .dblue {
         COLOR: #0d6083; TEXT-DECORATION: none
         }
         .yellow {
         COLOR: #ffe139; TEXT-DECORATION: none
         }
         .green {
         COLOR: #04a800; TEXT-DECORATION: none
         }
         .purple {
         COLOR: #c503fd; TEXT-DECORATION: none
         }
         .pink {
         COLOR: #faa8aa; TEXT-DECORATION: none
         }
         A.c:hover {
         TEXT-DECORATION: underline
         }
         A.white:hover {
         TEXT-DECORATION: underline
         }
         A.red:hover {
         TEXT-DECORATION: underline
         }
         A.lblue:hover {
         TEXT-DECORATION: underline
         }
         A.dblue:hover {
         TEXT-DECORATION: underline
         }
         A.yellow:hover {
         TEXT-DECORATION: underline
         }
         A.green:hover {
         TEXT-DECORATION: underline
         }
         A.purple:hover {
         TEXT-DECORATION: underline
         }
         A.pink:hover {
         TEXT-DECORATION: underline
         }
      </STYLE>
      <META content="MSHTML 6.00.2800.1505" name=GENERATOR>
   </HEAD>
   <BODY style="MARGIN: 0px" text=white vLink=#90c040 aLink=#90c040 link=#90c040 
      bgColor=black>
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%">
         <TBODY>
            <TR>
               <TD vAlign=center>
                  <CENTER>
                     <STYLE>.item {
                        PADDING-RIGHT: 10px; DISPLAY: inline-block; PADDING-LEFT: 0px; PADDING-BOTTOM: 5px; WIDTH: 220px; PADDING-TOP: 5px
                        }
                        .itemtable {
                        DISPLAY: inline; WIDTH: 220px
                        }
                        .whitelink {
                        COLOR: white; TEXT-DECORATION: none
                        }
                     </STYLE>
                     <SCRIPT language=javascript>
                        <!--
                        function redglow(id) {var elem=document.getElementById(id);elem.style.borderColor='#A70700';elem.style.backgroundColor='#A70700';elem.style.backgroundImage='url(../../img/title/ssredbright.jpg)';}
                        function unredglow(id) {var elem=document.getElementById(id);elem.style.borderColor='#570700';elem.style.backgroundColor='#570700';elem.style.backgroundImage='url(../../img/title/shinystonered.jpg)';}
                        function greyglow(id) {var elem=document.getElementById(id);elem.style.borderColor='#878787';elem.style.backgroundColor='#777777';elem.style.backgroundImage='url(../../img/title/ssgreybright.png)';}
                        function ungreyglow(id) {var elem=document.getElementById(id);elem.style.borderColor='#373737';elem.style.backgroundColor='#474747';elem.style.backgroundImage='url(../../img/stoneback.gif)';}
                        -->
                     </SCRIPT>
                     <TABLE 
                        style="PADDING-RIGHT: 15px; PADDING-LEFT: 15px; PADDING-BOTTOM: 0px; WIDTH: 100%; PADDING-TOP: 0px; min-width: 500px" 
                        cellSpacing=0 cellPadding=0 background=../img/background.jpg>
                        <TBODY>
                           <TR>
                              <TD>
                                 <CENTER>
                                    <TABLE cellSpacing=0 cellPadding=0 border=0>
                                       <TBODY>
                                          <TR>
                                             <TD>
                                                <CENTER>
                                                   <BR>
                                                   <SPAN 
                                                      style="DISPLAY: inline-block; MARGIN: 0px; WIDTH: 312px">
                                                      <TABLE style="DISPLAY: inline; WIDTH: 312px" cellSpacing=0 
                                                         cellPadding=0>
                                                         <TBODY>
                                                            <TR>
                                                               <TD vAlign=top height=180>
                                                                  <IMG style="DISPLAY: block"
                                                                       height=100 src="../img/title/rslogo.gif" width=312> <BR>
                                                                  <CENTER><SPAN style=""font-size: 14px" 
                                                                     color:white;\?>There are currently 77150 people 
                                                                     playing!
                                                   </SPAN>
                                                   </CENTER></TD></TR></TBODY></TABLE></SPAN>
                                                   <SPAN 
                                                      style="DISPLAY: inline-block; MARGIN: 0px 0px 0px 20px; WIDTH: 430px">
                                                      <TABLE style="DISPLAY: inline; WIDTH: 430px" cellSpacing=0 
                                                         cellPadding=0>
                                                         <TBODY>
                                                            <TR>
                                                               <TD vAlign=top>
                                                                  <TABLE cellSpacing=0 cellPadding=0 bgColor=black 
                                                                     border=0>
                                                                     <TBODY>
                                                                        <TR>
                                                                           <TD><IMG height=6 src="../img/title/fm_topleft.gif"
                                                                              width=6></TD>
                                                                           <TD background=../img/title/fm_top2.gif><IMG
                                                                                   height=6 src="../img/title/blank.gif" width=1></TD>
                                                                           <TD><IMG height=6
                                                                                    src="../img/title/fm_topright.gif" width=6></TD>
                                                                        </TR>
                                                                        <TR>
                                                                           <TD background=../img/title/fm_left.gif><IMG
                                                                                   height=1 src="../img/title/blank.gif" width=6></TD>
                                                                           <TD>
                                                                              <CENTER>
                                                                                 <IMG height=7 src="../img/title/blank.gif"
                                                                                    width=1><BR><B>Latest News and Updates</B><BR>
                                                                                 <TABLE cellSpacing=0 cellPadding=0 
                                                                                    bgColor=black>
                                                                                    <TBODY>
                                                                                       <TR vAlign=top>
                                                                                          <TD align=middle width=100><A 
                                                                                             href="news.html"><IMG 
                                                                                             src="../img/title/mm_scroll.jpg"
                                                                                             border=0></A></TD>
                                                                                          <TD width=320>
                                                                                             <CENTER>
                                                                                                <TABLE height=130>
                                                                                                   <TBODY>
                                                                                                      <TR>
                                                                                                         <TD>
                                                                                                            <TABLE width=320>
                                                                                                               <TBODY>
                                                                                                                  <?php if(isset($news)){
                                                                                                                     foreach($news as $n){
                                                                                                                        echo $n;
                                                                                                                     }
                                                                                                                  }
                                                                                                                  ?>
                                                                                                               </TBODY>
                                                                                                            </TABLE>
                                                                                                         </TD>
                                                                                                      </TR>
                                                                                                   </TBODY>
                                                                                                </TABLE>
                                                                                             </CENTER>
                                                                                          </TD>
                                                                                       <TR></TR>
                                                                                    </TBODY>
                                                                                 </TABLE>
                                                                                 To view a full list of 
                                                                                 news and updates, <A class=c 
                                                                                    href="news.php?category=0">Click 
                                                                                 Here</A>. <BR><BR>
                                                                              </CENTER>
                                                                           </TD>
                                                                           <TD background=../img/title/fm_right.gif><IMG
                                                                              height=1 src="../img/title/blank.gif"
                                                                              width=6></TD>
                                                                        </TR>
                                                                        <TR>
                                                                           <TD><IMG height=6
                                                                                    src="../img/title/fm_bottomleft.gif" width=6></TD>
                                                                           <TD background=../img/title/fm_bottom2.gif><IMG
                                                                                   height=6 src="../img/title/blank.gif" width=1></TD>
                                                                           <TD><IMG height=6 
                                                                              src="../img/title/fm_bottomright.gif"
                                                                              width=6></TD>
                                                                        </TR>
                                                                     </TBODY>
                                                                  </TABLE>
                                                               </TD>
                                                            </TR>
                                                         </TBODY>
                                                      </TABLE>
                                                   </SPAN>
                                                   <DIV 
                                                      style="; WIDTH: expression(document.body.clientWidth > 770 ? '770px': 'auto' ); max-width: 770px">
                                                      <TABLE style="MARGIN-TOP: 10px; max-width: 770px" 
                                                         cellSpacing=0 cellPadding=0 bgColor=black border=0>
                                                         <TBODY>
                                                            <TR>
                                                               <TD><IMG height=6 src="../img/title/fm_topleft.gif"
                                                                  width=6></TD>
                                                               <TD background=../img/title/fm_top2.gif><IMG height=6
                                                                                                            src="../img/title/blank.gif" width=1></TD>
                                                               <TD><IMG height=6 src="../img/title/fm_topright.gif"
                                                                  width=6></TD>
                                                            </TR>
                                                            <TR>
                                                               <TD background=../img/title/fm_left.gif><IMG height=1
                                                                                                            src="../img/title/blank.gif" width=6></TD>
                                                               <TD>
                                                                  <CENTER>
                                                                     <IMG height=7 src="../img/title/blank.gif"
                                                                        width=505><BR><B>Main Features</B> <BR><BR>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="detail.html"><IMG
                                                                                         src="../img/title/mm_sword.jpg" border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b2 id=playgamebut 
                                                                                                background=../img/title/shinystonered.jpg
                                                                                                bgColor=#570700>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="redglow('playgamebut')" 
                                                                                                   onmouseout="unredglow('playgamebut')" 
                                                                                                   href="detail.html"><B>Play 
                                                                                                   Game</B><BR>(Existing&nbsp;User)</A>
                                                                                                </CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Play 
                                                                                    RuneScape right now!<BR><A class=c 
                                                                                       href="detail.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="create/index.html"><IMG
                                                                                         src="../img/title/mm_player.jpg" border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b2 id=createaccountbut 
                                                                                                background=../img/title/shinystonered.jpg
                                                                                                bgColor=#570700>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="redglow('createaccountbut')" 
                                                                                                   onmouseout="unredglow('createaccountbut')" 
                                                                                                   href="create/index.php"><B>Create&nbsp;Account</B><BR>(New 
                                                                                                   User)</A>
                                                                                                </CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Create 
                                                                                    a free account for both the game &amp; 
                                                                                    website.<BR><A class=c 
                                                                                       href="create/index.hphp">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="screenshots/screenshots.html"><IMG 
                                                                                    src="../img/title/mm2_screenshots.jpg"
                                                                                    border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b id=screenshotsbut 
                                                                                                background=../img/stoneback.gif
                                                                                                bgColor=#474747>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="greyglow('screenshotsbut')" 
                                                                                                   onmouseout="ungreyglow('screenshotsbut')" 
                                                                                                   href="screenshots/screenshots.html"><B>Screenshots</B></A></CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Lots 
                                                                                    of images of the game in action.<BR><A class=c 
                                                                                       href="screenshots/screenshots.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="members/members.html"><IMG
                                                                                         src="../img/title/mm_members.jpg" border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b id=membersbut 
                                                                                                background=../img/stoneback.gif
                                                                                                bgColor=#474747>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="greyglow('membersbut')" 
                                                                                                   onmouseout="ungreyglow('membersbut')" 
                                                                                                   href="members/members.html"><B>Benefits 
                                                                                                   for 
                                                                                                   Members</B></A>
                                                                                                </CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Find 
                                                                                    out what extras are available to members.<BR><A 
                                                                                       class=c 
                                                                                       href="members/members.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="howtoplay.html"><IMG 
                                                                                    height=120 src="../img/title/mm_howtoplay.jpg"
                                                                                    width=77 border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b id=manualbut 
                                                                                                background=../img/stoneback.gif
                                                                                                bgColor=#474747>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="greyglow('manualbut')" 
                                                                                                   onmouseout="ungreyglow('manualbut')" 
                                                                                                   href="howtoplay.html"><B>Manual</B></A></CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Detailed 
                                                                                    info on all aspects of the game.<BR><A class=c 
                                                                                       href="howtoplay.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="hiscores/hiscores.html"><IMG
                                                                                         src="../img/title/mm_chalice.jpg" border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b id=hiscoresbut 
                                                                                                background=../img/stoneback.gif
                                                                                                bgColor=#474747>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="greyglow('hiscoresbut')" 
                                                                                                   onmouseout="ungreyglow('hiscoresbut')" 
                                                                                                   href="hiscores/hiscores.html"><B>Full<BR>Hiscores</B></A></CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Is 
                                                                                    your character in the top 500,000?<BR><A class=c 
                                                                                       href="hiscores/hiscores.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="varrock/varrockindex.html"><IMG
                                                                                         height=120 src="../img/title/mm_lov.jpg" width=77
                                                                                         border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b id=varrockbut 
                                                                                                background=../img/stoneback.gif
                                                                                                bgColor=#474747>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="greyglow('varrockbut')" 
                                                                                                   onmouseout="ungreyglow('varrockbut')" 
                                                                                                   href="varrock/varrockindex.html"><B>Library 
                                                                                                   of 
                                                                                                   Varrock</B></A>
                                                                                                </CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Stories 
                                                                                    and letters about RuneScape.<BR><A class=c 
                                                                                       href="varrock/varrockindex.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD align=middle width=100><A 
                                                                                    href="worldmap/worldmap.html"><IMG 
                                                                                    height=120 src="../img/title/mm_worldmap.jpg"
                                                                                    width=77 border=0></A></TD>
                                                                                 <TD vAlign=top width=120>
                                                                                    <TABLE height=45 cellPadding=2 width=110 
                                                                                       bgColor=black>
                                                                                       <TBODY>
                                                                                          <TR>
                                                                                             <TD class=b id=worldmapbut 
                                                                                                background=../img/stoneback.gif
                                                                                                bgColor=#474747>
                                                                                                <CENTER><A class=whitelink 
                                                                                                   onmouseover="greyglow('worldmapbut')" 
                                                                                                   onmouseout="ungreyglow('worldmapbut')" 
                                                                                                   href="worldmap/worldmap.html"><B>World 
                                                                                                   Map</B></A>
                                                                                                </CENTER>
                                                                                             </TD>
                                                                                          </TR>
                                                                                       </TBODY>
                                                                                    </TABLE>
                                                                                    Great 
                                                                                    for finding your way around.<BR><A class=c 
                                                                                       href="worldmap/worldmap.html">Click 
                                                                                    Here</A> 
                                                                                 </TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                     <SPAN 
                                                                        class=item>
                                                                        <TABLE class=itemtable cellSpacing=0 cellPadding=0>
                                                                           <TBODY>
                                                                              <TR>
                                                                                 <TD width=100><IMG height=1
                                                                                                    src="../img/title/blank.gif" width=77></TD>
                                                                                 <TD width=120><IMG height=1 
                                                                                    src="../img/title/blank.gif"
                                                                                    width=110></TD>
                                                                              </TR>
                                                                           </TBODY>
                                                                        </TABLE>
                                                                     </SPAN>
                                                                  </CENTER>
                                                                  <BR>
                                                               </TD>
                                                               <TD background=../img/title/fm_right.gif><IMG height=1
                                                                                                             src="../img/title/blank.gif" width=6></TD>
                                                            </TR>
                                                            <TR>
                                                               <TD><IMG height=6 src="../img/title/fm_bottomleft.gif"
                                                                  width=6></TD>
                                                               <TD background=../img/title/fm_bottom2.gif><IMG height=6
                                                                                                               src="../img/title/blank.gif" width=1></TD>
                                                               <TD><IMG height=6 src="../img/title/fm_bottomright.gif"
                                                                  width=6></TD>
                                                            </TR>
                                                         </TBODY>
                                                      </TABLE>
                                                   </DIV>
                                                   <SPAN 
                                                      style="DISPLAY: inline-block; MARGIN: 0px 7px 10px 0px; WIDTH: 380px">
                                                      <TABLE style="DISPLAY: inline; WIDTH: 380px" cellSpacing=0 
                                                         cellPadding=0>
                                                         <TBODY>
                                                            <TR>
                                                               <TD vAlign=top>
                                                                  <BR>
                                                                  <TABLE cellSpacing=0 cellPadding=0 width=380 
                                                                     bgColor=black>
                                                                     <TBODY>
                                                                        <TR>
                                                                           <TD><IMG height=6 src="../img/title/fm_topleft.gif"
                                                                              width=6></TD>
                                                                           <TD background=../img/title/fm_top2.gif><IMG
                                                                                   height=6 src="../img/title/blank.gif" width=1></TD>
                                                                           <TD><IMG height=6
                                                                                    src="../img/title/fm_topright.gif" width=6></TD>
                                                                        </TR>
                                                                        <TR>
                                                                           <TD background=../img/title/fm_left.gif><IMG
                                                                                   height=1 src="../img/title/blank.gif" width=6></TD>
                                                                           <TD width=368>
                                                                              <IMG height=7
                                                                                   src="../img/title/blank.gif" width=1><BR>
                                                                              <CENTER>
                                                                                 <B>Secure Services</B> <BR><BR>
                                                                                 <TABLE cellSpacing=5 cellPadding=0>
                                                                                    <TBODY>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                        <CENTER>
                                                                                                        <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=whitelink href="securemenu/securemenu.php"><B>Subscribe</B></A>
                                                                                                        <?php else:?>
                                                                                                            <A class=whitelink href="login.php"><B>Subscribe</B></A>
                                                                                                        <?php endif ?>   
                                                                                                        </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_subscribe.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD vAlign=top>Start a members subscription 
                                                                                                         here.<BR>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="securemenu/securemenu.php">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER>
                                                                                                            <?php if (isset($_SESSION['username'])) :?>
                                                                                                                <A class=whitelink href="securemenu/securemenu.php">Account Management</A>
                                                                                                            <?php else:?>
                                                                                                                <A class=whitelink href="login.php">Account Management</A>
                                                                                                            <?php endif ?>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                   <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_accman.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Manage your Password and Recovery 
                                                                                                         Details.<BR>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="securemenu/securemenu.php">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?>
                                                                                                      </TD>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=whitelink href="customersupport/customersupport.php"><B>Customer Support</B></A>
                                                                                                        <?php else:?>
                                                                                                            <A class=whitelink href="login.php"><B>Customer Support</B></A>
                                                                                                        <?php endif ?>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_support.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Questions?<BR>Contact our staff.<BR>
                                                                                                      <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="customersupport/customersupport.php">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=whitelink href="messagecentre/messagecentre.html"><B>Message Centre</B></A>
                                                                                                        <?php else:?>
                                                                                                            <A class=whitelink href="login.php"><B>Message Centre</B></A>
                                                                                                        <?php endif ?>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_inbox.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Your messages from our staff.<BR>
                                                                                                      <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="messagecentre/messagecentre.html">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=whitelink href="forums/EnterForumsPage.php"><B>Forums</B></A>
                                                                                                        <?php else:?>
                                                                                                            <A class=whitelink href="login.php"><B>Forums</B></A>
                                                                                                        <?php endif ?>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_forums.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Discuss the game with fellow players!<BR>
                                                                                                      <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="forums/EnterForumsPage.php">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?></TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=whitelink href="hiscores/hiscores.html"><B>Personal Hiscores</B></A>
                                                                                                        <?php else:?>
                                                                                                            <A class=whitelink href="login.php"><B>Personal Hiscores</B></A>
                                                                                                        <?php endif ?>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_chalice.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>How do you rank compared to your 
                                                                                                         friends?<BR>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="hiscores/hiscores.html">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER>
                                                                                                         <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=whitelink href="polls/latestpoll.htm"><B>Lates Poll</B></A>
                                                                                                        <?php else:?>
                                                                                                            <A class=whitelink href="login.php"><B>Latest Poll</B></A>
                                                                                                        <?php endif ?>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="login.php"><IMG 
                                                                                                         height=75 src="../img/title/mms_vote.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>What do you enjoy most about Quests? <BR>
                                                                                                      <?php if (isset($_SESSION['username'])) :?>
                                                                                                            <A class=c href="polls/latestpoll.htm">Find More</A>
                                                                                                        <?php else:?>
                                                                                                            <A class=c href="login.php">Login</A>
                                                                                                        <?php endif ?></TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                       </TR>
                                                                                    </TBODY>
                                                                                 </TABLE>
                                                                              </CENTER>
                                                                           </TD>
                                                                           <TD background=../img/title/fm_right.gif><IMG
                                                                              height=1 src="../img/title/blank.gif"
                                                                              width=6></TD>
                                                                        </TR>
                                                                        <TR>
                                                                           <TD><IMG height=6
                                                                                    src="../img/title/fm_bottomleft.gif" width=6></TD>
                                                                           <TD background=../img/title/fm_bottom2.gif><IMG
                                                                                   height=6 src="../img/title/blank.gif" width=1></TD>
                                                                           <TD><IMG height=6 
                                                                              src="../img/title/fm_bottomright.gif"
                                                                              width=6></TD>
                                                                        </TR>
                                                                     </TBODY>
                                                                  </TABLE>
                                                               </TD>
                                                            </TR>
                                                         </TBODY>
                                                      </TABLE>
                                                   </SPAN>
                                                   <SPAN 
                                                      style="DISPLAY: inline-block; MARGIN: 0px 0px 10px; WIDTH: 380px">
                                                      <TABLE style="DISPLAY: inline; WIDTH: 380px" cellSpacing=0 
                                                         cellPadding=0>
                                                         <TBODY>
                                                            <TR>
                                                               <TD vAlign=top>
                                                                  <BR>
                                                                  <TABLE cellSpacing=0 cellPadding=0 width=380 
                                                                     bgColor=black>
                                                                     <TBODY>
                                                                        <TR>
                                                                           <TD><IMG height=6 src="../img/title/fm_topleft.gif"
                                                                              width=6></TD>
                                                                           <TD width="100%" 
                                                                              background=../img/title/fm_top2.gif><IMG height=6
                                                                                                                       src="../img/title/blank.gif" width=1></TD>
                                                                           <TD><IMG height=6
                                                                                    src="../img/title/fm_topright.gif" width=6></TD>
                                                                        </TR>
                                                                        <TR>
                                                                           <TD background=../img/title/fm_left.gif><IMG
                                                                                   height=1 src="../img/title/blank.gif" width=6></TD>
                                                                           <TD width=368>
                                                                              <CENTER>
                                                                                 <IMG height=7 src="../../../img/title/lank.gif"
                                                                                    width=1><BR><B>Other Features</B> <BR><BR><!--table to contain options-->
                                                                                 <TABLE cellSpacing=5 cellPadding=0>
                                                                                    <TBODY>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER><A class=whitelink 
                                                                                                            href="unsubscribe/unsubscribe.html"><B>Unsubscribe</B></A></CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="unsubscribe/unsubscribe.html"><IMG 
                                                                                                         height=75 src="../img/title/mms_unsubscribe.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Cancel your subscription.<BR><A class=c 
                                                                                                         href="unsubscribe/unsubscribe.html">Click 
                                                                                                         Here</A>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER><A class=whitelink 
                                                                                                            href="customersupport/password/passwordsupport.html"><B>Password 
                                                                                                            Support</B></A>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="customersupport/password/passwordsupport.html"><IMG 
                                                                                                         height=75 
                                                                                                         src="../img/title/mms_passwordsupport.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>If you lose/forget your password help is at 
                                                                                                         hand.<BR><A class=c 
                                                                                                            href="customersupport/password/passwordsupport.html">Click 
                                                                                                         Here</A>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER><A class=whitelink 
                                                                                                            href="faq/faqindex.html"><B>F.A.Q.</B></A></CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="faq/faqindex.html"><IMG
                                                                                                              height=75 src="../img/title/mms_faq.jpg" width=48
                                                                                                              border=0></A></TD>
                                                                                                      <TD>Answers to Frequently Asked Questions.<BR><A 
                                                                                                         class=c 
                                                                                                         href="faq/faqindex.html">Click 
                                                                                                         Here</A>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER><A class=whitelink 
                                                                                                            href="guides/guides.html"><B>Rules 
                                                                                                            &amp; 
                                                                                                            Security</B></A>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="guides/guides.html"><IMG 
                                                                                                         height=75 src="../img/title/mms_rules.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Learn our rules and stay safe online.<BR><A 
                                                                                                         class=c 
                                                                                                         href="guides/guides.html">Click 
                                                                                                         Here</A>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER><A class=whitelink 
                                                                                                            href="files/files.html"><B>Extra 
                                                                                                            Files</B></A>
                                                                                                         </CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="files/files.html"><IMG 
                                                                                                         height=75 src="../img/title/mms_extrafiles.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>Download optional extras for 
                                                                                                         RuneScape.<BR><A class=c 
                                                                                                            href="files/files.html">Click 
                                                                                                         Here</A>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD class=b background=../img/stoneback.gif
                                                                                                         bgColor=#474747>
                                                                                                         <CENTER><A class=whitelink 
                                                                                                            href="classic/playclassic.html"><B>RS-Classic</B></A></CENTER>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><A 
                                                                                                         href="classic/playclassic.html"><IMG 
                                                                                                         height=75 src="../img/title/mms_rsclassic.jpg"
                                                                                                         width=48 border=0></A></TD>
                                                                                                      <TD>RuneScape Classic.<BR><A class=c 
                                                                                                         href="classic/playclassic.html">Click 
                                                                                                         Here</A>
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                       <TR>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE 
                                                                                                style="BORDER-RIGHT: black 4px solid; BORDER-TOP: black 4px solid; BORDER-LEFT: black 4px solid; BORDER-BOTTOM: black 4px solid" 
                                                                                                cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><B>&nbsp;</B></TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><IMG height=75 src="../img/title/blank.gif"
                                                                                                         width=48 border=0></TD>
                                                                                                      <TD style="COLOR: black">What do you enjoy most 
                                                                                                         about Quests? 
                                                                                                         <BR>&nbsp;
                                                                                                      </TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                          <TD>&nbsp;</TD>
                                                                                          <TD vAlign=top align=middle width=160>
                                                                                             <TABLE 
                                                                                                style="BORDER-RIGHT: black 4px solid; BORDER-TOP: black 4px solid; BORDER-LEFT: black 4px solid; BORDER-BOTTOM: black 4px solid" 
                                                                                                cellPadding=2 width=160 bgColor=black>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><B>&nbsp;</B></TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                             <TABLE>
                                                                                                <TBODY>
                                                                                                   <TR>
                                                                                                      <TD><IMG height=75 src="../img/title/blank.gif"
                                                                                                         width=48 
                                                                                                         border=0></TD>
                                                                                                   </TR>
                                                                                                </TBODY>
                                                                                             </TABLE>
                                                                                          </TD>
                                                                                       </TR>
                                                                                    </TBODY>
                                                                                 </TABLE>
                                                                              </CENTER>
                                                                           </TD>
                                                                           <TD background=../img/title/fm_right.gif><IMG
                                                                              height=1 src="../img/title/blank.gif"
                                                                              width=6></TD>
                                                                        </TR>
                                                                        <TR>
                                                                           <TD><IMG height=6
                                                                                    src="../img/title/fm_bottomleft.gif" width=6></TD>
                                                                           <TD background=../img/title/fm_bottom2.gif><IMG
                                                                                   height=6 src="../img/title/blank.gif" width=1></TD>
                                                                           <TD><IMG height=6 
                                                                              src="../img/title/fm_bottomright.gif"
                                                                              width=6></TD>
                                                                        </TR>
                                                                     </TBODY>
                                                                  </TABLE>
                                                               </TD>
                                                            </TR>
                                                         </TBODY>
                                                      </TABLE>
                                                   </SPAN>
                                                   <BR>
                                                   <TABLE>
                                                      <TBODY>
                                                         <TR>
                                                            <TD>
                                                               <DIV 
                                                                  style="FONT-SIZE: 11px; FONT-FAMILY: Arial,Helvetica,sans-serif" 
                                                                  align=center>This webpage and its contents is copyright 
                                                                  2005 Jagex Ltd<BR>To use our service you must agree to 
                                                                  our <A class=c 
                                                                     href="terms/terms.html">Terms+Conditions</A> 
                                                                  + <A class=c 
                                                                     href="privacy/privacy.html">Privacy 
                                                                  policy</A> 
                                                               </DIV>
                                                            </TD>
                                                         </TR>
                                                      </TBODY>
                                                   </TABLE>
                                                </CENTER>
                                             </TD>
                                          </TR>
                                       </TBODY>
                                    </TABLE>
                                 </CENTER>
                              </TD>
                           </TR>
                        </TBODY>
                     </TABLE>
                  </CENTER>
            </TR>
         </TBODY>
      </TABLE>
   </BODY>
</HTML>
