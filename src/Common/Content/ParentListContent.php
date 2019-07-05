<?php

namespace Sportic\Omniresult\Common\Content;

/**
 * Class ParentListContent
 * @package Sportic\Omniresult\Common\Content
 */
class ParentListContent extends AbstractContent
{
    protected function initialize()
    {
        parent::initialize();

        $this->set('record', false);
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
    public function getRecord()
    {
        return $this->get('record');
    }

    /**
     * @return mixed
     */
    public function getRecords()
    {
        return $this->get('records');
    }
}
