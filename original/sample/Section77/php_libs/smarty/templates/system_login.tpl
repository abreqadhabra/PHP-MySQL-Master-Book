<HTML>
<HEAD>
<TITLE>{$title}</TITLE>
</HEAD>
<BODY>
<CENTER>
<HR size="1" noshade>
<B>{$title}</B>
<HR size="1" noshade>
    <TABLE width="100%" border="0" cellspacing="5" cellpadding="5">
      <TR>
        <TD width="22%"> 
	  <FORM {$form.attributes}>
          <TABLE border="0" cellpadding="0" cellspacing="0" summary="login form" width="100">
            <TR> 
              <TD colspan="2" bgcolor="#eeeeee"><B><FONT size="2">管理画面:</FONT></B></TD>
            </TR>
            <TR> 
              <TD nowrap><FONT size="2">{$form.username.label}:</FONT></TD>
              <TD> {$form.username.html}</TD>
            </TR>

	    <TR> 
              <TD nowrap><FONT size="2">{$form.password.label}:</FONT></TD>
              <TD> {$form.password.html}</TD>
            </TR>
            <TR> 
              <TD colspan="2" > 
                <INPUT type="hidden" name="type" value="{$type}">
                <DIV align="center">{$form.submit.html}</DIV>
		<BR>
                <FONT size="2" color="red"> {$auth_error_mess} </FONT></TD>
            </TR>
          </TABLE>
	  </FORM>
	  
        </TD>
        <TD width="78%" align="left" valign="top">
            <BR>
            <BR>
        </TD>
      </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}<PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
