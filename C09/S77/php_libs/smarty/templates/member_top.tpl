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
                <P>{$last_name|escape:"html"} {$first_name|escape:"html"} 님, 안녕하세요!
                    <BR>
                    <BR>
                    <A href="{$SCRIPT_NAME}?type=modify&action=form">회원등록 정보의 수정</A>
                    <BR>
                    <BR>
                    <A href="{$SCRIPT_NAME}?type=delete&action=confirm">탈퇴하기</A>
                    <BR>

                </P>
            </TD>
        </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}
    <PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>
