<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
  <META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
  <META http-equiv=refresh content=600;URL=banner.cgi?size=120&amp;rs=1&amp;showside=-1>
  <META http-equiv=Expires content=0>
  <META http-equiv=Pragma content=no-cache>
  <META http-equiv=Cache-Control content=no-cache>
  <META content="MSHTML 6.00.2800.1505" name=GENERATOR>
  <style>
    BODY,
    TD,
    P {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    a:link {
      color: white;
    }
  </style>
</HEAD>

<BODY style="MARGIN: 0px" bgColor=#222233>

  <TABLE height="100%">
    <TBODY>
      <TR vAlign=top>
        <TD align=middle>
          <TABLE cellSpacing=0 cellPadding=0>
            <TBODY>
              <TR>
                <TD vAlign=center align=top><IMG width=44 height=59 src="frame_files/lock.gif" border=0></TD>

        <?php if(isset($_SESSION['username'])):?>
        <div style="float: left; padding-top: 8%; margin:left: 1%;">
            <A href="securemenu/securemenu.php" style="text-decoration: underline;" class="c" ><FONT color=white>Secure Menu</FONT></A><BR><br>
            <A href="logout.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Logout</FONT></A></TD>
        </div>
        <?php else:?>
                <br>
                <br>
                <A href="login.php" style="text-decoration: underline; margin-left:20%;" class="c" ><FONT color=white>Login</FONT></A></TD>
        <?php endif?>

                </NOSCRIPT></CENTER>
        </TD>
      </TR>
    </TBODY>
  </TABLE>
  </TD>
  </TR>
  </TBODY>
  </TABLE>
</BODY>

</HTML>