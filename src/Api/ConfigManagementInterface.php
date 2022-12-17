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

interface ConfigManagementInterface
{
    /**
     * @param int $id
     * @return AbstractModel
     * @throws NoSuchEntityException
     */
    public function getById(int $id): AbstractModel;

    /**
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     * @throws NoSuchEntityException
     */
    public function getItems(SearchCriteriaInterface $criteria): SearchResultsInterface;

    /**
     * @param AbstractModel $model
     * @return int
     */
    public function save(AbstractModel $model): int;

    public function delete(AbstractModel $model): bool;

    public function deleteById(int $id): bool;
}