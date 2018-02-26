<?php
namespace Magestore\Faq\Model\ResourceModel\Film;
/**
 * Class Staff
 * @package Magestore\Faq\Model\ResourceModel\Film
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    protected $_idFieldName = 'film_id';
    public function _construct(){
        parent::_construct();
        $this->_init('Magestore\Faq\Model\Film', 'Magestore\Faq\Model\ResourceModel\Film');
    }

}
