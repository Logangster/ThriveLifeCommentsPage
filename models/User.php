<?php
/**
 * Created by PhpStorm.
 * User: logan
 * Date: 3/24/2018
 * Time: 11:37 AM
 */

namespace ThriveLifeCommentsPage\Models;

require_once "../Helper.php";

use ThriveLifeCommentsPage\Helper;

class User
{
    public $username;
    public $password;
    private $conn;

    public function __construct($username, $password)
    {
        $this->conn = Helper::connectToDB();
        $this->username = $username;
        $this->password = $password;
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function save()
    {
        $this->password = Helper::hashPassword($this->password);
        if ($stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)")) {
            $stmt->bind_param('ss', $this->username, $this->password);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }

    public static function findByUsername($username)
    {
        $colUsername = "";
        $colPassword = "";
        $conn = Helper::connectToDB();

        if ($stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?")) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->bind_result($colUsername, $colPassword);
            $stmt->fetch();
            $stmt->close();
            $conn->close();

            if ($colUsername != "")
                return new User($colUsername, $colPassword);
            else
                return null;
        } else {
            return null;
        }
    }
}