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
[ <A href="{$SCRIPT_NAME}?type=list&action=form">会員一覧</A> ]   会員の検索・更新・削除を行います。<BR><BR>
[ <A href="{$SCRIPT_NAME}?type=notice&action=form">お知らせ</A> ]   会員トップページのお知らせを更新します。<BR><BR>
        <BR>
        <BR>

         </TD>
      </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}<PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
