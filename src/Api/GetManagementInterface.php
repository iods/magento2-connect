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
 * Interface GetManagementInterface
 * @package Iods\Connect\Api
 *
 * @api
 */
interface GetManagementInterface
{
    /**
     * Returns various product configurations using GET.
     * @param string $sku
     * @return mixed
     */
    public function getProductConfigurations(string $sku): mixed;

    /**
     * Returns New, Best Selling, Most Viewed, etc. using GET.
     * @param string $period
     * @param string $type
     * @return mixed
     */
    public function getProductHistory(string $period, string $type): mixed;

    /**
     * Returns the minimum order amount.
     * @return mixed
     */
    public function getMinimumOrderAmount(): mixed;

    /**
     * @param string $sku
     * @return \Magento\Catalog\Api\Data\ProductInterface
     */
    public function getProductParent(string $sku): \Magento\Catalog\Api\Data\ProductInterface;
}