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

namespace Iods\Connect\Lib\Developer;

use Iods\Connect\Api\ProductRepositoryInterface as ProductRepository;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Checkout\Model\Session;

class Test
{
    protected ProductRepository $_api;

    protected array $_data;

    protected bool $_parameter;

    public function __construct(
        ProductRepository $api,
        ProductRepositoryInterface $productRepository,
        ProductFactory $productFactory,
        Session $session,
        $parameter = false,
        array $data = []
    ) {
        $this->_api = $api; // Product Repository Interface (our own)
        $this->_data = $data;
        $this->_parameter = $parameter;
    }
}
