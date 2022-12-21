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

use Exception;
use Iods\Connect\Api\AttributeRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Url;
use Magento\Catalog\Model\ResourceModel\Eav\AttributeFactory;
use Magento\Eav\Api\AttributeRepositoryInterface as MagentoAttributeRepositoryInterface;
use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Eav\Model\Entity;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Webapi\Rest\Request as RequestInterface;
use Zend_Validate_Exception;
use Zend_Validate_Regex;

class AttributeRepository implements AttributeRepositoryInterface
{
    private ObjectManagerInterface $_object_manager;

    private AttributeFactory $_attribute_factory;

    private MagentoAttributeRepositoryInterface $_attribute_repository;

    private SearchCriteriaBuilder $_search_criteria;

    private RequestInterface $_request;

    public function __construct(
        RequestInterface $request,
        AttributeFactory $attribute_factory,
        MagentoAttributeRepositoryInterface $attribute_repository,
        SearchCriteriaBuilder $search_criteria,
        ObjectManagerInterface $object_manager,
    ) {
        $this->_object_manager = $object_manager;
        $this->_attribute_factory = $attribute_factory;
        $this->_attribute_repository = $attribute_repository;
        $this->_search_criteria = $search_criteria;
        $this->_request = $request;
    }

    public function getAttributes(): array
    {
        $page = $this->_request->getQueryValue('page', 1);
        $limit = $this->_request->getQueryValue('limit', self::PER_PAGE);

        $this->_search_criteria->setPageSize($limit)->setCurrentPage($page);

        $criteria = $this->_search_criteria
            ->addFilter('frontend_label', null, 'notnull')
            ->addFilter('frontend_input',[
                'text',
                'select',
                'textarea',
                'multiselect',
                'boolean',
            ], 'in')
            ->create();

        $list = $this->_attribute_repository->getList('catalog_product', $criteria);

        $attributes = [];
        foreach ($list->getItems() as $attribute) {
            $attributes[] = [
                'characteristic_website_id' => $attribute->getId(),
                'name' => $attribute->getDefaultFrontendLabel(),
            ];
        }

        return [[
            'perPage' => $limit,
            'pages' => ceil($list->getTotalCount() / $limit),
            'curPage' => $page,
            'characteristics' => $attributes,
        ]];
    }

    public function save(string $attribute_id = null): array
    {
        $data = $this->_request->getBodyParams();

        try {
            $model = $this->_get($attribute_id);

            $attr_data = $this->_createAttributeData($data['name'], 'text');

            $model->addData($attr_data);
            $model->setEntityTypeId($this->_createEntityTypeId());
            $model->setIsUserDefined(1);
            $model->setData('iods_should_receive', false);

            $this->_attribute_repository->save($model);

            $response = [
                "success" => true,
                "attribute" => $model->getId(),
            ];
            return $response;
        } catch (Exception $e) {
            // does not arrive here, figure out why
            return [[
                "success" => false,
                "message" => $e->getMessage(),
            ]];
        }
    }

    private function _createAttributeData(string $name, mixed $type): array
    {
        return [
            'frontend_label' => [
                0 => $name,
            ],
            'frontend_input' => $type,
            'is_required' => '0',
            'update_product_preview_image' => '0',
            'use_product_image_for_swatch' => '0',
            'visual_swatch_validation' => '',
            'visual_swatch_validation_unique' => '',
            'text_swatch_validation' => '',
            'text_swatch_validation_unique' => '',
            'dropdown_attribute_validation' => '',
            'dropdown_attribute_validation_unique' => '',
            'attribute_code' => $this->_createCode($name),
            'is_global' => '0',
            'default_value_text' => '',
            'default_value_yesno' => '0',
            'default_value_date' => '',
            'default_value_textarea' => '',
            'is_unique' => '0',
            'frontend_class' => '',
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
            'is_searchable' => '0',
            'is_comparable' => '0',
            'is_used_for_promo_rules' => '0',
            'is_html_allowed_on_front' => '1',
            'is_visible_on_front' => '0',
            'used_in_product_listing' => '0',
            'used_for_sort_by' => '0',
            'source_model' => null,
            'backend_model' => null,
            'backend_type' => 'varchar',
            'is_filterable' => 0,
            'is_filterable_in_search' => 0,
            'default_value' => '',
        ];
    }

    /**
     * @param string $label
     * @return string
     * @throws Zend_Validate_Exception
     */
    private function _createCode(string $label): string
    {
        $code = substr(
            preg_replace(
                '/[^a-z_0-9]/',
                '_',
                $this->_object_manager->create(Url::class)->formatUrlKey($label)
            ),
            0,
            30
        );

        $validate = new Zend_Validate_Regex(['pattern' => '/^[a-z][a-z_0-9]{0,29}[a-z0-9]$/']);

        if (!$validate->isValid($code)) {
            $code = 'attr_' . ($code ?: substr(md5(time()), 0, 30));
        }

        return $code;
    }

    /**
     * @return mixed
     */
    private function _createEntityTypeId(): mixed
    {
        return $this->_object_manager->create(
            Entity::class
        )->setType(
            Product::ENTITY
        )->getTypeId();
    }

    private function _get(?string $attribute_id = null): AttributeInterface
    {
        return $attribute_id ? $this->_attribute_repository->get('catalog_product', $attribute_id) : $this->_attribute_factory->create();
    }
}