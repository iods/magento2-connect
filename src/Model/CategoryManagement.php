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

use Exception;
use Iods\Connect\Api\CategoryManagementInterface;
use Magento\Catalog\Api\CategoryListInterface;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Event\ConfigInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Webapi\Rest\Request as RequestInterface;
use Magento\Store\Model\Store;

class CategoryManagement implements CategoryManagementInterface
{
    private CategoryListInterface $_category_list;

    private CategoryFactory $_category_factory;

    private CategoryRepositoryInterface $_category_repository;

    private SearchCriteriaBuilder $_search_criteria;

    private ConfigInterface $_config;

    private RequestInterface $_request;

    public function __construct(
        RequestInterface $request,
        CategoryListInterface $category_list,
        CategoryFactory $category_factory,
        CategoryRepositoryInterface $category_repository,
        SearchCriteriaBuilder $search_criteria,
        ConfigInterface $config
    ) {
        $this->_request = $request;
        $this->_category_list = $category_list;
        $this->_category_factory = $category_factory;
        $this->_category_repository = $category_repository;
        $this->_search_criteria = $search_criteria;
        $this->_config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getCategories(): array
    {
        $page = $this->_request->getQueryValue('page', 1);
        $limit = $this->_request->getQueryValue('limit', self::PER_PAGE);
        $this->_search_criteria->setPageSize($page);
        $list = $this->_category_list->getList($this->_search_criteria->create());

        $categories = [];

        foreach ($list->getItems() as $category) {
            $categories[] = [
                'category_website_id' => $category->getId(),
                'parent_id' => $category->getParentId(),
                'name' => $category->getName(),
            ];
        }

        return [[
            'perPage' => $limit,
            'pages' => ceil($list->getTotalCount() / $limit),
            'curPage' => $page,
            'categories' => $categories,
        ]];
    }

    /**
     * @see \Iods\Connect\Model\Category::getList()
     */
    public function getList(array $values, string $field = 'entity_id'): mixed
    {
        return $this->_category_factory->create();
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function save(string $category_id = null): array
    {
        $data = $this->_request->getBodyParams();

        $category = $this->_get($category_id);

        $category->setName($data['name']);
        $category->setStoreId(Store::DEFAULT_STORE_ID);
        $category->setUrlKey($category->formatUrlKey($data['name']));

        $this->_category_repository->save($category);

        return [[
            'success' => true,
            'category' => $category->getId(),
        ]];
    }

    /**
     * Returns a category by providing an ID else creates a new category object.
     * @param string $category_id
     * @return CategoryInterface|\Magento\Catalog\Model\Category
     * @throws NoSuchEntityException
     */
    private function _get(string $category_id): CategoryInterface | \Magento\Catalog\Model\Category
    {
        return $category_id ? $this->_category_repository->get($category_id) : $this->_category_factory->create();
    }
}