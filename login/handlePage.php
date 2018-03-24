<?php
/**
 * Created by PhpStorm.
 * User: logan
 * Date: 3/24/2018
 * Time: 11:06 AM
 */

require_once "../autoload.php";

use \Models\User;

//Variables that may be used by the view
$errors = [];
$token = \Helper::setCSRFToken();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $token == $_POST['csrf']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $errors[] = "Username is required";
    } else

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (count($errors) === 0) {
        $user = User::findByUsername($username);

        if ($user == null) {
            $errors = ["Invalid username or password"];
        } else {
            if (!password_verify($password, $user->password)) {
                $errors = ["Invalid username or password"];
            } else {
                $_SESSION['username'] = $user->username;
                \Helper::redirect("/comments");
            }
        }
    }
}