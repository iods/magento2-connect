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

namespace Iods\Connect\Api\Data\Product;

/**
 * Interface AttributeItemInterface
 *
 */
interface OptionValueProductsInterface
{
    /**
     * @return string|null
     */
    public function getSku(): ?string;

    /**
     * @return OptionValueInterface[]
     */
    public function getAttributes(): array;


    // public function getImages(); IPFS

    /**
     * Returns the price.
     * @return PriceInterface
     */
    public function getPrice(): PriceInterface;


    public function load($options, $prod): OptionValueProductsInterface;
}