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

namespace Iods\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Sales\Api\Data\OrderInterface;

interface CustomerManagementInterface
{
    /**
     * Merges a guest cart with a customers logged in cart.
     * @param string $customer_id
     * @param string $guest_cart_id
     * @return bool
     */
    public function mergeCarts(string $customer_id, string $guest_cart_id): bool;

    /**
     * @param $customer_id
     * @param SearchCriteriaInterface $criteria
     * @return OrderInterface[]
     */
    public function getOrderList($customer_id, SearchCriteriaInterface $criteria): array;

    // returns DownloadInterface[]
    // returns a list of available downloads for a customer.
    public function getDownloadsList($customer_id): array;
}