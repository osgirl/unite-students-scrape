<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/11
 * Time: 10:59
 */

namespace Scrape;

abstract class AbstractPage {
    CONST BASE_URL = "http://www.unite-students.com";

    protected $_destinationUrl;

    protected $_body;

    protected $_title;

    public function __construct($destinationUrl) {
        $this->_destinationUrl = $destinationUrl;
    }

    public function getDestinationUrl() {
        return $this->_destinationUrl;
    }

    public function getBody() {
        return $this->_body;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function loadPage() {
        $response    = \Requests::get($this->_destinationUrl);
        \phpQuery::newDocument($response->body);
        $this->_body = $response->body;
        $this->_title = pq('title')->text();
        return $this;
    }

    abstract public function findNode();
}