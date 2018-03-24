<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 3/24/2018
 * Time: 1:05 PM
 */

namespace ThriveLifeCommentsPage;

class Config
{
    public static function baseUrl() {
        return getenv("HEROKU_URL") or 'http://localhost/thrivelifecommentspage'; 
    }
}