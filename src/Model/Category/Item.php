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

namespace Iods\Connect\Model\Category;

use Iods\Connect\Api\Data\Category\ItemInterface;
use Magento\Framework\Api\AbstractSimpleObject;
use Magento\Framework\Api\AttributeInterface;

/**
 * Class Item
 * @package Iods\Connect\Model\Category
 * @api
 */
class Item extends AbstractSimpleObject implements ItemInterface
{
    /** @var int */
    protected int $_id;

    /** @var string */
    protected string $_name;

    /** @var array */
    protected array $_products = [];

    /** @var array */
    protected array $_children = [];

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @inheritDoc
     */
    public function getCustomAttribute($attributeCode): mixed
    {
        return $this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getCustomAttributes()
    {
        return $this->_get(self::CUSTOM_ATTRIBUTES);
    }

    /**
     * @inheritDoc
     */
    public function getFeaturedProducts(): array
    {
        return $this->_products;
    }

    /**
     * @inheritDoc
     */
    public function getCategoryChildren(): array
    {
        return $this->_children;
    }

    /**
     * @inheritDoc
     */
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name)
    {
        $this->_name = $name;
    }

    /**
     * @inheritDoc
     */
    public function setCustomAttribute($attributeCode, $attributeValue): Item
    {
        /** @var AttributeInterface[] $attributes */
        $attributes = $this->getCustomAttributes();

        $attributes[$attributeCode] = $attributeValue;

        return $this->setCustomAttributes($attributes);
    }

    /**
     * @inheritDoc
     */
    public function setCustomAttributes(array $attributes): Item
    {
        return $this->setData(self::CUSTOM_ATTRIBUTES, $attributes);
    }

    /**
     * @inheritDoc
     */
    public function setFeaturedProducts(array $products)
    {
        $this->_products = $products;
    }

    /**
     * @inheritDoc
     */
    public function setCategoryChildren(array $items)
    {
        $this->_children = $items;
    }
}