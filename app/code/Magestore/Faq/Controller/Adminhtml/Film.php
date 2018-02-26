<?php
namespace Magestore\Faq\Controller\Adminhtml;
/**
 * Class Film
 * @package Magestore\Faq\Controller\Adminhtml
 */
abstract class Film extends \Magento\Backend\App\Action
{
    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(\Magento\Backend\App\Action\Context $context)
    {
        parent::__construct($context);
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestore_Faq::faq_manage');
    }
}
