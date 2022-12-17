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

namespace Iods\Connect\Api\Data\Search;

interface ProductResultsInterface
{
    public function getId(): int;

    public function getSku(): string;

    public function getName(): string;

    public function getCategories(): array;

    public function getPrice(): string;

    public function getSpecialPrice(): string;

    public function getSpecialPriceFrom(): string;

    public function getSpecialPriceTo(): string;

    public function getUrl(): string;

    public function getImage(): string;

    public function getTaxClassId(): int;


    public function setId(int $id): self;

    public function setSku(string $sku): self;

    public function setName(string $name): self;

    public function setCategories(array $categories): self;

    public function setPrice(string $price): self;

    public function setSpecialPrice(string $price): self;

    public function setSpecialPriceFrom(string $from_date): self;

    public function setSpecialPriceTo(string $to_date): self;

    public function setUrl(string $url): self;

    public function setImage(string $image): self;

    public function setTaxClassId(int $id): int;
}