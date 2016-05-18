<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/18
 * Time: 15:59
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Predis\Client;

$rc = new Client();
$rc->select(1);

const SET_KEY = "set-key";

$result = $rc->sadd(SET_KEY, ["a", "b", "c"]);
Kint::dump($result);

$result = $rc->scard(SET_KEY);
Kint::dump($result);

$result = $rc->smembers(SET_KEY);
Kint::dump($result);
