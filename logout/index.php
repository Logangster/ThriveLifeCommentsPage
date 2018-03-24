<?php

namespace ThriveLifeCommentsPage;

require_once "../Helper.php";

session_start();
unset($_SESSION['username']);
Helper::redirect("/");