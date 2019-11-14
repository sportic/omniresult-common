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
        parent::initialize();

        $this->set('records', []);
        $this->set('pagination', [
            'current' => 1,
            'all' => 1,
            'items' => 0,
            'nextUrl' => '',
        ]);
    }

    /**
     * @return mixed
     */
    public function getRecords()
    {
        return $this->get('records');
    }

    /**
     * @param array $pagination
     */
    public function setPagination($pagination)
    {
        $this->set('pagination', array_merge($this->get('pagination'), $pagination));
    }

    /**
     * @return mixed
     */
    public function getPagination()
    {
        return $this->get('pagination');
    }
}
