<?php
namespace Magestore\Faq\Model\ResourceModel\Film\Grid;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
/**
 * Class Staff
 * @package Magestore\Faq\Model\ResourceModel\Film\Grid
 */
class Collection extends SearchResult
{
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->addFieldToFilter(
            'num_actor',
            array('gt' => 5)
        );
        return $this;
    }
}
