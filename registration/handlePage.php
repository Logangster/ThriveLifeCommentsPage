<?php
/**
 * Created by PhpStorm.
 * User: logan
 * Date: 3/24/2018
 * Time: 11:06 AM
 */
namespace ThriveLifeCommentsPage;

require_once "../models/User.php";

use ThriveLifeCommentsPage\Models\User;

//Variables that may be used by the view
$errors = [];
$token = Helper::setCSRFToken();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $token == $_POST['csrf']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $errors[] = "Username is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (User::findByUsername($username) != null) {
        $errors[] = "Username is not unique";
    }

    //Todo: Add more field validation

    if (count($errors) === 0) {
        $user = new User($username, $password);
        if ($user->save()) {
            $_SESSION['username'] = $user->username;
            Helper::redirect("/comments");
        }
    }
}