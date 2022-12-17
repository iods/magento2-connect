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

use Iods\Connect\Api\Data\Search\DataInterface;

interface SearchManagementInterface
{
    /**
     *
     * @param $parent_category
     * @return Data\Search\DataInterface
     */
    public function getSearchData($parent_category = null): Data\Search\DataInterface;
}