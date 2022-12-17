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

interface XmlInterface
{
    const DEFAULT_DIRECTORY = ['etc', '.'];
    const DEFAULT_XPATH = '/config';

    const TYPE_MODULE = 'module';
    const TYPE_DI = 'di';
    const TYPE_CRONTAB = 'crontab';
    const TYPE_ROUTE = 'route';

    const AREA_GLOBAL = 'global';
    const AREA_FRONTEND = 'frontend';
    const AREA_ADMINHTML = 'adminhtml';
    const AREA_CRONTAB = 'crontab';

    const DEFAULT_XSD_MODULE = '...';
    const DEFAULT_XSD_DI = '..';
    const DEFAULT_XSD_FRONTEND = '...';
    const DEFAULT_XSD_ADMINHTML = '..';
    const DEFAULT_XSD_CRONTAB = '...';
    const DEFAULT_XSD_ROUTE = '..';

    public function getFileName(): string;

    public function getDirectories(): array;

    public function getModule(): string;

    public function getXmlType(): string;

    public function getArea(): string;

    public function getDefaultDom(): string;

    public function setDirectories(array $directories): self;

    public function setModule(string $name): self;

    public function setAreaType(string $area): self;
}