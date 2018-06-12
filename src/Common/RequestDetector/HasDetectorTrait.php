<?php

namespace Sportic\Omniresult\Common\RequestDetector;

/**
 * Trait HasDetectorTrait
 * @package Sportic\Omniresult\Common\ClientDetector
 */
trait HasDetectorTrait
{
    /**
     * @var null|string
     */
    protected $detectorClassName = null;

    /**
     * @var null|false|AbstractRequestDetector
     */
    protected $detector = null;

    /**
     * @param $url
     * @return DetectorResult
     */
    public function detect($url)
    {
        if (!$this->hasDetector()) {
            return new DetectorResult();
        }
        $this->getDetector()::detect($url);
    }

    /**
     * @return bool
     */
    public function hasDetector()
    {
        return $this->getDetector() instanceof AbstractRequestDetector;
    }
    /**
     * @return false|null|AbstractRequestDetector
     */
    protected function getDetector()
    {
        if ($this->detector === null) {
            $this->initDetector();
        }
        return $this->detector;
    }

    protected function initDetector()
    {
        $this->detector = $this->generateDetector();
    }

    /**
     * @return bool|AbstractRequestDetector
     */
    protected function generateDetector()
    {
        if (!$this->hasDetectorClass()) {
            return false;
        }
        $class = $this->getDetectorClassName();
        return new $class();
    }

    /**
     * @return bool
     */
    public function hasDetectorClass()
    {
        $class = $this->getDetectorClassName();
        return class_exists($class);
    }

    /**
     * @return string
     */
    public function getDetectorClassName()
    {
        if ($this->detectorClassName === null) {
            $this->detectorClassName = $this->generateDetectorClassName();
        }
        return $this->detectorClassName;
    }

    /**
     * @return string
     */
    protected function generateDetectorClassName()
    {
        $fullClassName = get_class($this);
        $partsClassName = explode('\\', $fullClassName);
        array_pop($partsClassName);
        $classNamespacePath = implode('\\', $partsClassName);

        return $classNamespacePath . '\RequestDetector';
    }
}
