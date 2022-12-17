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

interface PageResultsInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getUrl(): string;

    public function setId(int $id): self;

    public function setName(string $name): self;

    public function setUrl(string $url): self;
}