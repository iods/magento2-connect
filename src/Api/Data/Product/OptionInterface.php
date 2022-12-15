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

interface OptionInterface extends ExtensibleDataInterface
{
    /**
     * Returns the Attribute ID of the product option in context.
     * @return string|null
     */
    public function getAttributeId(): ?string;

    /**
     * Returns the ID of the product linked to the Attribute.
     * @return int|null
     */
    public function getProductId(): ?int;

    /**
     * Returns the Attribute Code of the product attribute in the given context.
     * @return string|null
     */
    public function getAttributeCode(): ?string;

    /**
     * Returns the ID of the product option in context.
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Returns the
     * @return string|null
     */
    public function getLabel(): ?string;

    /**
     * @return string|null
     */
    public function getStoreLabel(): ?string;

    /**
     * @return string|null
     */
    public function getFrontendLabel(): ?string;

    /**
     * Returns the sort position, or priority of the attribute.
     * @return int|null
     */
    public function getPosition(): ?int;

    /**
     * @return bool|null
     */
    public function getIsUseAsDefault(): ?bool;


    /**
     * @return OptionValueInterface[]
     */
    public function getValues(): array;
}