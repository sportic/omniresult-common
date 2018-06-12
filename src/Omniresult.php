<?php

namespace Sportic\Omniresult;

use Sportic\Omniresult\Common\TimingClient\TimingClientFactory;

/**
 * Class Omniresult
 * @package Sportic\Omniresult
 */
class Omniresult
{
    /**
     * Internal factory storage
     *
     * @var TimingClientFactory
     */
    protected static $factory;


    /**
     * Get the gateway factory
     *
     * Creates a new empty GatewayFactory if none has been set previously.
     *
     * @return TimingClientFactory A GatewayFactory instance
     */
    public static function getFactory()
    {
        if (is_null(self::$factory)) {
            self::$factory = new TimingClientFactory;
        }
        return self::$factory;
    }

    /**
     * Set the gateway factory
     *
     * @param TimingClientFactory $factory A GatewayFactory instance
     */
    public static function setFactory(TimingClientFactory $factory = null)
    {
        self::$factory = $factory;
    }

    /**
     * Static function call router.
     *
     * All other function calls to the Omnipay class are routed to the
     * factory.  e.g. Omnipay::getSupportedGateways(1, 2, 3, 4) is routed to the
     * factory's getSupportedGateways method and passed the parameters 1, 2, 3, 4.
     *
     * Example:
     *
     * <code>
     *   // Create a gateway for the PayPal ExpressGateway
     *   $gateway = Omnipay::create('ExpressGateway');
     * </code>
     *
     * @see GatewayFactory
     *
     * @param string $method The factory method to invoke.
     * @param array $parameters Parameters passed to the factory method.
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $factory = self::getFactory();
        return call_user_func_array([$factory, $method], $parameters);
    }
}
