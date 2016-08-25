<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/19
 * Time: 10:27
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Predis\Client;

$rc = new Client();
$rc->select(1);

const ZSET_KEY = "zset-key";

$data = ["a" => 3, "b" => 10, "c" => 1];
$rc->zadd(ZSET_KEY, $data);

Kint::dump($rc->zcard(ZSET_KEY));

$rc->zincrby(ZSET_KEY, 3, "c");

Kint::dump($rc->zscore(ZSET_KEY, "b"));

Kint::dump($rc->zcount(ZSET_KEY, 0, 5));

Kint::dump($rc->zrange(ZSET_KEY, 0, -1, ["withscores" => true]));
Kint::dump($rc->zrange(ZSET_KEY, 0, -1, ["limit" => [1, 1]]));

Kint::dump($rc->zrevrange(ZSET_KEY, 0, -1, ["withscores" => true]));
Kint::dump($rc->zrevrange(ZSET_KEY, 0, -1, ["limit" => [1, 1]]));

Kint::dump($rc->zrangebyscore(ZSET_KEY, 0, 100, ["withscores" => true, "limit" => [1, 1]]));
Kint::dump($rc->zrangebyscore(ZSET_KEY, 0, 100, ["limit" => [1, 1]]));

Kint::dump($rc->zrevrangebyscore(ZSET_KEY, 100, 0, ["withscores" => true, "limit" => [1, 1]]));
Kint::dump($rc->zrevrangebyscore(ZSET_KEY, 100, 0, ["limit" => [1, 1]]));
