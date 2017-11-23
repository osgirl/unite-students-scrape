<?php
/**
 * Created by PhpStorm.
 * User: carvincai
 * Date: 2016/5/26
 * Time: 11:21
 */

require_once "simpletest/autorun.php";

class TestArray extends UnitTestCase
{
    public function testArrayPush()
    {
        $a = [1, 2, 3, 4];
        $b = [1, 2, 3, 4, 5, 6, 7];
        $c = array_push($a, 5, 6, 7);

        $this->assertEqual($a, $b);
        $this->assertEqual($c, 7);
    }

    public function testArrayPop()
    {
        $a = [1, 2, 3, 4];
        $b = [1, 2, 3];
        $c = array_pop($a);

        $this->assertEqual($a, $b);
        $this->assertEqual($c, 4);
    }
}
