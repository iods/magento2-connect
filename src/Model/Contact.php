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

namespace Iods\Connect\Model;

use Iods\Connect\Api\Data\ContactInterface as ContactInterface;
use Magento\Framework\Model\AbstractModel;

class Contact extends AbstractModel implements ContactInterface
{
    /**
     * @return mixed
     */
    public function getName(): mixed
    {
        return $this->getData(self::NAME);
    }

    /**
     * @return mixed
     */
    public function getEmail(): mixed
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @return mixed
     */
    public function getTelephone(): mixed
    {
        return $this->getData(self::TELEPHONE);
    }

    /**
     * @return mixed
     */
    public function getComment(): mixed
    {
        return $this->getData(self::COMMENT);
    }

    /**
     * @param string $name
     * @return Contact
     */
    public function setName(string $name): Contact
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @param string $telephone
     * @return Contact
     */
    public function setTelephone(string $telephone): Contact
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    /**
     * @param string $comment
     * @return Contact
     */
    public function setComment(string $comment): Contact
    {
        return $this->setData(self::COMMENT, $comment);
    }
}