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

interface ConfigInterface
{
    public const ID = 'option_id';
    public const COMPANY_ID = 'company_id';
    public const STORE_ID = 'store_id';
    public const LABEL = 'label';
    public const VALUE = 'value';
}