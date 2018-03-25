<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments Page</title>
</head>
<body>
<?php include "../shared_components/header.php" ?>
<?php include "./handlePage.php" ?>
<main>
    <div class="container jumbotron">
        <?php include "../shared_components/errors.php" ?>
        <form method="post">
            <input name="csrf" type="hidden" value="<?php echo $token ?>"/>
            <div class="form-group">
                <label for="comment">Leave a Comment</label>
                <?php include "../shared_components/flash.php" ?>
                <textarea class="form-control" id="comment" name="comment" placeholder="Enter comment"></textarea>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="container jumbotron">
        <h3>Comments About this Super Awesome Product</h3>
        <hr/>
        <?php foreach ($comments as $comment): ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $comment->username ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $comment->comment ?></p>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $comment->created_date ?>
                </div>
            </div>
            <hr/>
        <?php endforeach; ?>
    </div>

</main>
</body>
</html>