<?php

require_once '../autoloader.php';

session_start();
unset($_SESSION['username']);
\Helper::redirect("/");