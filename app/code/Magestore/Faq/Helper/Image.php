<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 10:59 AM
 */

namespace Magestore\Faq\Helper;


class Image extends \Magento\Catalog\Helper\Image
{
    /**
     * Retrieve image URL
     *
     * @return string
     */
    public function getUrl()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $requestInterface = $objectManager->get('Magento\Framework\App\RequestInterface');
        $moduleName     = $requestInterface->getModuleName();
        $controllerName = $requestInterface->getControllerName();
        $actionName     = $requestInterface->getActionName();
        $current_page = $moduleName.'_'.$controllerName.'_'.$actionName;
        // checking the current page is the checkout page.
        if ($current_page == 'checkout_index_index') {
            return "https://www.magestore.com/magento-2-tutorial/wp-content/uploads/2016/10/Best_Retail_Solution.png";
        } else {
            try {
                $this->applyScheduledActions();
                return $this->_getModel()->getUrl();
            } catch (\Exception $e) {
                return $this->getDefaultPlaceholderUrl();
            }
        }
    }
}