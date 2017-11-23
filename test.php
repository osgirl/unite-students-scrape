<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/8/25
 * Time: 16:58
 */

$str = 'abcdsdf';
$dd  = mysql_escape_string($str);
var_dump($dd);
