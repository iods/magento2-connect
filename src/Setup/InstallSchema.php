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

namespace Iods\Connect\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        /*
         * create API records table
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('iods_connect')
        )->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true
            ],
            'API Record ID'
        )->addColumn(
            'developer_id',
            Table::TYPE_TEXT,
            255,
            [],
            'Developer ID'
        )->addColumn(
            'developer_ip',
            Table::TYPE_TEXT,
            255,
            ['nullbale' => false, 'default' => ''],
            'Developer IP address'
        )->addColumn(
            'secret_token',
            Table::TYPE_SMALLINT,
            null,
            [],
            'Client Secret Token'
        )->addColumn(
            'access_token',
            Table::TYPE_TEXT,
            255,
            [],
            'Access token'
        )->addColumn(
            'api_uri',
            Table::TYPE_TEXT,
            255,
            [],
            'API URI'
        )->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            ['nullbale' => false, 'default' => 0],
            'API Status'
        )->addColumn(
            'company_id',
            Table::TYPE_TEXT,
            10,
            [],
            'Company ID'
        )->addColumn(
            'login_date',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT,
            ],
            'Login date'
        )->addColumn(
            'expire_date',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT
            ],
            'Expire date'
        )->setComment(
            'Used to store ioDS API tokens for different API calls and services'
        )->setOption('charset', 'utf8');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}