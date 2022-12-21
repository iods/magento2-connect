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

use Iods\Connect\Api\Data\Category\FilterItemInterface;

/**
 * Class Item
 * @package Iods\Connect\Model\Category\Filter
 * @api
 */
class Item implements FilterItemInterface
{
    /** @var string */
    private string $_name;

    /** @var string */
    private string $_label;

    /** @var string */
    private string $_value;

    /** @var string */
    private string $_swatch_value;

    /** @var int */
    private int $_count;

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
    public function getLabel(): string
    {
        return $this->_label;
    }

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->_value;
    }

    /**
     * @inheritDoc
     */
    public function getSwatchValue(): string
    {
        return $this->_swatch_value;
    }

    /**
     * @inheritDoc
     */
    public function getCount(): int
    {
        return $this->_count;
    }

    /**
     * @inheritDoc
     */
    public function load($item, string $swatchValue): FilterItemInterface
    {
        $this->_label = strip_tags($item->getLabel());
        $this->_value = $item->getValueString();
        $this->_name = $item->getName();
        $this->_count = $item->getCount();
        $this->_swatch_value = $swatchValue;

        return $this;
    }
}