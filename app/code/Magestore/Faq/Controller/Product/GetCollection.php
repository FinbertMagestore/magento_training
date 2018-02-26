<?php
namespace Magestore\Faq\Controller\Product;
class GetCollection extends \Magento\Framework\App\Action\Action
{
    public function execute() {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
