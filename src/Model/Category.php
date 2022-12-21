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

namespace Iods\Connect\Model;

use Iods\Connect\Api\Data\CategoryInterface;
use Iods\Connect\Model\Category\Item;
use Iods\Connect\Model\Category\Result;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Category\Interceptor;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\Api\AttributeValue;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;

class Category implements CategoryInterface
{
    /** @var CollectionFactory */
    private CollectionFactory $_category_collection;

    /** @var JoinProcessorInterface */
    private JoinProcessorInterface $_join_processor;

    /** @var CategoryRepositoryInterface */
    private CategoryRepositoryInterface $_category_repository;

    /** @var ProductRepositoryInterface */
    private ProductRepositoryInterface $_product_repository;

    /**
     * @param CollectionFactory $category_collection
     * @param JoinProcessorInterface $join_processor
     * @param CategoryRepositoryInterface $category_repository
     * @param ProductRepositoryInterface $product_repository
     */
    public function __construct(
        CollectionFactory $category_collection,
        JoinProcessorInterface $join_processor,
        CategoryRepositoryInterface $category_repository,
        ProductRepositoryInterface $product_repository
    ) {
        $this->_category_collection = $category_collection;
        $this->_join_processor = $join_processor;
        $this->_category_repository = $category_repository;
        $this->_product_repository = $product_repository;
    }

    public function getList($values, $field = 'entity_id'): Result
    {
        $collection = $this->_category_collection->create();
        $this->_join_processor->process($collection);

        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter($field, ['in' => $values]);

        $items = [];
        foreach ($collection as $category) {
            $items[] = $this->_create($category);
        }

        $result = new Result();
        $result->setItems($items);

        return $result;
    }

    /**
     * @param Interceptor $category
     * @return Item
     */
    private function _create($category): Item
    {
        $item = new Item();
        $item->setId($category->getId());
        $item->setName($category->getName());

        /*
         * Featured Products
         */
        if ($featured = $category->getFeaturedProduct()) {
            try {
                $product = $this->_product_repository->get($featured);
                $item->setFeaturedProduct($product);
            } catch (\Exception $e) {
                // add logging here.
            }
        }

        /*
         * Custom Attributes
         */
        $attributes = [];
        foreach ($category->getData() as $key => $value) {
            $attribute = new AttributeValue();
            $attribute->setAttributeCode($key);
            $attribute->setValue($value);

            $attributes[] = $attribute;
        }
        $item->setCustomAttributes($attributes);

        /*
         * Category Children
         */
        if ($children = $category->getChildrenCategories()) {
            $children->addAttributeToSelect('*');

            $child_items = [];
            foreach ($children as $child) {
                $child_items[] = $this->_create($child);
            }

            $item->setCategoryChildren($child_items);
        }

        return $item;
    }
}