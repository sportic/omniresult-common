<?php

namespace Sportic\Omniresult\Common\Models;

use ArrayAccess;
use Countable;
use Sportic\Omniresult\Common\Utility\Traits\ArrayMethodsTrait;
use Sportic\Omniresult\Common\Utility\Traits\ArrayAccessTrait;

/**
 * Class SplitCollection
 * @package Sportic\Omniresult\Common\Models
 */
class SplitCollection implements ArrayAccess, Countable
{
    use ArrayMethodsTrait, ArrayAccessTrait;
}
