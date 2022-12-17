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

/**
 * Interface RequestManagementInterface
 * @package Iods\Connect\Api
 * @api
 */
interface RequestManagementInterface
{
    /**
     * @param string $api_url
     * @param string $store_id
     * @param string $api_key
     * @return mixed
     */
    public function setConfig(string $api_url, string $store_id, string $api_key): mixed;

    /**
     * @param string $endpoint
     * @param string $key
     * @return mixed
     */
    public function buildApiUrl(string $endpoint, string $key): mixed;
}