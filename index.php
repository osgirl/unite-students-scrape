<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/10
 * Time: 20:16
 */

$path = get_include_path();

set_include_path(__DIR__ . PATH_SEPARATOR . $path);

require_once "zend_autoload.php";
require_once "vendor/autoload.php";

class Loader {
    CONST DESTINATION_URL = "http://www.unite-students.com/liverpool";

    public static function run() {
        Zend_Debug::dump("Hello! Let's R!O!C!K!");

//        $response = Requests::get(self::DESTINATION_URL);
//
//        phpQuery::newDocument($response->body);
//
//        Zend_Debug::dump(pq('title')->text());

        Zend_Debug::dump((new Scrape\Home(self::DESTINATION_URL))->getDestinationUrl());

    }

}

Loader::run();