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
use Magento\Framework\Api\Search\SearchCriteriaInterface;

/**
 * Interface ProductRepositoryInterface
 * The interface between product management and Models.
 * @package Iods\Connect\Api
 */
interface ProductRepositoryInterface
{
    /**
     * Product removal, delete product information in the database.
     * @param ProductInterface $product
     * @return mixed
     */
    public function delete(ProductInterface $product): mixed;

    /**
     * Returns product information using a provided ID.
     * @param int $product_id
     * @param bool $edit_mode
     * @param int|null $store_id
     * @param bool $force_reload
     * @return mixed
     */
    public function getById(int $product_id, bool $edit_mode = false, int $store_id = null, bool $force_reload = false): mixed;

    /**
     * Returns product information using a provided SKU.
     * @param string $sku
     * @param bool $edit_mode
     * @param int|null $store_id
     * @param bool $force_reload
     * @return mixed
     */
    public function getBySku(string $sku, bool $edit_mode = false, int $store_id = null, bool $force_reload = false): mixed;

    /**
     * Returns a list of products, using an optional parameter for a limit.
     * @param SearchCriteriaInterface $search_criteria
     * @param int $limit
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $search_criteria, int $limit = 10): mixed;

    /**
     * Product creation, save product information in the database.
     * @param ProductInterface $product
     * @param bool $options
     * @return mixed
     */
    public function save(ProductInterface $product, bool $options = false): mixed;
}