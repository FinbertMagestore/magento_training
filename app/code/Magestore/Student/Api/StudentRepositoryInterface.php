<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 2:03 PM
 */

namespace Magestore\Student\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magestore\Student\Api\Data\StudentInterface;

interface StudentRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magestore\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Magestore\Student\Api\Data\StudentInterface $student
     * @return \Magestore\Student\Api\Data\StudentInterface
     */
    public function save(StudentInterface $student);

    /**
     * @param \Magestore\Student\Api\Data\StudentInterface $student
     * @return void
     */
    public function delete(StudentInterface $student);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magestore\Student\Api\Data\StudentSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}