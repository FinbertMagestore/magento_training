<?php
namespace Magestore\Faq\Observer;

use Magento\Framework\Event\ObserverInterface;

class AnotherObserver implements ObserverInterface
{
    public function __construct()
    {
//Observer initialization code...
//You can use dependency injection to get any class this observer may need.
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $myEventData = $observer->getData('myEventData');
//Additional observer execution code...
    }
}