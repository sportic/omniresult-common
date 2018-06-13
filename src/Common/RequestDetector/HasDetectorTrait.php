<?php

namespace Sportic\Omniresult\Common\RequestDetector;

use Sportic\Omniresult\Common\Exception\RuntimeException;

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
     * @param $url
     * @return DetectorResult
     */
    public function detect($url)
    {
        if (!$this->hasDetector()) {
            throw new RuntimeException(
                "Client {$this->getName()} does not support detect. 
                Client has no detector class {$this->getDetectorClassName()}
                ");
        }
        $detectorClass = $this->getDetectorClassName();
        return call_user_func($detectorClass . '::detect', $url);
    }

    /**
     * @return bool
     */
    public function hasDetector()
    {
        return $this->hasDetectorClass();
    }

    /**
     * @return bool
     */
    protected function hasDetectorClass()
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
