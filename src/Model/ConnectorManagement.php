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

use Iods\Api\ConnectorManagementInterface;
use Magento\Framework\Module\ModuleList;
use Magento\Framework\Webapi\Rest\Request as RequestInterface;

// class ConnectorManagement extends SECURITY implements interface
class ConnectorManagement implements ConnectorManagementInterface
{
    protected ModuleList $_module_list;

    private RequestInterface $_request;

    public function __construct(
        ModuleList $module_list,
        RequestInterface $request
    ) {
        $this->_request = $request;
        $this->_module_list = $module_list;
    }

    public function checkActiveSession(): bool
    {
        return true;
    }

    public function call(string $uri, string $method, array $headers, array $data): mixed
    {
        return [[]];
    }

    public function testConnect(): mixed
    {
        return [[
            'success' => true,
            'message' => 'Connect successful.',
            'version' => $this->_getModuleVersion(),
        ]];
    }


    protected function _getModuleVersion()
    {
        $data = $this->_module_list->getOne(Iods_Connect::MODULE_NAME);
        if (isset($data['setup_version'])) {
            return $data['setup_version'];
        }

        return '0.1.0'; // should the xml not load.
    }
}