<?php
/**
 * Created by PhpStorm.
 * User: logan
 * Date: 3/24/2018
 * Time: 1:05 PM
 */
namespace ThriveLifeCommentsPage;

class Config
{
    // Change the last return statement to mirror your own custom environment
    public static function getBaseUrl() {
        $herokuUrl = getenv("HEROKU_URL");

        if ($herokuUrl)
            return $herokuUrl;
        else
            return  'http://localhost/thrivelifecommentspage';
    }
}