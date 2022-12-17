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

interface SyncManagementInterface
{
    public const DEFAULT_BATCH_SIZE = 200;

    /**
     * @param int $batch_number
     * @param array $filters
     * @return array
     */
    public function getItems(int $batch_number, array $filters = []): array;

    /**
     * @return int
     */
    public function getBatchSize(): int;

    /**
     * @return int
     */
    public function getBatchesCount(): int;

    /**
     * @param int $batch_size
     * @return mixed
     */
    public function setBatchSize(int $batch_size): mixed;

    /**
     * @param int $item_count
     * @return mixed
     */
    public function setBatchesCount(int $item_count): mixed;
}