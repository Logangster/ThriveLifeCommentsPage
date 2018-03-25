<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 3/24/2018
 * Time: 5:36 PM
 */

namespace ThriveLifeCommentsPage\models;


use ThriveLifeCommentsPage\Helper;

class Comment
{
    public $comment;
    public $created_date;
    public $userId;
    public $username;

    public function __construct($userId, $comment)
    {
        $this->userId = $userId;
        $this->comment = $comment;
    }

    public function save()
    {
        $conn = Helper::connectToDB();
        if ($stmt = $conn->prepare("INSERT INTO comments (user_id, comment, created_date) VALUES (?, ?, NOW())")) {
            $stmt->bind_param('is', $this->userId, $this->comment);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return true;
        } else {
            return false;
        }
    }

    public static function mostRecentComments()
    {
        $conn = Helper::connectToDB();
        if ($stmt = $conn->prepare("SELECT u.id, u.username, c.comment, c.created_date FROM comments c JOIN users u on c.user_id = u.id ORDER BY created_date DESC LIMIT 5")) {
            $stmt->execute();
            $stmt->bind_result($userId, $userName, $comment, $created_date);

            $comments = [];
            while ($stmt->fetch()) {
                $comment = new Comment($userId, $comment);
                $comment->created_date = $created_date;
                $comment->username = $userName;
                $comments[] = $comment;
            }
            $stmt->close();
            $conn->close();
            return $comments;
        } else {
            return null;
        }
    }
}