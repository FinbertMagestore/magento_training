<?php
namespace Magestore\Student\Model\ResourceModel;
/**
 * Class Student
 * @package Magestore\Student\Model\ResourceModel
 */
class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct()	{
        $this->_init('student_student', 'student_id');
    }
}
