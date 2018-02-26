<?php
/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 7:50 AM
 */

namespace Magestore\Faq\Controller\Index;


class Example extends \Magento\Framework\App\Action\Action
{

    protected $title;

    public function execute()
    {
        echo $this->setTitle('Welcome');
        echo $this->getTitle();
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
