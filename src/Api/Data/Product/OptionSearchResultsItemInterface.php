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

use Magento\Framework\Api\SearchResultsInterface;

interface OptionSearchResultsItemInterface extends SearchResultsInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return string|null
     */
    public function getSku(): ?string;

    /**
     * @return int|null
     */
    public function getOptions(): ?int;

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void;

    /**
     * @param string $sku
     * @return void
     */
    public function setSku(string $sku): void;

    /**
     * @return OptionInterface[]
     */
    public function setOptions(): array;
}