<?php

include "../connect.php";
$stmt = $conn->prepare("SELECT * FROM news WHERE newsID = ?");
$stmt->bind_param("i",$_GET['newsID']);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();

$date = strtotime($news['Newsdate']);
$date_format = date('d-M-Y', $date);
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
                     <td valign=top>
                        <img src=../../../img/edge_a.jpg width=100 height=43 hspace=0 vspace=0>
                     </td>
                     <td valign=top>
                        <img src=../../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                     </td>
                     <td valign=top>
                        <img src=../../../img/edge_d.jpg width=100 height=43 hspace=0 vspace=0>
                     </td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=../../../img/background2.jpg>
                  <tr>
                     <td valign=bottom>
                        <center>
                           <table>
                              <tr>
                                 <td>
                                    <table bgcolor=black cellpadding=1>
                                       <tr>
                                          <td class=b bgcolor=#474747 background=../../../img/stoneback.gif>
                                             <center>
                                                <a href='440.html'>
                                                   <img src=../../../img/prevpage.gif border=0 width=74 height=35>
                                                </a>
                                             </center>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td width=40>
                                    &nbsp
                                 </td>
                                 <td valign=bottom>
                                    <table width=250 bgcolor=black cellpadding=4>
                                       <tr>
                                          <td class=e>
                                             <center>
                                                <b>Latest Game Updates News</b>
                                                <br>
                                                <a href='../title.php' class=c>
                                                   Main Menu
                                                </a>
                                             </center>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td width=40></td>
                                 <td>
                                    <table bgcolor=black cellpadding=1>
                                       <tr>
                                          <td class=b bgcolor=#474747 background=../../../img/stoneback.gif>
                                             <center>
                                                <a href='437.html'>
                                                   <img src=../../../img/nextpage.gif border=0 width=74 height=35>
                                                </a>
                                             </center>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                           <img src='../../../img/title/blank.gif' width=1 height=3>
                           <br>
                           <center>
                              <a href='../news.php&category=0' class=white>
                                 All Categories
                              </a>
                              -
                              <a href='../news.php?category=1' class=red>
                                 Game Updates
                              </a>
                              -
                              <a href='../news.php?category=2' class=lblue>
                                 Website
                              </a> -
                              <a href='../news.php?category=3' class=yellow>
                                 Customer Support
                              </a>
                              <br>
                              <a href='../news.php?category=4' class=dblue>
                                 Technical
                              </a> -
                              <a href='../news.php?category=5' class=purple>
                                 Behind the Scenes
                              </a>
                              <br>
                              <img src='../../../img/title/blank.gif' width=1 height=3>
                              <br>
                              <table width=500 bgcolor=black cellpadding=4>
                                 <tr>
                                    <td class=e>
                                       <center>
                                          <b>
                                             <?php echo $date_format;?> - <?php echo $news['title'];?>
                                          </b>
                                       </center>
                                       <br>
                                       <?php echo $news['feed'];?>
                                    </td>
                                 </tr>
                              </table>
                              <p>
                     </td>
                  </tr>
               </table>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=bottom><img src=../../../img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0></td>
                     <td valign=bottom>
                        <div align=center style="font-family:Arial,Helvetica,sans-serif;
               font-size:11px;"> This webpage and its contents is copyright 2005 Jagex Ltd<br> To use our service you
                           must agree to our
                           <a href="../terms/terms.html" class=c>Terms+Conditions</a> + <a
                              href="../privacy/privacy.html" class=c>Privacy policy</a>
                        </div> <img src=../../../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                     </td>
                     <td valign=bottom><img src=../../../img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0></td>
                  </tr>
               </table>
            </center>
         </td>
      </tr>
   </table>
</body>

</html>