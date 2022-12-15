would normally be a helper, but trying to separate services into data calls and
helpers just tools

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;

/**
* @SuppressWarnings(PHPMD.CouplingBetweenObjects)
*/
class ConfigurableManagement implements \Iods\Connect\Api\ConfigurableManagementInterface
{
/**
* @var Configurable
*/
private $configurable;
/**
* @var Product
*/
private $resourceProduct;
/**
* @var ProductRepositoryInterface
*/
private $productRepository;

/**
* ConfigurableManagement constructor.
* @param Product $resourceProduct
* @param Configurable $configurable
* @param ProductRepositoryInterface $productRepository
*/
public function __construct(
Product $resourceProduct,
Configurable $configurable,
ProductRepositoryInterface $productRepository,
){
$this->resourceProduct = $resourceProduct;
$this->configurable = $configurable;
$this->productRepository = $productRepository;
}

/**
* {@inheritdoc}
*/
public function getParentByChildId($id)
{
$parentIds = $this->configurable->getParentIdsByChild($childId);
$parentList = [];
if (!empty($parentIds)) {
foreach ($parentIds as $parentId) {
$parentList[] = $this->productRepository->getById($parentId);
}
}
return $parentList;
}
public function getParentByChildSku($sku)
{
$childId = $this->resourceProduct->getIdBySku($childSku);
$parentIds = $this->configurable->getParentIdsByChild($childId);
$parentList = [];
if (!empty($parentIds)) {
foreach ($parentIds as $parentId) {
$parentList[] = $this->productRepository->getById($parentId);
}
}
return $parentList;
}
}