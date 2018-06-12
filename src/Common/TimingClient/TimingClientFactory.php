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
     * Internal storage for all available gateways
     *
     * @var array
     */
    private $gateways;

    public function __construct()
    {
        $this->gateways = new TimingClientCollection();
    }

    /**
     * Create a new gateway instance
     *
     * @param string $class Gateway name
     * @throws RuntimeException If no such gateway is found
     * @return TimingClientInterface An object of class $class is created and returned
     */
    public function create($class)
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
     * Class names beginning with a namespace marker (\) are left intact.
     * Non-namespaced classes are expected to be in the \Omnipay namespace, e.g.:
     *
     *      \Custom\Gateway     => \Custom\Gateway
     *      \Custom_Gateway     => \Custom_Gateway
     *      Stripe              => \Omnipay\Stripe\Gateway
     *      PayPal\Express      => \Omnipay\PayPal\ExpressGateway
     *      PayPal_Express      => \Omnipay\PayPal\ExpressGateway
     *
     * @param  string $shortName The short gateway name
     * @return string  The fully namespaced gateway class name
     */
    public static function getClientClassName($shortName)
    {
        if (0 === strpos($shortName, '\\')) {
            return $shortName;
        }
        // replace underscores with namespace marker, PSR-0 style
        $shortName = str_replace('_', '\\', $shortName);
        if (false === strpos($shortName, '\\')) {
            $shortName .= '\\';
        }
        return '\\Omnipay\\' . $shortName . 'Gateway';
    }
}
