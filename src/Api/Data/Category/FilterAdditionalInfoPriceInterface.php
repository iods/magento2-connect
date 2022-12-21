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

namespace Iods\Connect\Api\Data\Category;

interface FilterAdditionalInfoPriceInterface
{
    /**
     * @return int
     */
    public function getMinPrice(): int;

    /**
     * @return int
     */
    public function getMaxPrice(): int;

    /**
     * @param int $min_price
     */
    public function setMinPrice(int $min_price);

    /**
     * @param int $max_price
     */
    public function setMaxPrice(int $max_price);

    /**
     * @param $min_price
     * @param $max_price
     * @return FilterAdditionalInfoPriceInterface
     */
    public function load($min_price, $max_price): FilterAdditionalInfoPriceInterface;
}