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

use Iods\Connect\Api\Data\Category\FilterInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface CategoryFilterServiceInterface
 * @package Iods\Connect\Api
 * @api
 */
interface CategoryFilterServiceInterface
{
    /**
     * @param int $cat_id
     * @return FilterInterface[]
     * @throws LocalizedException
     */
    public function getCategoryFilters(int $cat_id): array;
}