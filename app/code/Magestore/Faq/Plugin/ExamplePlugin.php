<?php

namespace Magestore\Faq\Plugin;

class ExamplePlugin{
    public function beforeSetTitle(\Magestore\Faq\Controller\Index\Example $subject, $param)
    {
        $param = $param . " to ";
        echo __METHOD__ . "</br>";

        return $param;
    }

    public function afterGetTitle(\Magestore\Faq\Controller\Index\Example $subject, $result)
    {

        echo __METHOD__ . "</br>";

        return '<h1>'. $result . 'Trueplus.vn' .'</h1>';

    }

    public function aroundGetTitle(\Magestore\Faq\Controller\Index\Example $subject, callable $proceed)
    {

        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";

        return $result;
    }
}
