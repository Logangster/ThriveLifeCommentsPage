<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 3/24/2018
 * Time: 12:29 PM
 */

namespace ThriveLifeCommentsPage;

require_once "Config.php";

class Helper
{
    public static function redirect($relativePath)
    {
        header('Location: ' .  Config::$baseUrl . $relativePath);
    }

    public static function authenticate()
    {
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        if (!isset($_SESSION['username'])) {
            self::redirect("/login");
        }
    }

    public static function connectToDB()
    {
        if (getenv("CLEARDB_DATABASE_URL")) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $server = $url["host"];
            $username = $url["user"];
            $password = $url["pass"];
            $db = substr($url["path"], 1);
        } else {
            $server = "localhost";
            $username = "root";
            $password = "";
            $db = "commentspage";
        }
        return new \mysqli($server, $username, $password, $db);
    }

    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function setCSRFToken()
    {
        if(session_status()!= PHP_SESSION_ACTIVE) session_start();
        if (!isset($_SESSION['token'])) {
            $token = md5(uniqid(rand(), TRUE));
            $_SESSION['token'] = $token;
            $_SESSION['token_time'] = time();
        } else {
            $token = $_SESSION['token'];
        }

        return $token;
    }

}