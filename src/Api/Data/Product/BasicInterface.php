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

namespace Iods\Connect\Api\Data\Product;

/**
 * Interface DefaultInterface
 * Basic Product information for simple service management.
 * @package Iods\Connect\Api\Data\Product
 * @api
 */
interface BasicInterface
{
    /**
     * Returns the product ID.
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getSku(): string;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku): self;

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self;
}
