<?php

namespace Sportic\Omniresult\Common\Models;

use Sportic\Omniresult\Common\Models\Behaviours\HasTime;

/**
 * Class Split
 * @package Sportic\Omniresult\Common\Models
 */
class Split extends AbstractModel
{
    use Behaviours\HasId;
    use Behaviours\HasName;
    use Behaviours\HasTime;
    use Behaviours\HasResult;
    use Behaviours\HasPositions;

    protected $timeFromStart;
    protected $timeOfDay;

    /**
     * @return mixed
     */
    public function getTimeFromStart()
    {
        return $this->timeFromStart;
    }

    /**
     * @return mixed
     */
    public function getTimeOfDay()
    {
        return $this->timeOfDay;
    }
}
