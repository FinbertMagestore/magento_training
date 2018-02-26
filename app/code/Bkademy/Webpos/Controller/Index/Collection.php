<?php
/**
 * Copyright © 2016 Bkademy. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bkademy\Webpos\Controller\Index;

class Collection extends \Magento\Framework\App\Action\Action
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect(['name', 'price', 'image'])
            ->addAttributeToFilter( 'entity_id', array( 'in' => array(210,211,212) ) )
            ->setPageSize(10,1);
        $output = '';

        $productCollection->setDataToAll('price', 20);

        foreach ($productCollection as $product) {
            $output .= \Zend_Debug::dump($product->debug(), null, false);
        }
        $this->getResponse()->setBody($output);


    }
}
