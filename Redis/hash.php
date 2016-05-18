<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/18
 * Time: 16:26
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Predis\Client;

$rc = new Client();
$rc->select(1);

const HASH_KEY = "hash-key";

$data = ["name" => "caiknife", "gender" => "male", "height" => 176];

$result = $rc->hmset(HASH_KEY, $data);
Kint::dump($result);

$result = $rc->hmget(HASH_KEY, array_keys($data));
Kint::dump($result);

$result = $rc->hgetall(HASH_KEY);
Kint::dump($result);

$result = $rc->hlen(HASH_KEY);
Kint::dump($result);

Kint::dump($rc->hkeys(HASH_KEY));

Kint::dump($rc->hvals(HASH_KEY));
