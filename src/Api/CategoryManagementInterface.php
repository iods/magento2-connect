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

interface CategoryManagementInterface
{
    const PER_PAGE = 500;

    /**
     * @param array $values
     * @param string $field
     * @return mixed
     */
    public function getList(array $values, string $field = 'entity_id'): mixed;

    /**
     * Method for a GET request with the Categories API.
     * @return mixed
     */
    public function getCategories(): mixed;

    /**
     * @param string|null $category_id
     * @return mixed
     */
    public function save(string $category_id = null): mixed;
}