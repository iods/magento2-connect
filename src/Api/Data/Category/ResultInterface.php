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

/**
 * Interface ItemsInterface
 * @package Iods\Connect\Api\Data\Category
 * @api
 */
interface ResultInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getItems(): array;

    /**
     * @param ItemInterface[] $items
     * @return $this|void
     */
    public function setItems(array $items);
}