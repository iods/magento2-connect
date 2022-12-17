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

namespace Iods\Connect\Api\Data;

/**
 * Interface TaxInterface
 * @package Iods\Connect\Api
 *
 * @api
 */
interface TaxRateInterface
{
    /**
     * @return int
     */
    public function getRate(): int;

    /**
     * @return int
     */
    public function getTaxClassId(): int;

    /**
     * @param int $rate
     * @return $this
     */
    public function setRate(int $rate): self;

    /**
     * @param int $id
     * @return $this
     */
    public function setTaxClassId(int $id): self;
}