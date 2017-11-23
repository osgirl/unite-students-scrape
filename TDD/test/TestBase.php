<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/25
 * Time: 14:08
 */

require_once "simpletest/autorun.php";

class TestBase extends UnitTestCase
{
    public function testIsTrue()
    {
        $a = 1;
        $this->assertTrue($a === 1, "This should be true.");
        $this->assertTrue(false == null);
        $this->assertTrue(false == 0);
        $this->assertTrue(false == array());
        $this->assertTrue(false == '');
    }

    public function testEmptyStringIsNotFalse()
    {
        $a = '';
        $this->assertFalse($a === null, "This should be false.");
        $this->assertFalse(false === null);
        $this->assertFalse('' == array());
    }

    public function testIsPattern()
    {
        $this->assertPattern('/^test.*\.php$/i', "TestBase.php");
    }
}
