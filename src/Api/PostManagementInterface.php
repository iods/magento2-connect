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

/**
 * Interface PostManagementInterface
 * @package Iods\Connect\Api
 *
 * @api
 */
interface PostManagementInterface
{
    /**
     * Creates a new customer address.
     * @param string $customer_id
     * @param mixed $address
     * @return mixed
     */
    public function createAddress(string $customer_id, mixed $address): mixed;
}