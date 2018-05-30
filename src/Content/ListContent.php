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
        $this->set('records', []);
        $this->set('pagination', [
            'current' => 1,
            'all' => 1,
            'items' => 0,
            'nextUrl' => '',
        ]);
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

    /**
     * @return mixed
     */
    public function getRecords()
    {
        return $this->get('records');
    }
}
