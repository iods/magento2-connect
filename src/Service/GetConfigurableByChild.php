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

namespace Iods\Connect\Service;

/*
 * would normally be a helper, but trying to separate services
 * into data calls and helpers just tools
 */

use Iods\Connect\Api\ConfigurableManagementInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;


class GetConfigurableByChild implements ConfigurableManagementInterface
{
    /** @var Product $_product */
    private Product $_product;

    /** @var Configurable $_configurable */
    private Configurable $_configurable;

    /** @var ProductRepositoryInterface $_product_repository */
    private ProductRepositoryInterface $_product_repository;

    /**
     * @param Product $product
     * @param Configurable $configurable
     * @param ProductRepositoryInterface $product_repository
     */
    public function __construct(
        Product $product,
        Configurable $configurable,
        ProductRepositoryInterface $product_repository
    ) {
        $this->_product = $product;
        $this->_configurable = $configurable;
        $this->_product_repository = $product_repository;
    }

    public function getParentFromChildId(int $id): array
    {
        $parent_ids = $this->_configurable->getParentIdsByChild($id);
        $list = [];
        if (!empty($parent_ids)) {
            foreach ($parent_ids as $id) {
                $list[] = $this->_product_repository->getById($id);
            }
        }
        return $list;
    }

    public function getParentFromChildSku($sku): array
    {
        $child = $this->_product->getIdBySku($sku);
        $parent_ids = $this->_configurable->getParentIdsByChild($child);
        $list = [];
        if (!empty($parent_ids)) {
            foreach ($parent_ids as $id) {
                $list[] = $this->_product_repository->getById($id);
            }
        }
        return $list;
    }
}





