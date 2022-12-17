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

namespace Iods\Connect\Api;

/**
 * Interface ContactRepositoryInterface
 * @package Iods\Connect\Api
 */
interface ContactRepositoryInterface
{
    /**
     * @param Data\ContactInterface $contact
     * @return mixed
     */
    public function save(Data\ContactInterface $contact): mixed;
}
