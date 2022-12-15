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

interface SimpleInterface extends ExtensibleDataInterface
{
    public function getAttributeCode(): ?string;

    public function getAttributeId(): ?int;

    public function getValue(): ?string;

    public function getValueId(): ?int;

    public function getIsSizeColor(): ?bool;

    public function getAttributeLabel(): ?string;

    public function getAttributeFrontendLabel(): ?string;

    public function getAttributeStoreLabel(): ?string;

    public function setAttributeId($attribute_id): void;

    public function setAttributeCode($attribute_code): void;

    public function setValue(): void;

    public function setValueId(): void;

    public function setIsSizeColor(): void;

    public function setAttributeLabel(): void;

    public function setAttributeFrontendLabel(): void;

    public function setAttributeStoreLabel(): void;
}