<?php

namespace Sportic\Omniresult\Common\Content;

/**
 * Class ListContent
 * @package Sportic\Omniresult\Common\Content
 */
class ListContent extends AbstractContent
{
    protected function initialize()
    {
        $this->data['records'] = [];
        $this->data['pagination'] = [
            'current' => 1,
            'all' => 1,
            'items' => 0,
            'nextUrl' => '',
        ];
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    protected function setParameter($name, $value)
    {
        if (in_array($name, $this->keys())) {
            parent::setParameter($name, $value);
        }
    }
}
