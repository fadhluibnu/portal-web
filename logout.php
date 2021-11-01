<?php
session_start();
session_unset();
session_destroy();
setcookie('keluar', 'true');
header("Location: session/");
exit;
