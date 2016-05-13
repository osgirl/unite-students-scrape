<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/13
 * Time: 14:54
 */

require_once "zend_autoload.php";
require_once dirname(__DIR__) . '/vendor/autoload.php';

$redisClient = new Predis\Client();

$redisClient->select(0);

$redisClient->set("master", "caiknife");
