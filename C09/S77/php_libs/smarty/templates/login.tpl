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
                <FORM method="post" action="{$SCRIPT_NAME}">
                    <TABLE border="0" cellpadding="0" cellspacing="0" summary="login form" width="100">
                        <TR>
                            <TD colspan="2" bgcolor="#eeeeee"><B><FONT size="2">회원페이지:</FONT></B></TD>
                        </TR>
                        <TR>
                            <TD nowrap><FONT size="2">{$form.username.label}:</FONT></TD>
                            <TD>{$form.username.html}</TD>
                        </TR>

                        <TR>
                            <TD nowrap><FONT size="2">{$form.password.label}:</FONT></TD>
                            <TD>{$form.password.html}</TD>
                        </TR>
                        <TR>
                            <TD colspan="2">
                                <INPUT type="hidden" name="type" value="{$type}">
                                <DIV align="center">{$form.submit.html}</DIV>
                                <BR>
                                <FONT size="2" color="red">{$auth_error_mess} </FONT></TD>
                        </TR>
                    </TABLE>
                </FORM>

            </TD>
            <TD width="78%" align="left" valign="top">
                <P>회원인 경우에는 로그인하세요.</P>
                <P><a href="{$SCRIPT_NAME}?type=regist&action=form">회원이 아닌 경우에는 여기에서 가입할 수 있습니다.</a></P>
            </TD>
        </TR>
    </TABLE>
</CENTER>
{if ($debug_str)}
    <PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML>