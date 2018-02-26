<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 10:28 AM
 */

namespace Magestore\Faq\Plugin\Helper;


class Image
{
    public function afterGetUrl(\Magento\Catalog\Helper\Image $subject, $result)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $requestInterface = $objectManager->get('Magento\Framework\App\RequestInterface');
        $moduleName = $requestInterface->getModuleName();
        $controllerName = $requestInterface->getControllerName();
        $actionName = $requestInterface->getActionName();
        $current_page = $moduleName . '_' . $controllerName . '_' . $actionName;
        // we need to check, it is a checkout page
        if ($current_page == 'checkout_index_index') {
            return "https://www.magestore.com/magento-2-tutorial/wp-content/uploads/2016/10/Best_Retail_Solution.png";
        } else {
            return $result;
        }
    }
}