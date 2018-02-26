<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Api\Catalog;

/**
 * @api
 */
interface ProductRepositoryInterface extends \Magento\Catalog\Api\ProductRepositoryInterface
{
    const TYPE_ID = 'type_id';
    const NAME = 'name';
    const PRICE = 'price';
    const SPECIAL_PRICE = 'special_price';
    const SPECIAL_FROM_DATE = 'special_from_date';
    const SPECIAL_TO_DATE = 'special_to_date';
    const SKU = 'sku';
    const SHORT_DESCRIPTION = 'short_description';
    const DESCRIPTION = 'description';
    const IMAGE = 'image';
    const FINAL_PRICE = 'final_price';


    /**
     * Get product list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bkademy\Webpos\Api\Data\Catalog\ProductSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}
