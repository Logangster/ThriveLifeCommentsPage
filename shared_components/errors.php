<?php if (count($errors) > 0): ?>
    <div class="alert alert-danger">
        <p>The following errors were found:</p>
        <ul>
            <?php foreach ($errors as $error) {
                echo "<li>$error</li>";
            } ?>
        </ul>
    </div>
<?php endif; ?>