<HTML>
<HEAD>
<TITLE>{$title}</TITLE>
{$form.javascript}
</HEAD>
<BODY bgcolor="#FFFFFF">
<CENTER>
<HR size="1" noshade>
<B>{$title}</B>
<HR size="1" noshade>
    <TABLE width="100%" border="0" cellspacing="5" cellpadding="5">
      <TR>
      <TD width="22%" align="left" valign="top">
	[ <A href="{$SCRIPT_NAME}">トップページへ</A> ]
{if ($is_system) }
	<BR><BR>
      	[ <A href="{$SCRIPT_NAME}?type=list&action=form{$add_pageID}">会員一覧</A> ]
{/if}
	<BR><BR>
	{$disp_login_state}
      </TD>
      <TD width="78%" align="left" valign="top"> 
	{$message}
        <FORM {$form.attributes}>
          <TABLE width="95%" border="0" cellspacing="5" cellpadding="0">
            <TR valign="top"> 
              <TD nowrap align="right" width="150">
	      <FONT size="2">{$form.subject.label}：</FONT></TD>
              <TD width="79%"> 
                {if $form.subject.error }
                  <font size="2" color="red">{$form.subject.error}</font><BR>
                {/if}
                {$form.subject.html}</TD>
            </TR>
            <TR valign="top"> 
              <TD nowrap align="right" width="150">
	      <FONT size="2">{$form.body.label}：</FONT></TD>
              <TD width="79%"> 
                {if $form.body.error }
                  <font size="2" color="red">{$form.body.error}</font><BR>
                {/if}
                {$form.body.html}</TD>
            </TR>
            <TR align="center" valign="top"> 
            <TD>&nbsp; </TD>
            <TD align="left">
            {$form.submit.html}
            <INPUT type="hidden" name="type"   value="{$type}">
            <INPUT type="hidden" name="action" value="{$action}">
            </TD>
            </TR>
          </TABLE>
          <BR>
        </FORM>
        </TD>
      </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}<PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
