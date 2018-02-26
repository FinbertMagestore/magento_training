<?php
namespace Magestore\Faq\Block;
class Product extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $number = $this->getRequest()->getParam('number');
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize($number); // fetching only 3 products
        return $collection;
    }
}