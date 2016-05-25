<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/25
 * Time: 14:17
 */

require_once "simpletest/autorun.php";
require_once "zend_autoload.php";

class AllTests extends TestSuite {
    public function __construct() {
        parent::__construct("all tests");
        $this->addFile("TestBase.php");
    }
}