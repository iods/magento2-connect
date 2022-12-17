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

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;

/**
 * @method save();
 */
interface TokenInterface
{
    public const ID = 'id';
    public const DEVELOPER_ID = 'developer_id';
    public const API_URI = 'api_uri';
    public const ACCESS_TOKEN = 'access_token';
    public const SECRET_TOKEN = 'secret_token';
    public const COMPANY_ID = 'company_id';
    public const EXPIRY_DATE = 'expire_date';
}