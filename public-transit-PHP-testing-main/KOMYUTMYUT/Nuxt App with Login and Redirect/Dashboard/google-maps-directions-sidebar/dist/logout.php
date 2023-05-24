<?php

session_start();

unset($_SESSION["user_id"]);
session_destroy();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
header("Location: ../../../LOG IN PAGE/Komyut Log in page/reg_login/login_register.html");
exit;