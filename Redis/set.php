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

Kint::dump($rc->sismember(SET_KEY, "a"));
Kint::dump($rc->sismember(SET_KEY, "d"));

$a = [1, 2, 3, 5, 6, 7, 8, 9];
$b = [5, 6, 7, 8, 9, 10, 11, 12];
const SET_A = "set-a";
const SET_B = "set-b";
$rc->sadd(SET_A, $a);
$rc->sadd(SET_B, $b);
//diff - 在a里不在b里的元素
Kint::dump($rc->sdiff(SET_A, SET_B));
//diff - 在b里不在a里的元素
Kint::dump($rc->sdiff(SET_B, SET_A));
//union a和b的并集
Kint::dump($rc->sunion(SET_A, SET_B));
//inter a和b的交集
Kint::dump($rc->sinter(SET_A, SET_B));
