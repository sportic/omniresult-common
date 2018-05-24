<?php

namespace Sportic\Timing\CommonClient\Content;

/**
 * Class ContentFactory
 * @package Sportic\Timing\CommonClient\Content
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