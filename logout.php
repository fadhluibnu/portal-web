<?php
session_start();
setcookie('portal_user', '', 1, '/');
setcookie('portal_masuk', '', 1, '/');
session_unset();
session_destroy();
header("Location: session/");
exit;
