<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 2:20 PM
 */

namespace Magestore\Student\Model;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magestore\Student\Api\Data\StudentInterface;
use Magestore\Student\Api\Data\StudentSearchResultInterface;
use Magestore\Student\Api\StudentRepositoryInterface;
use Magestore\Student\Model\ResourceModel\Student\Collection as StudentCollectionFactory;
use Magestore\Student\Model\ResourceModel\Student\Collection;

class StudentRepository implements StudentRepositoryInterface
{
    /**
     * @var StudentFactory
     */
    private $studentFactory;

    /**
     * @var StudentCollectionFactory
     */
    private $studentCollectionFactory;

    public function __construct(
        StudentFactory $studentFactory,
        StudentCollectionFactory $studentCollectionFactory
    ) {
        $this->studentFactory = $studentFactory;
        $this->studentCollectionFactory = $studentCollectionFactory;
    }

    /**
     * @param int $id
     * @return \Magestore\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $student = $this->studentFactory->create();
        $student->getResource()->load($student, $id);
        if (! $student->getId()) {
            throw new NoSuchEntityException(__('Unable to find student with ID "%1"', $id));
        }
        return $student;
    }

    /**
     * @param \Magestore\Student\Api\Data\StudentInterface $student
     * @return \Magestore\Student\Api\Data\StudentInterface
     */
    public function save(StudentInterface $student)
    {
        $student->getResource()->save($student);
        return $student;
    }

    /**
     * @param \Magestore\Student\Api\Data\StudentInterface $student
     * @return void
     */
    public function delete(StudentInterface $student)
    {
        $student->getResource()->delete($student);
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magestore\Student\Api\Data\StudentSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}