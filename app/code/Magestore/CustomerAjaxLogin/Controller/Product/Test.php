<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 2/1/2018
 * Time: 9:00 AM
 */

namespace Magestore\CustomerAjaxLogin\Controller\Product;

class Test extends \Magento\Framework\App\Action\Action
{
    public function execute() {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}