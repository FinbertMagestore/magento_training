<?php
namespace Magestore\Student\Model;
use Magento\Framework\Model\AbstractExtensibleModel;
use Magestore\Student\Api\Data\StudentInterface;

/**
 * Class Student
 * @package Magestore\Student\Model
 */
class Student extends AbstractExtensibleModel implements StudentInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Student::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_getData('name');
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->_getData('class');
    }

    /**
     * @param string $class
     * @return void
     */
    public function setClass($class)
    {
        return $this->setData('class', $class);
    }

    /**
     * @return string
     */
    public function getUniversity()
    {
        return $this->_getData('university');
    }

    /**
     * @param string $university
     * @return void
     */
    public function setUniversity($university)
    {
        return $this->setData('university', $university);
    }
}