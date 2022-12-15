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

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface as MagentoSearchResultsInterface;

interface SearchResultsInterface extends MagentoSearchResultsInterface
{
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