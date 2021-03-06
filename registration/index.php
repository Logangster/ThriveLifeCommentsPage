<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
</head>
<body>
<?php include "../shared_components/header.php" ?>
<main>
    <?php require "./handlePage.php" ?>

    <div class="container jumbotron">
        <h3>Registration</h3>
        <hr/>
        <?php include "../shared_components/errors.php" ?>
        <form method="post">
            <input name="csrf" type="hidden" value="<?php echo $token ?>"/>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control col-md-4" id="username" name="username" maxlength="20" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control col-md-4" id="password" name="password" maxlength="20" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
</body>
</html>