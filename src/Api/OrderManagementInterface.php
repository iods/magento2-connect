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

namespace Iods\Connect\Api;

interface OrderManagementInterface
{
    const PER_PAGE = 500;

    /**
     * @return mixed
     */
    public function getOrders(): mixed;

    /**
     * @param string $order_id
     * @return mixed
     */
    public function updateOrder(string $order_id): mixed;
}