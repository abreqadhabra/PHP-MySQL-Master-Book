{$title}
<FORM {$form.attributes}>
    <FONT size="2">{$form.username.label}:</FONT>
    {$form.username.html}<br>
    <FONT size="2">{$form.password.label}:</FONT>
    {$form.password.html}
    <INPUT type="hidden" name="type" value="{$type}">
    {$form.submit.html}
</FORM>