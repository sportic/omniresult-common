<?php

namespace Sportic\Omniresult\Common;

/**
 * Interface TimingClientInterface
 * @package Sportic\Omniresult\Common
 */
interface TimingClientInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return bool
     */
    public function supportsDetect();

    //public function result($parameters)
}
