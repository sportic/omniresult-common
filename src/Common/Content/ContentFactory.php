<?php

namespace Sportic\Omniresult\Common\Content;

/**
 * Class ContentFactory
 * @package Sportic\Omniresult\Common\Content
 */
class ContentFactory
{

    /**
     * @param $array
     * @param string $class
     *
     * @return AbstractContent
     */
    public static function createFromArray($array, $class = GenericContent::class)
    {
        $content = new $class($array);
        return $content;
    }
}