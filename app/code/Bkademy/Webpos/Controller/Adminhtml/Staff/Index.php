<?php
namespace Bkademy\Webpos\Controller\Adminhtml\Staff;

class Index extends \Bkademy\Webpos\Controller\Adminhtml\Staff
{
    /**
     * Staffs data grid
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('Staff Management'));
        return $resultPage;
    }
}
