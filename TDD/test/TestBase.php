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
    public function testLogIsTrue() {
        $this->assertTrue(true);
    }

    public function testLogIsFalse() {
        $this->assertFalse(false);
    }


}