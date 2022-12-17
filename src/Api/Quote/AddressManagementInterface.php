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

namespace Iods\Connect\Api\Quote;

use Magento\Quote\Api\Data\AddressInterface as MagentoAddressInterface;

/**
 * Interface AddressManagementInterface
 * @package Iods\Connect\Api\Quote
 *
 * @api
 */
interface AddressManagementInterface
{
    /**
     * Returns true when a provided billing and shipping address have been assigned to a cart.
     * @param string $cart_id
     * @param MagentoAddressInterface $shipping_address
     * @param MagentoAddressInterface $billing_address
     * @return bool
     */
    public function assign(string $cart_id, MagentoAddressInterface $shipping_address, MagentoAddressInterface $billing_address): bool;

    // returns the billing of a provided cart
    // returns AddressResultInterface iods
    // throws no such entity
    public function getBilling(string $cart_id);
}