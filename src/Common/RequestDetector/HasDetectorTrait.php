<?php

namespace Sportic\Omniresult\Common\RequestDetector;

use Sportic\Omniresult\Common\Exception\RuntimeException;
use Sportic\Omniresult\Common\RequestDetector\Detectors\AbstractSourceDetector;

/**
 * Trait HasDetectorTrait
 * @package Sportic\Omniresult\Common\ClientDetector
 */
trait HasDetectorTrait
{
    /**
     * @var null|string
     */
    protected $detectorClassName = [];

    /**
     * Detects from URL
     * @param $url
     * @return DetectorResult
     */
    public function detect($url)
    {
        $detectorClass = $this->checkDetectorClass('Url');
        return call_user_func($detectorClass . '::detect', $url);
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @return DetectorResult
     */
    public function detectFromSource($crawler)
    {
        $detectorClass = $this->checkDetectorClass('Source');
        return call_user_func($detectorClass . '::detectFromSource', $crawler);
    }

    /**
     * @return bool
     */
    public function supportsDetectFromSource()
    {
        $detectorClass = $this->checkDetectorClass('Source');
        if (get_parent_class($detectorClass) == AbstractSourceDetector::class) {
            return is_callable([$detectorClass, 'detect']);
        }
        return is_callable([$detectorClass, 'detectFromSource']);
    }

    /**
     * @param string $type
     * @return string
     */
    public function checkDetectorClass($type = 'Url')
    {
        if (!$this->hasDetector($type)) {
            throw new RuntimeException(
                "Client {$this->getName()} does not support detect. 
                Client has no detector class {$this->getDetectorClassName($type)}"
            );
        }
        return $this->getDetectorClassName($type);
    }

    /**
     * @param string $type
     * @return bool
     */
    public function hasDetector($type = 'Url')
    {
        return $this->hasDetectorClass($type);
    }

    /**
     * @param string $type
     * @return bool
     */
    protected function hasDetectorClass($type = 'Url')
    {
        $class = $this->getDetectorClassName($type);
        return class_exists($class);
    }

    /**
     * @param string $type
     * @return string
     */
    public function getDetectorClassName($type = 'Url')
    {
        if (!isset($this->detectorClassName[$type])) {
            $this->detectorClassName[$type] = $this->generateDetectorClassName($type);
        }
        return $this->detectorClassName[$type];
    }

    /**
     * @param $type
     * @return string
     */
    protected function generateDetectorClassName($type)
    {
        $fullClassName = get_class($this);
        $partsClassName = explode('\\', $fullClassName);
        array_pop($partsClassName);
        $classNamespacePath = implode('\\', $partsClassName);

        $class = $classNamespacePath . '\RequestDetectors\\' . $type . 'Detector';
        if ($type && $type !== 'Url') {
            return $class;
        }
        if (class_exists($class)) {
            return $class;
        }
        return $classNamespacePath . '\RequestDetector';
    }
}
