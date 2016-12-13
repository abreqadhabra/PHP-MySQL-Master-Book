<?php
header("WWW-Authenticate: Basic realm=\"Member Only\"");
header("HTTP/1.0 401 Unauthorized");
?>
