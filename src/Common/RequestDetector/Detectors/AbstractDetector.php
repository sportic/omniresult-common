<?php

namespace Sportic\Omniresult\Common\RequestDetector\Detectors;

use Sportic\Omniresult\Common\RequestDetector\DetectorResult;

/**
 * Class AbstractDetector
 * @package Sportic\Omniresult\Common\RequestDetector\Detectors
 */
abstract class AbstractDetector
{
    protected $result = null;


    /**
     * @return DetectorResult
     */
    public function investigate()
    {
        $this->doInvestigation();
        return $this->getResult();
    }

    protected function doInvestigation()
    {
    }

    /**
     * @return DetectorResult
     */
    public function getResult(): DetectorResult
    {
        if ($this->result === null) {
            $this->result = new DetectorResult();
        }
        return $this->result;
    }
}
