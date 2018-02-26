<?php

/**
 * Created by PhpStorm.
 * User: Germini
 * Date: 30/1/2018
 * Time: 3:23 PM
 */
namespace Magestore\Student\Controller\Student;

use Magento\Framework\App\ResponseInterface;
use Magestore\Student\Api\StudentRepositoryInterface;

class View extends \Magento\Framework\App\Action\Action
{
    protected $studentRepository;
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        StudentRepositoryInterface $studentRepository
    )
    {
        parent::__construct($context);
        $this->studentRepository = $studentRepository;
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $student = $this->studentRepository->getById($id);
        echo $student->getName();
    }
}