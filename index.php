<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require_once './autoload.php' ?>
<?php include "./shared_components/header.php" ?>

<main>
    <div class="container jumbotron">
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-danger">
                <?php echo "<p>{$_SESSION['flash']}</p>" ?>
            </div>
        <?php endif; ?>
        <h3>Welcome to the Comments Page!</h3>
        <p class="lead">Please register or login</p>
    </div>
</main>
</body>
</html>