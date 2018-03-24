<?php

require_once "../autoload.php";

session_start();
unset($_SESSION['username']);
\Helper::redirect("/");