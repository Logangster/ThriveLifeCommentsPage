<?php

namespace ThriveLifeCommentsPage;

require_once "../Helper.php";

session_start();
unset($_SESSION['username']);
$_SESSION['flash'] = "You have been successfully logged out.";
Helper::redirect("/");