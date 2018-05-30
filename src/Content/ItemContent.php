<?php

namespace Sportic\Omniresult\Common\Content;

/**
 * Class ListContent
 * @package Sportic\Omniresult\Common\Content
 */
class ItemContent extends AbstractContent
{
    protected function initialize()
    {
        $this->set('item', false);
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    protected function setParameter($name, $value)
    {
        if ($this->has($name)) {
            parent::setParameter($name, $value);
        }
    }
}
