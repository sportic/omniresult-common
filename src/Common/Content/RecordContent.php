<?php

namespace Sportic\Omniresult\Common\Content;

/**
 * Class ListContent
 * @package Sportic\Omniresult\Common\Content
 */
class RecordContent extends AbstractContent
{
    protected function initialize()
    {
        $this->set('record', false);
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
    public function getRecord()
    {
        return $this->get('record');
    }
}
