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

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface ConfigurableManagementInterface
 */
interface ConfigurableManagementInterface
{
    /**
     * Returns the parent product by the child products ID.
     * @param  int $id
     * @return ProductInterface[]
     * @throws LocalizedException
     */
    public function getParentByChildId(int $id): array;

    /**
     * Returns the parent product by child API, using SKU.
     * @param  string $sku
     * @return ProductInterface[]
     * @throws NoSuchEntityException
     */
    public function getParentByChildSku(string $sku): array;
}