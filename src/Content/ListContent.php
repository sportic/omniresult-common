<?php

namespace Sportic\Timing\CommonClient\Content;

/**
 * Class ListContent
 * @package Sportic\Timing\CommonClient\Content
 */
class ListContent extends AbstractContent
{
    protected function initialize()
    {
        $this->data['items'] = [];
        $this->data['pagination'] = [
            'current' => 1,
            'all'     => 1,
            'items'   => 0,
            'nextUrl'   => '',
        ];
    }
}
