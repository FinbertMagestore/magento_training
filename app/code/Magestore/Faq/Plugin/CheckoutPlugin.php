<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 8:19 AM
 */

namespace Magestore\Faq\Plugin;


class CheckoutPlugin
{
    public function afterGetImage(\Magento\Checkout\Block\Cart\Item\Renderer $subject, $result)
    {
        return "http://www.demacmedia.com/wp-content/uploads/2016/05/Magento-Blog-post.jpg";
    }
}