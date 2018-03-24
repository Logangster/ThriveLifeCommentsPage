<?php

if (isset($_SESSION['flash'])) {
    
    echo <<<alert
    
    <div class="alert alert-info">
       <p>$flash</p>
    </div>

alert;

    unset($_SESSION['flash']);
}

