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
interface AddressInterface
{
    /**
     * Returns the shipping address.
     * @return MagentoAddressInterface
     */
    public function getShippingAddress(): MagentoAddressInterface;

    /**
     * Returns the billing address.
     * @return MagentoAddressInterface
     */
    public function getBillingAddress(): MagentoAddressInterface;

    /**
     * @param MagentoAddressInterface $address
     * @return mixed
     */
    public function setShippingAddress(MagentoAddressInterface $address): mixed;

    /**
     * @param MagentoAddressInterface $address
     * @return mixed
     */
    public function setBillingAddress(MagentoAddressInterface $address): mixed;
}