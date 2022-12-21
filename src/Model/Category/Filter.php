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

namespace Iods\Connect\Model\Category;

use Iods\Connect\Api\Data\Category\FilterAdditionalInfoPriceInterface;
use Iods\Connect\Api\Data\Category\FilterInterface;
use Iods\Connect\Api\Data\Category\FilterItemInterface;
use Iods\Connect\Model\Category\Filter\AdditionalInfoPrice;
use Magento\Eav\Model\Config;
use Magento\Swatches\Helper\Data;

class Filter implements FilterInterface
{
    /** @var Data */
    private Data $_swatch_helper;

    private AdditionalInfoPrice $_additional_info;

    /** @var string */
    private string $_field_name;

    /** @var int */
    private int $_website_id;

    /** @var int */
    private int $_store_id;

    /** @var string */
    private string $_label;

    /** @var FilterItemInterface */
    private FilterItemInterface $_item;

    /** @var FilterItemInterface[] */
    private array $_items;

    /**c@var int */
    private int $_items_count;

    /** @var string */
    private string $_type;

    /** @var AdditionalInfoPrice */
    private AdditionalInfoPrice $_additional_info_price;

    /** @var Config */
    private Config $_config;

    public function __construct(
        FilterItemInterface $item,
        FilterAdditionalInfoPriceInterface $additional_info_price,
        Data $swatch_helper,
        Config $config
    ) {
        $this->_item = $item;
        $this->_additional_info_price = $additional_info_price;
        $this->_swatch_helper = $swatch_helper;
        $this->_config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getSwatchValue($id): string
    {
        $data = $this->_swatch_helper->getSwatchesByOptionsId([$id]);

        return $data[$id]['value'];
    }

    /**
     * @inheritDoc
     */
    public function getAdditionalInfo(): FilterAdditionalInfoPriceInterface
    {
        return $this->_additional_info;
    }

    /**
     * @inheritDoc
     */
    public function getFieldName(): string
    {
        return $this->_field_name;
    }

    /**
     * @inheritDoc
     */
    public function getWebsiteId(): int
    {
        return $this->_website_id;
    }

    /**
     * @inheritDoc
     */
    public function getStoreId(): int
    {
        return $this->_store_id;
    }

    /**
     * @inheritDoc
     */
    public function getLabel(): string
    {
        return $this->_label;
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return $this->_items;
    }

    /**
     * @inheritDoc
     */
    public function getItemsCount(): int
    {
        return $this->_items_count;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->_type;
    }

    /**
     * @inheritDoc
     */
    public function load($filter, $layer): FilterInterface
    {
        $this->_field_name = $filter->getRequestVar();
        $this->_label = $filter->getName();
        $this->_website_id = $filter->getWebsiteId();
        $this->_store_id = $filter->getStoreId();
        $this->_items_count = $filter->getItemsCount();

        $attribute = $filter->getData('attribute_model');
        $this->_type = !is_null($attribute) ? $attribute->getFrontendInput() : '';

        if ($this->_type == 'price') {
            $max = $layer->getProductCollection()->getMaxPrice();
            $min = $layer->getProductCollection()->getMinPrice();
            $this->_additional_info = $this->_additional_info_price->load($min, $max);
        }

        $is_swatch = false;

        if ($this->_type === 'select') {
            $attr = $this->_config->getAttribute('catalog_product', $attribute->getAttributeCode());

            $is_visual = $this->_swatch_helper->isVisualSwatch($attr);
            $is_text = $this->_swatch_helper->isTextSwatch($attr);

            if ($is_visual) {
                $this->_type = 'swatch_visual';
                $is_swatch = true;
            }

            if ($is_text) {
                $this->_type = 'swatch_text';
                $is_swatch = true;
            }
        }

        $items = [];
        foreach($filter->getItems() as $item) {
            if ($is_swatch) {
                $swatch = $this->getSwatchValue($item->getValueString());
                $items[] = clone $this->_item->load($item, $swatch);
            } else {
                $items[] = clone $this->_item->load($item, '');
            }
        }
        $this->_items = $items;

        return $this;
    }
}