<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/10
 * Time: 20:16
 */

require_once "zend_autoload.php";
require_once "vendor/autoload.php";

class Loader {
    CONST DESTINATION_URL = "http://www.unite-students.com/liverpool";

    public static function run() {
        \Zend\Debug\Debug::dump("Hello! Let's R!O!C!K!");

        $response = Requests::get(self::DESTINATION_URL);

        phpQuery::newDocument($response->body);

        \Zend\Debug\Debug::dump(pq('title')->text());
    }

}

Loader::run();