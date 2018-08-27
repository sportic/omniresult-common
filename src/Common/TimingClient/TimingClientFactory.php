<?php

namespace Sportic\Omniresult\Common\TimingClient;

use Sportic\Omniresult\Common\Exception\RuntimeException;
use Sportic\Omniresult\Common\TimingClientInterface;

/**
 * Class TimingClientFactory
 * @package Sportic\Omniresult\Common
 */
class TimingClientFactory
{

    /**
     * Create a new gateway instance
     *
     * @param string $class Gateway name
     * @throws RuntimeException If no such gateway is found
     * @return TimingClientInterface An object of class $class is created and returned
     */
    public static function create($class)
    {
        $class = self::getClientClassName($class);
        if (!class_exists($class)) {
            throw new RuntimeException("Class '$class' not found");
        }
        return new $class();
    }

    /**
     * Resolve a short gateway name to a full namespaced gateway class.
     *
     * @param  string $shortName The short gateway name
     * @return string  The fully namespaced gateway class name
     */
    public static function getClientClassName($shortName)
    {
        if (0 === strpos($shortName, '\\')) {
            return $shortName;
        }
        return '\\Sportic\Omniresult\\'.$shortName.'\\' . $shortName . 'Client';
    }

    /**
     * @return array
     */
    public static function getSupportedClients()
    {
        return [
            'RaceTec',
            'Trackmyrace'
        ];
    }
}
