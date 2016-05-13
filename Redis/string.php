<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/13
 * Time: 15:16
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

$rc = new Predis\Client();
$rc->select(1);

//$rc->multi();

//single set
$status = $rc->set("name", "caiknife");
Kint::dump($status);
Kint::dump($rc->get("name"));

// multi set
$data   = ["name" => "caizhijiang", "gender" => "male", "height" => 176];
$status = $rc->mset($data);
Kint::dump($status);
Kint::dump($rc->mget(array_keys($data)));

//$rc->exec();
