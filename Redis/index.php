<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/13
 * Time: 14:54
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . '/vendor/autoload.php';

$rc = new Predis\Client();
$rc->select(0);

$rc->set("master", "caiknife");

Kint::dump($rc);
Kint::dump($rc->get("master"));
Kint::dump($rc->get("caiknife"));
