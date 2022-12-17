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

interface PhpInterface
{
    const PRIVILEGE_PRIVATE = 'private';
    const PRIVILEGE_PROTECTED = 'protected';
    const PRIVILEGE_PUBLIC = 'public';
    const PRIVILEGE_CONSTANT = 'const';

    public function getFilename(): string;

    public function getDirectories(): array;

    public function getModule(): mixed;

    public function getNamespace(): string;

    public function getClassImports(): array;

    public function getClassname(): string;

    public function getClassExtends(): string;

    public function getClassImplements(): array;

    public function getProperties(): array;

    public function getMethods(): array;

    public function getInstance($prefix = false);

    public function setDirectories(array $directories): self;

    public function setModule(string $module_name): self;

    public function setClassImports(array $class_imports): self;

    public function setClassName(string $name): self;

    public function setClassExtends(string $class_extends): self;

    public function setClassImplements(array $class_implements): self;

    public function setProperties(array $class_properties): self;

    public function setMethods(array $class_methods): self;

    public function hasProperties(): bool;

    public function hasMethods(): bool;

    public function addProperty(string $property, $privilege = self::PRIVILEGE_PRIVATE): mixed;

    public function addMethod(string $method, $privilege = self::PRIVILEGE_PROTECTED, array $params = [], array $data = []): mixed;
}