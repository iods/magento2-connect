<?php
/**
 * Special handling of different core APIs for testing services in Magento 2.
 *
 * @package   Iods\Connect
 * @author    Rye Miller <rye@drkstr.dev>
 * @copyright Copyright (c) 2022, Rye Miller (https://ryemiller.io)
 * @license   See LICENSE for license details.
 */
declare(strict_types=1);

namespace Iods\Connect\Model\Category\Filter;

use Iods\Connect\Api\Data\Category\FilterAdditionalInfoPriceInterface;

/**
 * Class AdditionalInfoPrice
 * @package Iods\Connect\Model\Category\Filter
 * @api
 */
class AdditionalInfoPrice implements FilterAdditionalInfoPriceInterface
{
    /** @var int */
    private int $_min_price;

    /** @var int */
    private int $_max_price;

    /**
     * @inheritDoc
     */
    public function getMinPrice(): int
    {
        return $this->_min_price;
    }

    /**
     * @inheritDoc
     */
    public function getMaxPrice(): int
    {
        return $this->_max_price;
    }

    /**
     * @inheritDoc
     */
    public function setMinPrice(int $min_price)
    {
        $this->_min_price = $min_price;
    }

    /**
     * @inheritDoc
     */
    public function setMaxPrice(int $max_price)
    {
        $this->_max_price = $max_price;
    }

    /**
     * @inheritDoc
     */
    public function load($min_price, $max_price): FilterAdditionalInfoPriceInterface
    {
        $this->_min_price = $min_price;
        $this->_max_price = $max_price;

        return $this;
    }
}