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
            'all'     => 1,
            'items'   => 0,
            'nextUrl'   => '',
        ];
    }
}
