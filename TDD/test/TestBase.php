<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/25
 * Time: 14:08
 */

require_once "simpletest/autorun.php";
require_once "zend_autoload.php";

class TestBase extends UnitTestCase {
    public function setUp() {
        Kint::dump("TestBase set up!");
    }

    public function tearDown() {
        Kint::dump("TestBase tear down!");
    }

    public function testLogIsTrue() {
        $this->assertTrue(true);
    }

    public function testLogIsFalse() {
        $this->assertFalse(false);
    }


}