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

namespace Iods\Api;

interface ConnectorManagementInterface
{
    /**
     * @return bool
     */
    public function checkActiveSession(): bool;

    /**
     * Returns connection string of successful or errored out connection.
     * @return mixed
     */
    public function testConnect(): mixed;

    /**
     * Send a test request somewhere to ensure the service is working.
     * @param string $uri
     * @param string $method
     * @param array $headers
     * @param array $data
     * @return mixed
     */
    public function call(string $uri, string $method, array $headers, array $data): mixed;
}