<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/17
 * Time: 11:15
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Predis\Client;

$rc = new Client();
$rc->select(1);

const LIST_KEY = "list:order";

//$rc->lpush(LIST_KEY, [1, 2, 3, 4, 5]);

Kint::dump($rc->lindex(LIST_KEY, 6));

Kint::dump($rc->lrem(LIST_KEY, 0, 5));

$result = $rc->lrange(LIST_KEY, 0, -1);
Kint::dump($result);

Kint::dump($rc->llen(LIST_KEY));
