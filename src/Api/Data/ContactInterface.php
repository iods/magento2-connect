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
 * Interface ContactInterface
 * @package Iods\Connect\Api\Data
 */
interface ContactInterface
{
    /*
     * Constants for keys for data array.
     * Identical to the name of the getter in snakeCase.
     */
    const NAME = 'name';
    const EMAIL = 'email';
    const TELEPHONE = 'telephone';
    const COMMENT = 'comment';

    /**
     * @return mixed
     */
    public function getName(): mixed;

    /**
     * @return mixed
     */
    public function getEmail(): mixed;

    /**
     * @return mixed
     */
    public function getTelephone(): mixed;

    /**
     * @return mixed
     */
    public function getComment(): mixed;

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name): mixed;

    /**
     * @param string $email
     * @return mixed
     */
    public function setEmail(string $email): mixed;

    /**
     * @param string $telephone
     * @return mixed
     */
    public function setTelephone(string $telephone): mixed;

    /**
     * @param string $comment
     * @return mixed
     */
    public function setComment(string $comment): mixed;
}
