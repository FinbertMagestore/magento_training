<?php
namespace Magestore\Faq\Controller\Adminhtml\Film;
/**
 * Class Index
 * @package Magestore\Faq\Controller\Adminhtml\Film
 */
class Index extends \Magestore\Faq\Controller\Adminhtml\Film
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
