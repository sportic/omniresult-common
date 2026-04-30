<?php

namespace Sportic\Omniresult\Common\Content;

/**
 * Class ListContent
 * @package Sportic\Omniresult\Common\Content
 */
class RecordContent extends AbstractContent
{
    public const KEY_SOURCE_URI = 'source_uri';

    protected function initialize()
    {
        $this->set('record', false);
        $this->set(self::KEY_SOURCE_URI, null);
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

    /**
     * @return mixed
     */
    public function getSourceUri()
    {
        return $this->get(self::KEY_SOURCE_URI);
    }
}
