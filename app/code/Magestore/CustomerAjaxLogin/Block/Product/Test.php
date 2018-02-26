<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 2/1/2018
 * Time: 10:31 AM
 */

namespace Magestore\CustomerAjaxLogin\Block\Product;


class Test extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data
    )
    {
        parent::__construct($context, $data);
    }

    public function getProductDefaultQty(){
        return 1;
    }

    public function getProductDefaultPrice(){
        return 1;
    }

    public function getAjaxGetProductUrl()
    {
        return $this->getUrl('customerajaxlogin/product/ajaxget');
//        return 'customerajaxlogin/product/ajaxget';
    }
}