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

namespace Iods\Connect\Api\Data\Category;

use Magento\Catalog\Model\Layer\FilterList;
use Magento\Catalog\Model\Layer;

interface FilterInterface
{
    /**
     * @param $id
     * @return string
     */
    public function getSwatchValue($id): string;

    /**
     * @return FilterAdditionalInfoPriceInterface
     */
    public function getAdditionalInfo(): FilterAdditionalInfoPriceInterface;

    /**
     * @return string
     */
    public function getFieldName(): string;

    /**
     * @return int
     */
    public function getWebsiteId(): int;

    /**
     * @return int
     */
    public function getStoreId(): int;

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @return FilterItemInterface[]
     */
    public function getItems(): array;

    /**
     * @return int
     */
    public function getItemsCount(): int;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param FilterList $filter
     * @param Layer $layer
     * @return FilterInterface
     */
    public function load(FilterList $filter, Layer $layer): FilterInterface;
}