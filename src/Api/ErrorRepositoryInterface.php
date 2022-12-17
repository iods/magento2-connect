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
 * Interface ErrorRepositoryInterface
 * @package Iods\Connect\Api
 *
 * @api
 */
interface ErrorRepositoryInterface
{
    /**
     * @return bool
     */
    public function hasError(): bool;

    /**
     * @param string $title
     * @param string $message
     * @param string $location
     * @param bool $received
     * @param bool $sent
     * @return bool
     */
    public function throwError(string $title, string $message, string $location, bool $received = false, bool $sent = false): bool;

    /**
     * @param string $order
     * @return array|false
     */
    public function getErrors(string $order): ?array;
}