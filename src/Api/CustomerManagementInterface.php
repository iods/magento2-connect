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
     * @param $customer_id
     * @param SearchCriteriaInterface $criteria
     * @return OrderInterface[]
     */
    public function getOrderList($customer_id, SearchCriteriaInterface $criteria): array;
}