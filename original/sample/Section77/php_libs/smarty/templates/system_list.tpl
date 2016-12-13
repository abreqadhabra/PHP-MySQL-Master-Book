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
	<BR>
	<BR>
	{$disp_login_state}
      	</TD>
        <TD width="78%" align="left" valign="top">
        <P>[ <a href="{$SCRIPT_NAME}?type=regist&action=form{$add_pageID}">新規登録</a> ]
<BR>

<FORM {$form.attributes}>
名前：<INPUT type="text" name="search_key" value="{$search_key}">
<INPUT type="submit" name="submit" value="検索する">
<INPUT type="hidden" name="type" value="list">
<INPUT type="hidden" name="action" value="form">
</FORM>



検索結果は{$count}件です。<BR>
<BR>
{$links}
{if ($data) }
<TABLE width="100%" border="1"  cellspacing="0" cellpadding="8">
<TBODY>
<TR><TH>番号</TH><TH>氏</TH><TH>名</TH><TH>生年月日</TH><TH>県名</TH><TH>登録日</TH><TH>　</TH><TH>　</TH></TR>



{foreach item=item from=$data}
<TR>
<TD align="center">{$item.id}</TD>
<TD>{$item.last_name|escape:"html"}</TD>
<TD>{$item.first_name|escape:"html"}</TD>
<TD align=”center”>{$item.birthday|strtotime|date_format:”%Y年%m月%d日”}</TD>
<TD align="center">{$item.ken}</TD>
<TD align="center">{$item.reg_date|date_format:"%Y年%m月%d日"}</TD>
<TD align="center">[<a href="{$SCRIPT_NAME}?type=modify&action=form&id={$item.id}{$add_pageID}">更新</a>]</TD>
<TD align="center">[<a href="{$SCRIPT_NAME}?type=delete&action=confirm&id={$item.id}{$add_pageID}">削除</a>]</TD></TR>
</tr>
{/foreach}


</TBODY></TABLE>
{/if}

        </P>
          </TD>
      </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}<PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
