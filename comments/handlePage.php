<?php
/**
 * Created by PhpStorm.
 * User: logan
 * Date: 3/24/2018
 * Time: 11:06 AM
 */

namespace ThriveLifeCommentsPage;

use ThriveLifeCommentsPage\models\Comment;

require_once "../Helper.php";
require_once "../models/Comment.php";

Helper::authenticate();

$errors = [];
$comments = Comment::mostRecentComments();
$token = Helper::setCSRFToken();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $token == $_POST['csrf']) {
    $comment = $_POST['comment'];

    if (empty($comment)) {
        $errors[] = 'Comment field is required';
    }

    if (count($errors) === 0) {
        $userId = $_SESSION['userId'];
        echo $userId;
        $commentObject = new Comment($userId, $comment);
        $commentObject->save();
        $_SESSION['flash'] = 'Comment has been submitted.';
        Helper::redirect("/comments");
    }
}