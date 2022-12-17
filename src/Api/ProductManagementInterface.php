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

use Iods\Connect\Api\Data\Product\DefaultInterface;
use Magento\Framework\Controller\Result\Json;

/**
 * Interface ProductManagementInterface
 * @package Iods\Connect\Api
 */
interface ProductManagementInterface
{
    const PER_PAGE = 500;

    /**
     * @return mixed
     */
    public function getProducts(): mixed;

    /**
     * Returns a list of all top level product names
     * @return DefaultInterface[]
     */
    public function getProductNames(): array;

    /**
     * @param string|null $product_id
     * @return Json
     */
    public function save(string $product_id = null): Json;
}
