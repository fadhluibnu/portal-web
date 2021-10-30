<?php
session_start();
session_unset();
session_destroy();
setcookie('idp', 'salah', 0);
setcookie('keyp', 'salah', 0);

if (!isset($_SESSION['masuk'])) {
    header("Location: session/");
    exit;
}
