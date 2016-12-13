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
      	[ <A href="{$SCRIPT_NAME}?type=logout">ログアウト</A> ]
	<BR>
	<BR>
	{$disp_login_state}

      </TD>
        <TD width="78%" align="left" valign="top">
        {if ($body)} 
        <H3>お知らせ</H3>
        {$reg_date|date_format:"%Y年%m月%d日"} {$subject|escape:"html"}<br> 
        {$body|escape:"html"} <br><br><br>
        {/if}    
        <P>{$last_name|escape:"html"} {$first_name|escape:"html"} さん、こんにちは！
          <BR>
          <BR>
	  <A href="{$SCRIPT_NAME}?type=modify&action=form">会員登録情報の修正</A>
          <BR>
          <BR>
	  <A href="{$SCRIPT_NAME}?type=delete&action=confirm">退会する</A>
          <BR>
	  
        </P>
          </TD>
      </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}<PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
