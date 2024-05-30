<?php

namespace Sportic\Omniresult\Common\Models;

use ArrayAccess;
use Countable;
use Iterator;
use Sportic\Omniresult\Common\Helper;
use Sportic\Omniresult\Common\Utility\Traits\ArrayMethodsTrait;
use Sportic\Omniresult\Common\Utility\Traits\ArrayAccessTrait;
use Sportic\Omniresult\Common\Utility\Traits\IteratorTrait;

/**
 * Class SplitCollection
 * @package Sportic\Omniresult\Common\Models
 */
class SplitCollection implements ArrayAccess, Countable, Iterator
{
    use ArrayMethodsTrait, ArrayAccessTrait, IteratorTrait;

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * @return array
     */
    public function __toArray()
    {
        return Helper::objectToArray($this->items);
    }
}
