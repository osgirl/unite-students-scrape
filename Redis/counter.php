<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/18
 * Time: 14:44
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Predis\Client;

$rc = new Client();
$rc->select(1);

const COUNTER_KEY = "counter";

$result = $rc->incr(COUNTER_KEY);
Kint::dump($result);

$result = $rc->incrby(COUNTER_KEY, rand(1, 10));
Kint::dump($result);