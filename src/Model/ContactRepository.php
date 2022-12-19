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

use Iods\Connect\Api\ContactRepositoryInterface;
use Iods\Connect\Api\Data;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

class ContactRepository implements ContactRepositoryInterface
{
    private MailInterface $_mail;

    public function __construct(
        MailInterface $mail
    ) {
        $this->_mail = $mail;
    }

    /**
     * @param Data\ContactInterface $contact
     * @return mixed|void
     * @throws LocalizedException
     */
    public function save(Data\ContactInterface $contact): mixed
    {
        $this->_sendEmail($this->_validate($contact));
    }

    /**
     * @param Data\ContactInterface $contact
     * @return void
     */
    private function _sendEmail(Data\ContactInterface $contact): void
    {
        $this->_mail->send(
            $contact->getEmail(),
            ['data' => new DataObject($contact->getData())]
        );
    }

    /**
     * @param Data\ContactInterface $contact
     * @return mixed
     * @throws LocalizedException
     */
    private function _validate(Data\ContactInterface $contact): Data\ContactInterface
    {
        if (trim($contact->getName()) === '') {
            throw new LocalizedException(__('Enter the name and try again.'));
        }

        if (!str_contains($contact->getEmail(), '@')) {
            throw new LocalizedException(__('Email Address is invalid. Try Again.'));
        }

        if (trim($contact->getComment()) === '') {
            throw new LocalizedException(__('Enter the comment and try again.'));
        }

        return $contact;
    }
}