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

namespace Iods\Connect\Api\Data\Customer;

interface GroupInterface
{
    /**
     * @param string $cart_id
     * @param string $customer_group_id
     * @return GroupInterface
     */
    public function setGroup(string $cart_id, string $customer_group_id): GroupInterface;
}