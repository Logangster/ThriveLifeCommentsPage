<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
<?php include "../shared_components/header.php" ?>
<?php require "./handlePage.php" ?>

<main>
    <div class="container jumbotron">
        <h3>Login</h3>
        <hr />
        <?php include "../shared_components/errors.php" ?>
        <?php include "../shared_components/flash.php"; ?>
        <form method="post">
            <input name="csrf" type="hidden" value="<?php echo $token ?>" />
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Not a user? Register <a href="/registration">here</a></p>
        </form>
    </div>
</main>
</body>
</html>