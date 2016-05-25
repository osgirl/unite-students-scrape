<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/25
 * Time: 14:08
 */

require_once "simpletest/autorun.php";

class TestBase extends UnitTestCase {
    public function setUp() {
        //Kint::dump("TestBase set up!");
    }

    public function tearDown() {
        //Kint::dump("TestBase tear down!");
    }

    public function testIsTrue() {
        $this->assertTrue(true, "This should be true.");
    }

    public function testIsFalse() {
        $this->assertFalse(false, "This should be false.");
    }

    public function testIsPattern() {
        $this->assertPattern('/^test.*\.php$/i', "TestBase.php");
    }

}