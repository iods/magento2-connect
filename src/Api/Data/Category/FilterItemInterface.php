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

namespace Iods\Connect\Api\Data\Category;

interface FilterItemInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @return string
     */
    public function getSwatchValue(): string;

    /**
     * @return int
     */
    public function getCount(): int;

    /**
     * @param $item
     * @param string $swatchValue
     * @return FilterItemInterface
     */
    public function load($item, string $swatchValue): FilterItemInterface;
}