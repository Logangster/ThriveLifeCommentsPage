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
    public $id;
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function save()
    {
        $conn = Helper::connectToDB();
        $this->password = Helper::hashPassword($this->password);

        if ($stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)")) {
            $stmt->bind_param('ss', $this->username, $this->password);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return true;
        } else {
            return false;
        }
    }

    public static function findByUsername($username)
    {
        $colId = 0;
        $colUsername = "";
        $colPassword = "";
        $conn = Helper::connectToDB();

        if ($stmt = $conn->prepare("SELECT * FROM users WHERE username = ?")) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->bind_result($colId,$colUsername, $colPassword);
            $stmt->fetch();
            $stmt->close();
            $conn->close();

            if ($colUsername != "") {
                $user = new User($colUsername, $colPassword);
                $user->id = $colId;
                return $user;
            }
            else
                return null;
        } else {
            return null;
        }
    }
}