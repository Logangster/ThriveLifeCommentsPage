<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['flash'])) {

    $flash = $_SESSION['flash'];
    echo <<<alert
    
    <div class="alert alert-info">
       <p>{$flash}</p>
    </div>

alert;

    unset($_SESSION['flash']);
}

