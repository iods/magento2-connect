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

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\CustomAttributesDataInterface;

/**
 * Interface ItemInterface
 * @package Iods\Connect\Api\Data\Category
 * @api
 */
interface ItemInterface extends CustomAttributesDataInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return ProductInterface
     */
    public function getFeaturedProduct(): ProductInterface;

    /**
     * @return ItemInterface[]
     */
    public function getCategoryChildren(): array;

    /**
     * @param int $id
     * @return $this|void
     */
    public function setId(int $id);

    /**
     * @param string $name
     * @return $this|void
     */
    public function setName(string $name);

    /**
     * @param ProductInterface $product
     * @return $this|void
     */
    public function setFeaturedProduct(ProductInterface $product);

    /**
     * @param ItemInterface[] $items
     * @return $this|void
     */
    public function setCategoryChildren(array $items);
}