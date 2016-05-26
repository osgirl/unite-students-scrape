<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/5/25
 * Time: 14:17
 */

require_once "simpletest/autorun.php";

class AllTestSuite extends TestSuite {
    public function __construct() {
        parent::__construct("all tests");
        /**
         * 读取当前目录下所有的文件，如果是以test或者Test开头的文件，那么就认为它是一个TestCase
         */
        $dir = new RecursiveDirectoryIterator(__DIR__);
        foreach ($dir as $_key => $_value) {
            $file = $_value->getFileName();
            if (stripos($file, "test") === 0) {
                $this->addFile($_value->getRealPath());
            }
        }

    }
}