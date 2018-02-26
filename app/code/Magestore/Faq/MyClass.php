<?php
namespace Magestore\Faq;

use Magento\Framework\Event\ObserverInterface;

class MyClass
{
    /**
     * @var EventManager
     */
    private $eventManager;

    public function __construct(\Magento\Framework\Event\Manager $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function something()
    {
        $eventData = null;
// Code...
        $this->eventManager->dispatch('my_module_event_before');
// More code that sets $eventData...
        $this->eventManager->dispatch('my_module_event_after', ['myEventData' => $eventData]);
    }
}