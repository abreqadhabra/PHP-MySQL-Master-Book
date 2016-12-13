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
        
      <TD width="22%" align="left" valign="top">
	[ <A href="{$SCRIPT_NAME}">トップページへ</A> ]
{if ($is_system) }
	<BR>
	<BR>
      	[ <A href="{$SCRIPT_NAME}?type=list&action=form{$add_pageID}">会員一覧</A> ]
{/if}
	<BR>
	<BR>
	{$disp_login_state}
      </TD>
        
      <TD width="78%" align="left" valign="top"> 
        <FORM {$form.attributes}>
	{$message}
	<BR>
	<BR>
		{$form.submit.html}

		<INPUT type="hidden" name="type"   value="{$type}">
		<INPUT type="hidden" name="action" value="{$action}">

        </FORM>
        </TD>
      </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}<PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
