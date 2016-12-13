<>
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
                [ <A href="{$SCRIPT_NAME}">메인 페이지로</A> ]
                {if ($is_system) }
                    <BR>
                    <BR>
                    [
                    <A href="{$SCRIPT_NAME}?type=list&action=form{$add_pageID}">회원목록</A>
                    ]
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
                                <FONT size="2">{$form.username.label}：</FONT></TD>
                            <TD width="79%">
                                {if $form.username.error }
                                    <font size="2" color="red">{$form.username.error}</font>
                                    <BR>
                                {/if}
                                {$form.username.html}</TD>
                        </TR>
                        <TR valign="top">
                            <TD nowrap align="right" width="150">
                                <FONT size="2">{$form.password.label}：</FONT></TD>
                            <TD width="79%">
                                {if $form.password.error }
                                    <font size="2" color="red">{$form.password.error}</font>
                                    <BR>
                                {/if}
                                {$form.password.html}</TD>
                        </TR>
                        <TR valign="top">
                            <TD nowrap align="right" width="150">
                                <FONT size="2">{$form.last_name.label}：</FONT></TD>
                            <TD width="79%">
                                {if $form.last_name.error }
                                    <font size="2" color="red">{$form.last_name.error}</font>
                                    <BR>
                                {/if}
                                {$form.last_name.html}</TD>
                        </TR>
                        <TR valign="top">
                            <TD nowrap align="right" width="150">
                                <FONT size="2">{$form.first_name.label}：</FONT></TD>
                            <TD width="79%">
                                {if $form.first_name.error }
                                    <font size="2" color="red">{$form.first_name.error}</font>
                                    <BR>
                                {/if}
                                {$form.first_name.html}</TD>
                        </TR>
                        <TR valign="top">
                            <TD nowrap align="right" width="150">
                                <FONT size="2">{$form.birthday.label}：</FONT></TD>
                            <TD width="79%">
                                {if $form.birthday.error }
                                    <font size="2" color="red">{$form.birthday.error}</font>
                                    <BR>
                                {/if}
                                {$form.birthday.html}</TD>
                        </TR>
                        <TR valign="top">
                            <TD nowrap align="right" width="150">
                                <FONT size="2">{$form.prefecture.label}：</FONT></TD>
                            <TD width="79%">
                                {if $form.prefecture.error }
                                    <font size="2" color="red">{$form.prefecture.error}</font>
                                    <BR>
                                {/if}
                                {$form.prefecture.html}</TD>
                        </TR>
                        <TR align="center" valign="top">
                            <TD>&nbsp; </TD>
                            <TD align="left">
                                {if ( $form.submit2.value != "" ) }
                                    {$form.submit2.html}　
                                {else}
                                    {$form.reset.html}　
                                {/if}
                                {$form.submit.html}
                                <INPUT type="hidden" name="type" value="{$type}">
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
{if ($debug_str)}
    <PRE>{$debug_str}</PRE>{/if}
</BODY>
</HTML></>