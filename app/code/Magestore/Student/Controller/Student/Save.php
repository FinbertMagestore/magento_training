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

class Save extends \Magento\Framework\App\Action\Action
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
        $student = $this->_objectManager->get('Magestore\Student\Api\Data\StudentInterface');
        $student->setName('Finbert');
        $student->setClass('CNTT2.03');
        $student->setUniversity('DHBKHN');
        $this->studentRepository->save($student);
        echo 'Create student ' . $student->getName();
    }
}