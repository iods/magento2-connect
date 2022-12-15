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

use Magento\Framework\Api\ExtensibleDataInterface;

interface OptionValueInterface extends ExtensibleDataInterface
{
    /**
     * @return array|null
     */
    public function getProducts(): ?array;

    /**
     * @return string|null
     */
    public function getStoreLabel(): ?string;

    /**
     * @return int|null
     */
    public function getValueIndex(): ?int;

    /**
     * @param mixed $attribute
     * @param string $attribute_code
     * @param $options
     * @param $data
     * @return OptionValue
     */
    public function load(mixed $attribute, string $attribute_code, $options, $data): OptionValue;
}