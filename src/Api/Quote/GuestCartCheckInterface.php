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

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface GuestCartCheckInterface
 * Manages the validation of a Guest Cart through a Cart ID.
 * @package Iods\Connect\Api\Quote
 * @api
 */
interface GuestCartCheckInterface
{
    /**
     * Returns true or false if a Guest Cart ID is still available or not.
     * @param string $cart_id ID of the Guest Cart to check.
     * @return bool
     * @throws NoSuchEntityException The specified Cart ID does not exist.
     */
    public function isValid(string $cart_id): bool;
}