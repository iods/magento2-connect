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

use Iods\Connect\Api\Data\Product\OptionInterface;
use Iods\Connect\Api\Data\Product\OptionSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductsServiceInterface
{
    /**
     * @param string $sku
     * @return OptionInterface[]
     */
    public function getProductOptions(string $sku): array;

    /**
     * @param SearchCriteriaInterface $criteria
     * @return OptionSearchResultsInterface
     */
    public function getCategoriesProductsOptions(SearchCriteriaInterface $criteria): OptionSearchResultsInterface;
}

