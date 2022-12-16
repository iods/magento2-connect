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

class Data extends \Iods\Base\Helper\Data
{
    /*
     * <config_path> is set as vendor_module for all (standard)
     */
    const MODULE_CONFIG_PATH = 'iods_connect';

    const MODULE_XML_CONFIG_PATH_SECTION = 'base';
    const MODULE_XML_CONFIG_PATH_GROUP = 'base_config'; /* update to general */

    public function getConnectConfig($code = null, $store_id = null)
    {
        $code = ($code !== '') ? '/' . $code : '';
        return $this->getConfigsValue(static::MODULE_XML_CONFIG_PATH_SECTION . '/' . static::MODULE_XML_CONFIG_PATH_GROUP . $code, $store_id);
    }
}