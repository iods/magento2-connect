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

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface OptionSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return OptionSearchResultsItemInterface[]
     */
    public function getItems(): array;

    /**
     * @return SearchCriteriaInterface
     */
    public function getSearchCriteria(): SearchCriteriaInterface;

    /**
     * @return int
     */
    public function getTotalCount(): int;

    /**
     * @param OptionSearchResultsItemInterface[] $items
     * @return $this
     */
    public function setItems(array $items): self;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return $this
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria): self;

    /**
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount): self;
}