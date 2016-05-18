<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/17
 * Time: 11:15
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

$rc = new Predis\Client();
$rc->select(1);

//$rc->lpush("list:order", [1, 2, 3, 4, 5]);

$result = $rc->lrange("list:order", 0, -1);

Kint::dump($result);