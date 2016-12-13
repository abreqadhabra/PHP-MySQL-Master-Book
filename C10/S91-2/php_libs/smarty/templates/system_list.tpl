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
                [ <A href="{$SCRIPT_NAME}">메인 페이지로</A> ]
                <BR>
                <BR>
                {$disp_login_state}
            </TD>
            <TD width="78%" align="left" valign="top">
                <P>[ <a href="{$SCRIPT_NAME}?type=regist&action=form{$add_pageID}">신규등록</a> ]
                    <BR>
                <FORM {$form.attributes}>
                    이름：<INPUT type="text" name="search_key" value="{$search_key}">
                    <INPUT type="submit" name="submit" value="검색하기">
                    <INPUT type="hidden" name="type" value="list">
                    <INPUT type="hidden" name="action" value="form">
                </FORM>
                검색결과는{$count}건입니다.<BR>
                <BR>
                {$links}
                {if ($data) }
                    <TABLE width="100%" border="1" cellspacing="0" cellpadding="8">
                        <TBODY>
                        <TR>
                            <TH>번호</TH>
                            <TH>성</TH>
                            <TH>이름</TH>
                            <TH>생년월일</TH>
                            <TH>행정구역</TH>
                            <TH>등록일</TH>
                            <TH></TH>
                            <TH></TH>
                        </TR>
                        {foreach item=item from=$data}
                            <TR>
                                <TD align="center">{$item.id}</TD>
                                <TD>{$item.last_name|escape:"html"}</TD>
                                <TD>{$item.first_name|escape:"html"}</TD>
                                <TD align="center">{$item.birthday|date_format:"%Y-%m-%d"}</TD>
                                <TD align="center">{$item.prefecture}</TD>
                                <TD align="center">{$item.reg_date|date_format:"%Y-%m-%d"}</TD>
                                <TD align="center">[<a
                                            href="{$SCRIPT_NAME}?type=modify&action=form&id={$item.id}{$add_pageID}">수정</a>]
                                </TD>
                                <TD align="center">[<a
                                            href="{$SCRIPT_NAME}?type=delete&action=confirm&id={$item.id}{$add_pageID}">삭제</a>]
                                </TD>
                            </TR>
                            </tr>
                        {/foreach}
                        </TBODY>
                    </TABLE>
                {/if}
                </P>
            </TD>
        </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}
    <PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>