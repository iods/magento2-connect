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

use Magento\Framework\Controller\Result\Json;

/**
 * Interface AttributeRepositoryInterface
 * @package Iods\Connect\Api
 */
interface AttributeRepositoryInterface
{
    const PER_PAGE = 500;

    /**
     * @return mixed
     */
    public function getAttributes(): mixed;

    /**
     * @param string|null $attribute_id
     * @return Json
     */
    public function save(string $attribute_id = null): Json;
}