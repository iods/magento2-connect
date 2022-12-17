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

interface ItemInterface extends  CustomAttributesDataInterface
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
     * @return ProductInterface[]
     */
    public function getFeaturedProducts(): array;

    /**
     * @return ItemInterface[]
     */
    public function getCategoryChildren(): array;

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self;

    /**
     * @param string $name
     * @return string
     */
    public function setName(string $name): string;

    /**
     * @param ProductInterface[] $products
     * @return $this
     */
    public function setFeaturedProducts(array $products): self;

    /**
     * @param ItemInterface[] $items
     * @return $this
     */
    public function setCategoryChildren(array $items): self;
}