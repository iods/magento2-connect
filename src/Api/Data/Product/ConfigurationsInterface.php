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
use Magento\Framework\Api\AttributeInterface;
use Magento\Framework\Api\ExtensibleDataInterface;

interface ConfigurationsInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getSku(): string;

    /**
     * @return AttributeInterface[]|null
     */
    public function getAttributes(): ?array;

    /**
     * @param ProductInterface $product
     * @return ConfigurationsInterface
     */
    public function load(ProductInterface $product): ConfigurationsInterface;
}