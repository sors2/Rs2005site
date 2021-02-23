<?php 

if(!isset($_GET['page']))
{
    $page = 1;
}
else{
    $page = $_GET['page'];
}

include "connect.php";

if(isset($_GET['category']) && $_GET['category'] > 0){
   if ($_GET['category'] == '1'){
      $cat = "Game Updates";
   }
   if ($_GET['category']  == '2'){
     $cat = "Website";
   }
   if ($_GET['category']  == '3'){
     $cat = "Customer Support";
   } 
   if ($_GET['category']  == '4'){
     $cat = "technical";
   } 
   if ($_GET['category']  == '5'){
     $cat = "Behind the Scenes";
   }
   $stmt = $conn->prepare("SELECT * FROM news WHERE category = ?");
   $stmt->bind_param("s",$cat);
   $stmt->execute();
   $result = $stmt->get_result();
}
else{
    $result= mysqli_query($conn, "SELECT * FROM news");
   }

$num_per_pages = mysqli_num_rows($result);
$posts_per_page = 20;
if(mysqli_num_rows($result) > 0)
   {
         $total_results  = mysqli_num_rows($result);
         $num_per_pages = ceil($total_results/$posts_per_page);
         $start_num = ($page-1) * $posts_per_page;
   }
   else{
         $num_per_pages  = 1;
         $start_num = 0;
   }
   if(isset($cat)){
      $stmt = $conn->prepare("SELECT * FROM news WHERE category = ? LIMIT $start_num,$posts_per_page");
      $stmt->bind_param("s",$cat);
      $stmt->execute();
      $result = $stmt->get_result();
   }
   else{
      $result = mysqli_query($conn,"SELECT * FROM news LIMIT $start_num,$posts_per_page");
   }
   $news=[];
   while($row = mysqli_fetch_assoc($result))
   {    
      $color = "";
          if ($row['category'] == 'Game Updates'){
            $color = "#E10505";
          }
          if ($row['category'] == 'Website'){
            $color = "#C0D9D9";
        }
        if ($row['category'] == 'Customer Support'){
            $color = "#FFE139";
        } 
        if ($row['category'] == 'Technical'){
            $color = "#0D6083";
        } 
        if ($row['category'] == 'Behind the Scenes'){
            $color = "#C503FD";
        }

      $date = strtotime($row['Newsdate']);
      $date_format = date('d-M-Y', $date);
      $news[] = '<tr>
                   <td>
                   <font color='.$color.'>'.$row['category'].'</font>
                    </td>
                    <td>
                   <a href="news/NewsView.php?newsID='.$row['newsID'].'" class=c>'.$row['title'].'</a>
                   </td>
                   <td align=right>'.$date_format.'
                   </td>
                   </tr>';
    }

?>
<html>
   <head>
      <META HTTP-EQUIV="Expires" CONTENT="0">
      <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
      <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
      <meta name="MSSmartTagsPreventParsing" content="TRUE">
      <title>RuneScape - the massive online adventure game by Jagex Ltd</title>
      <STYLE>BODY, TD, P{ font-family:Arial,Helvetica,sans-serif; font-size:13px;}.b {border-style: outset; border-width:3pt; border-color:#373737}.b2 {border-style: outset; border-width:3pt; border-color:#570700}.e {border:2px solid #382418}.c {text-decoration:none}A.c:hover {text-decoration:underline}.white {text-decoration:none; color:#FFFFFF;} .red {text-decoration:none; color:#E10505;} .lblue {text-decoration:none; color:#9DB8C3;} .dblue {text-decoration:none; color:#0D6083;} .yellow {text-decoration:none; color:#FFE139;} .green {text-decoration:none; color:#04A800;} .purple {text-decoration:none; color:#C503FD;} .pink {text-decoration:none; color:#FAA8AA;} A.c:hover {text-decoration:underline} A.white:hover {text-decoration:underline} A.red:hover {text-decoration:underline} A.lblue:hover {text-decoration:underline} A.dblue:hover {text-decoration:underline} A.yellow:hover {text-decoration:underline} A.green:hover {text-decoration:underline} A.purple:hover {text-decoration:underline} A.pink:hover {text-decoration:underline} </STYLE>
   </head>
   <body bgcolor=black text="white" link=#90c040 alink=#90c040 vlink=#90c040 style="margin:0">
      <table width=100% height=100% cellpadding=0 cellspacing=0>
         <tr>
            <td valign=middle>
               <center>
               <table cellpadding=0 cellspacing=0>
                  <tr>
                     <td valign=top>
                        <img src=../img/edge_a.jpg width=100 height=43 hspace=0 vspace=0>
                     </td>
                     <td valign=top>
                        <img src=../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0>
                     </td>
                     <td valign=top>
                        <img src=../img/edge_d.jpg width=100 height=43 hspace=0 vspace=0>
                     </td>
                  </tr>
               </table>
               <table width=600 cellpadding=0 cellspacing=0 border=0 background=../img/background2.jpg>
                  <tr>
                     <td valign=bottom>
					 <br>
                        <center>
                           <table>
                              <tr>
                                 <?php
                                 if(isset($_GET['category'])){
                                    $category = $_GET['category'];
                                 }
                                 else{
                                    $category = 0;
                                 }

                                            $next = $page + 1;
                                            $prev = $page - 1;
                                            if($num_per_pages == $page && $page > 1)
                                            {
                                                echo '<td class=b bgcolor=#474747 background=../img/stoneback.gif>
                                                <center>
                                                <a href="news.php?category='.$category.'&page='.$prev.'">
                                                <img src=../img/prevpage.gif border=0 width=74 height=35></a>
                                                </center>
                                                </td>';     
                                            }
                                            elseif($page == 1)
                                            {
                                             echo '<td width=84></td>';
                                            }       
                                            else{
                                             echo '<td class=b bgcolor=#474747 background=../img/stoneback.gif>
                                             <center>
                                             <a href="news.php?category='.$category.'&page='.$prev.'">
                                             <img src=../img/prevpage.gif border=0 width=74 height=35></a>
                                             </center>
                                             </td>';  
                                            }
                                        ?>
                                 <td width=40>&nbsp
                                 </td>
                                 <td valign=bottom>
                                    <table width=250 bgcolor=black cellpadding=4>
                                       <tr>
                                          <td class=e>
                                             <center>
                                                <b>Latest News</b>
                                                <br>
                                                <a href='title.php' class=c>Main menu</a>
                                             </center>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td width=40>&nbsp
                                 </td>
                                 <td>
                                    <table bgcolor=black cellpadding=1>
                                       <tr>
                                       <?php
                                       if(isset($_GET['category'])){
                                          $category = $_GET['category'];
                                       }
                                       else{
                                          $category = 0;
                                       }
                                            $next = $page + 1;
                                            $prev = $page - 1;
                                            if($num_per_pages == $page && $page > 1)
                                            {
                                             echo '<td width=84></td>';   
                                            }
                                            elseif($page == 1)
                                            {
                                                    if($num_per_pages > 1)
                                                    {
                                                      echo '<td class=b bgcolor=#474747 background=../img/stoneback.gif>
                                                      <center>
                                                      <a href="news.php?category='.$category.'&page='.$next.'">
                                                      <img src=../img/nextpage.gif border=0 width=74 height=35></a>
                                                      </center>
                                                      </td>';
                                                    }
                                                    else{
                                                      echo '<td width=84></td>';
                                                    }
                                            }       
                                            else{
                                                echo '<td class=b bgcolor=#474747 background=../img/stoneback.gif>
                                                <center>
                                                <a href="news.php?category='.$category.'&page='.$next.'">
                                                <img src=../img/nextpage.gif border=0 width=74 height=35></a>
                                                </center>
                                                </td>';
                                            }
                                        ?>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                           <img src='../img/title/blank.gif' width=1 height=3>
                           <br>
                           <a href='news.php?&category=0' class=white>All Categories</a> - <a href='news.php?category=1' class=red>Game Updates</a> - <a href='news.php?category=2' class=lblue>Website</a> - <a href='news.php?category=3' class=yellow>Customer Support</a><br><a href='news.php?category=4' class=dblue>Technical</a> - <a href='news.php?category=5' class=purple>Behind the Scenes</a>
                           <br>
                           <img src='../img/title/blank.gif' width=1 height=3>
                           <br>
                           <table width=500 bgcolor=black cellpadding=4>
                              <tr>
                                 <td class=e>
                                    <center>
                                       <table width=490>
                                          <tr>
                                             <td width=25%>
                                                <b>Category</b>
                                             </td>
                                             <td>
                                                <b>News Item</b>
                                             </td>
                                             <td align='right'><b>Date</b>
                                             </td>
                                          </tr>
                                          <?php
                                          if(isset($news)){
                                             foreach($news as $n){
                                                echo $n;
                                             }
                                          }
                                          ?>
                                       </table>
                                    </center>
                                 </td>
                              </tr>
                           </table>
                           <p>
                     </td>
                  </tr>
               </table>
               <table cellpadding=0 cellspacing=0><tr><td valign=bottom><img src=../img/edge_g2.jpg width=100 height=82 hspace=0 vspace=0></td><td valign=bottom><div align=center style="font-family:Arial,Helvetica,sans-serif; font-size:11px;"> This webpage and its contents is copyright 2005 Jagex Ltd<br> To use our service you must agree to our <a href="terms/terms.html" class=c>Terms+Conditions</a> + <a href="privacy/privacy.html" class=c>Privacy policy</a> </div> <img src=../img/edge_c.jpg width=400 height=42 hspace=0 vspace=0></td><td valign=bottom><img src=../img/edge_h2.jpg width=100 height=82 hspace=0 vspace=0></td></tr></table></center>
            </td>
         </tr>
      </table>
   </body>
</html>