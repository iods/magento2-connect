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

use Iods\Connect\Api\Data\Category\ResultInterface;

/**
 * Class Result
 * @package Iods\Connect\Model\Category
 * @api
 */
class Result implements ResultInterface
{
    /** @var int */
    protected int $_count = 0;

    /** @var array */
    protected array $_items = [];

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return $this->_items;
    }

    /**
     * @inheritDoc
     */
    public function setItems(array $items)
    {
        $this->_items = $items;
    }
}