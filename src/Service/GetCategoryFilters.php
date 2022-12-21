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

use Iods\Connect\Api\CategoryFilterServiceInterface;
use Iods\Connect\Api\Data\Category\FilterInterface;
use Magento\Catalog\Model\Layer\Category\FilterableAttributeList;
use Magento\Catalog\Model\Layer\FilterList;
use Magento\Catalog\Model\Layer\FilterListFactory;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\App\ObjectManager;

/**
 * Class GetCategoryFilters
 * @package Iods\Connect\Service
 * @api
 */
class GetCategoryFilters implements CategoryFilterServiceInterface
{
    /** @var Resolver $_resolver*/
    private Resolver $_resolver;

    /** @var FilterList $_filter_list */
    private FilterList $_filter_list;

    /** @var FilterInterface $_filter */
    private FilterInterface $_filter;

    /**
     * Class Constructor
     * @param FilterInterface $filter
     * @param FilterListFactory $filter_list_factory
     * @param Resolver $resolver
     */
    public function __construct(
        FilterInterface $filter,
        FilterListFactory $filter_list_factory,
        Resolver $resolver
    ) {
        $this->_filter = $filter;
        $this->_resolver = $resolver;
        $object_manager = ObjectManager::getInstance(); // @TODO remove this
        $filterable = $object_manager->get(FilterableAttributeList::class);
        $this->_filter_list = $filter_list_factory->create([
            'filterableAttributes' => $filterable
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryFilters(int $cat_id): array
    {
        $layer = $this->_resolver->get();

        if ($cat_id != 0) {
            $layer->setCurrentCategory($cat_id);
        }

        $filters = $this->_filter_list->getFilters($layer);

        $category_filters = [];
        foreach($filters as $filter) {
            if ($filter->getItemsCount() > 0) {
                $category_filters[] = clone $this->_filter->load($filter, $layer);
            }
        }
        return $category_filters;
    }
}