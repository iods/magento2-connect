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

namespace Iods\Connect\Api\Data\Order;

/**
 * Interface HistoricalInterface
 * @package Iods\Connect\Api\Data\Order
 *
 * @api
 */
interface HistoricalInterface
{
    const TABLE_NAME = 'iods_historical_orders_check';

    const ENTITY_ID = 'entity_id';

    const HAS_SENT = 'has_sent';

    /**
     * Returns the Entity ID of the order.
     * @return int
     */
    public function getEntityId(): int;

    /**
     * Returns true or false if the order has been sent or not.
     * @return bool
     */
    public function getHasSent(): bool;
}