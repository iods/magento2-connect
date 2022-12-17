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

namespace Iods\Connect\Api\Data\Customer;

/**
 * Interface DownloadInterface
 * @package Iods\Connect\Api\Data\Customer
 *
 * @api
 */
interface DownloadInterface
{
    /**
     * @return string
     */
    public function getOrderUrl(): string;

    /**
     * @return string
     */
    public function getDownloadUrl(): string;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getDate(): string;

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return int
     */
    public function getRemainingDownloads(): int;

    /**
     * @param string $url
     * @return null
     */
    public function setOrderUrl(string $url);

    /**
     * @param string $url
     * @return null
     */
    public function setDownloadUrl(string $url);

    /**
     * @param string $title
     * @return null
     */
    public function setTitle(string $title);

    /**
     * @param string $date
     * @return null
     */
    public function setDate(string $date);

    /**
     * @param string $status
     * @return null
     */
    public function setStatus(string $status);

    /**
     * @param int $total
     * @return null
     */
    public function setRemainingDownloads(int $total);
}