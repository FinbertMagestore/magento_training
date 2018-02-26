<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 2:03 PM
 */

namespace Magestore\Student\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;

interface StudentInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param string $class
     * @return void
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getUniversity();

    /**
     * @param string $university
     * @return void
     */
    public function setUniversity($university);


}