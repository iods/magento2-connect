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

namespace Iods\Connect\Model\Product;

use Iods\Connect\Api\ConfigurableManagementInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;

class ConfigurableManagement implements ConfigurableManagementInterface
{
    /**
     * @var Configurable
     */
    private $_configurable;

    /**
     * @var ProductRepositoryInterface
     */
    private $_product_repository;

    /**
     * @var Product
     */
    private $_resource_product;

    /**
     * Class Constructor
     * @param Configurable $configurable
     * @param Product $resource_product
     * @param ProductRepositoryInterface $product_repository
     */
    public function __construct(
        Configurable $configurable,
        Product $resource_product,
        ProductRepositoryInterface $product_repository
    ) {
        $this->_configurable = $configurable;
        $this->_product_repository = $product_repository;
        $this->_resource_product = $resource_product;
    }

    public function getParentByChildId(int $id): array
    {
        $parent_ids = $this->_configurable->getParentIdsByChild($id);
        $parent_list = [];

        if (!empty($parent_ids)) {
            foreach ($parent_ids as $parent) {
                $parent_list[] = $this->_product_repository->getById($parent);
            }
        }

        return $parent_list;
    }

    public function getParentByChildSku(string $sku): array
    {
        $child_id = $this->_resource_product->getIdBySku($sku);
        $parent_ids = $this->_configurable->getParentIdsByChild($child_id);
        $parent_list = [];

        if (!empty($parent_ids)) {
            foreach ($parent_ids as $parent) {
                $parent_list[] = $this->_product_repository->getById($parent);
            }
        }

        return $parent_list;
    }
}