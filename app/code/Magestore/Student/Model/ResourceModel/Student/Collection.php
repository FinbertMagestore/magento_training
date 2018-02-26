<?php
namespace Magestore\Student\Model\ResourceModel\Student;
/**
 * Class Staff
 * @package Magestore\Student\Model\ResourceModel\Student
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    protected $_idFieldName = 'student_id';
    public function _construct(){
        parent::_construct();
        $this->_init('Magestore\Student\Model\Student', 'Magestore\Student\Model\ResourceModel\Student');
    }
}
