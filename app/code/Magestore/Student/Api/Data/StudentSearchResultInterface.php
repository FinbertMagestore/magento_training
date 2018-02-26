<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 2:22 PM
 */

namespace Magestore\Student\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;

interface StudentSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Magestore\Student\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * @param \Magestore\Student\Api\Data\StudentInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}