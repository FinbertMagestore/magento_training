<?php
namespace Magestore\Faq\Model;
/**
 * Class Vendor
 * @package Magestore\Faq\Model
 */
class Film extends \Magento\Framework\Model\AbstractModel
{
    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceModel\Film $resource
     * @param ResourceModel\Film\Collection $resourceCollection
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magestore\Faq\Model\ResourceModel\Film $resource,
        \Magestore\Faq\Model\ResourceModel\Film\Collection $resourceCollection
    )
    {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
    }
}
