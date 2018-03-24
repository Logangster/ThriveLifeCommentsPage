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
        $herokuUrl = getenv("HEROKU_URL");

        if ($herokuUrl)
            return $herokuUrl;
        else
            return  'http://localhost/thrivelifecommentspage';
    }
}