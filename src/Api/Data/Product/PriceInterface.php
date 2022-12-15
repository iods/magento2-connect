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

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface PriceInterface
 * @TODO write description for interface.
 * @package Iods\Connect\Api\Data\ProductPriceInterface
 */
interface PriceInterface extends ExtensibleDataInterface
{
    /**
     * @return float|null
     */
    public function getPrice(): ?float;

    /**
     * Returns the price with the formatted symbol.
     * @return string|null
     */
    public function getCurrencyPrice(): ?string;

    /**
     * @return string|null
     */
    public function getCurrencySymbol(): ?string;

    /**
     * @return float|null
     */
    public function getSpecialPrice(): ?float;

    /**
     * @return string|null
     */
    public function getCurrencySpecialPrice(): ?string;

    /**
     * @param ProductInterface $product
     * @return PriceInterface
     */
    public function load(ProductInterface $product):PriceInterface;
}