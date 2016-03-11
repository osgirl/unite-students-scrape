<?php
/**
 * Created by PhpStorm.
 * User: caiknife
 * Date: 16/3/11
 * Time: 10:58
 */

namespace Scrape;

class Detail extends AbstractPage {
    protected $_roomTypes = array();

    public function findNode() {
        $lis = pq("ul.rooms__list > li.rooms__list__menu__item");

        foreach ($lis as $li) {
            $node = pq($li)['> a']->text();

            $tmp = explode("\n", trim($node));

            $roomType   = array_shift($tmp);
            $startPrice = $this->_formatPrice(array_pop($tmp));

            $this->_roomTypes[] = [
                "RoomType"   => $roomType,
                "StartPrice" => $startPrice,
            ];
        }

        return $this;
    }

    public function getRoomTypes() {
        return $this->_roomTypes;
    }

    protected function _formatPrice($price) {
        if ($price == 'sold out') {
            return $price;
        }
        return substr($price, 5);
    }
}