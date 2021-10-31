<?php
session_start();
session_unset();
session_destroy();
setcookie('idp', 'salah', time() - 3600);
setcookie('keyp', 'salah', time() - 3600);

if (!isset($_SESSION['masuk'])) {
    header("Location: session/");
    exit;
}
