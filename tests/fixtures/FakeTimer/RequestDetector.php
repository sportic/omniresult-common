<?php

namespace Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer;

use Sportic\Omniresult\Common\RequestDetector\AbstractRequestDetector;

/**
 * Class RequestDetector
 * @package Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer
 */
class RequestDetector extends AbstractRequestDetector
{
    /**
     * @inheritdoc
     */
    protected function isValidRequest()
    {
        if (in_array(
            $this->getUrlComponent('host'),
            ['www.trackmyrace.com']
        )) {
            return true;
        }
        return parent::isValidRequest();
    }

    /**
     * @return string
     */
    protected function detectAction()
    {
        return 'action';
    }

    /**
     * @return array
     */
    protected function detectParams()
    {
        return ['var' => 'value'];
    }
}
