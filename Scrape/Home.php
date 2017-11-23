<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/11
 * Time: 10:57
 */

namespace Scrape;

class Home extends AbstractPage
{
    protected $_properties = array();

    public function findNode()
    {
        $ul = pq("div.listing-filter__listings > ul");

        foreach ($ul["> li"] as $li) {
            $a = pq($li)->find('h3 > a');

            $this->_properties[] = [
                "PropertyName" => $a->text(),
                "PropertyLink" => self::BASE_URL . $a->attr('href'),
            ];
        }

        return $this;
    }

    public function getProperties()
    {
        return $this->_properties;
    }
}
