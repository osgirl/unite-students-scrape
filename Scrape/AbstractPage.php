<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/11
 * Time: 10:59
 */

namespace Scrape;

abstract class AbstractPage {
    protected $_destinationUrl;

    public function __construct($destinationUrl) {
        $this->_destinationUrl = $destinationUrl;
    }

    public function getDestinationUrl() {
        return $this->_destinationUrl;
    }
}