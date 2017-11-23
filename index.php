<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/10
 * Time: 20:16
 */

require_once "vendor/autoload.php";
require_once "zend_autoload.php";

class Loader
{
    protected static $_instance = null;

    const DESTINATION_URL = "http://www.unite-students.com/liverpool";

    const JSON_FILENAME = "result.json";

    const CSV_FILENAME = "result.csv";

    protected $_properties;

    protected $_outputJson = false;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function run()
    {
        echo "Let's make some noise...\n";

        // firstly do some work for output switch

        $opt = new Zend_Console_Getopt('f:');
        try {
            $opt->parse();
        } catch (Zend_Console_Getopt_Exception $e) {
            echo $e->getMessage();
            exit();
        }
        $fOption = $opt->getOption('f');

        if ($fOption == 'json') {
            $this->_outputJson = true;
        }

        // that's the real work...

        $home = new \Scrape\Home(self::DESTINATION_URL);

        $properties = $home->loadPage()->findNode()->getProperties();

        foreach ($properties as $i => $p) {
            $detail = new \Scrape\Detail($p['PropertyLink']);

            $properties[$i]['RoomType'] = $detail->loadPage()->findNode()->getRoomTypes();
        }

        $this->_properties = $properties;

        if ($this->_outputJson) {
            $this->_outputToJson();
        } else {
            $this->_outputToCSV();
        }

        echo "Done...\n";
    }

    protected function _outputToCSV()
    {
        $properties = [];
        foreach ($this->_properties as $p) {
            if (empty($p['RoomType'])) {
                $properties[] = [$p['PropertyName'], '', ''];
            } else {
                foreach ($p['RoomType'] as $r) {
                    $properties[] = [$p['PropertyName'], $r['RoomType'], $r['StartPrice']];
                }
            }
        }
        $fp = fopen(self::CSV_FILENAME, 'w');
        foreach ($properties as $p) {
            fputcsv($fp, $p);
        }
        fclose($fp);
    }

    protected function _outputToJson()
    {
        file_put_contents(
            self::JSON_FILENAME,
            json_encode($this->_properties, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        );
    }
}

Loader::getInstance()->run();
