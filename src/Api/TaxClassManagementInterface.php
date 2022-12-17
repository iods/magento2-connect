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

use Iods\Connect\Api\Data\TaxRateInterface;

interface TaxClassManagementInterface
{
    /**
     * @return TaxRateInterface[]
     */
    public function getAvailableRates(): array;

    /**
     * @param string $customer_id
     * @return TaxRateInterface[]
     */
    public function getAvailableRatesByCustomer(string $customer_id): array;
}
