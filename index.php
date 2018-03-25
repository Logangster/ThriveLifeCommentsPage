<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments Page</title>
</head>
<body>
<?php include "./shared_components/header.php" ?>
<?php
require_once "Helper.php";
if (isset($_SESSION['username'])) \ThriveLifeCommentsPage\Helper::redirect("/comments");
?>

<main>
    <div class="container jumbotron">
        <?php include "./shared_components/flash.php"; ?>
        <h3>Welcome to the Comments Page!</h3>
        <p class="lead">Please register or login</p>
    </div>
</main>
</body>
</html>