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

namespace Iods\Connect\Api\Data\Product;

use Iods\Connect\Api\Data\Search\CategoryResultsInterface;
use Iods\Connect\Api\Data\Search\PageResultsInterface;
use Iods\Connect\Api\Data\Search\ProductResultsInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface as SearchResultsInterface;

interface ResultsInterface extends SearchResultsInterface
{
    /**
     * @return ProductResultsInterface[]
     */
    public function getProductItems(): array;

    /**
     * @return CategoryResultsInterface[]
     */
    public function getCategoryItems(): array;

    /**
     * @return PageResultsInterface[]
     */
    public function getPageItems(): array;

    /**
     * @return ProductInterface[]
     */
    public function getItems(): array;

    /**
     * @return int
     */
    public function getTotalCount(): int;

    /**
     * @return SearchCriteriaInterface
     */
    public function getSearchCriteria(): SearchCriteriaInterface;

    /**
     * @param ProductResultsInterface[] $products
     * @return $this
     */
    public function setProductItems(array $products): self;

    /**
     * @param CategoryResultsInterface[] $categories
     * @return $this
     */
    public function setCategoryItems(array $categories): self;

    /**
     * @param PageResultsInterface[] $pages
     * @return $this
     */
    public function setPageItems(array $pages): self;

    /**
     * @param ProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items): static;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return $this
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria): static;

    /**
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount): static;
}