<?php

if (isset($_SESSION['flash'])) {

    echo <<<alert
    
    <div class="alert alert-info">
       <p>{$_SESSION['flash']}</p>
    </div>

alert;

    unset($_SESSION['flash']);
}

