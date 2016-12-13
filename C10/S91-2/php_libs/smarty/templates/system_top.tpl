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
                [ <A href="{$SCRIPT_NAME}?type=logout">로그아웃</A> ]
                <BR>
                <BR>
                {$disp_login_state}
            </TD>
            <TD width="78%" align="left" valign="top">
                [ <A href="{$SCRIPT_NAME}?type=list&action=form">회원목록</A> ] 회원을 검색/수정/삭제합니다.<BR><BR>
                [ <A href="{$SCRIPT_NAME}?type=notice&action=form">공지</A> ] 회원 메인 페이지의 공지를 수정합니다.<BR><BR>
                <BR>
                <BR>
            </TD>
        </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}
    <PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>