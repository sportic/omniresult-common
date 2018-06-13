<?php

namespace Sportic\Omniresult;

use Sportic\Omniresult\Common\RequestDetector\ClientDetector;
use Sportic\Omniresult\Common\RequestDetector\DetectorResult;
use Sportic\Omniresult\Common\TimingClient\TimingClientCollection;
use Sportic\Omniresult\Common\TimingClient\TimingClientFactory;
use Sportic\Omniresult\Common\TimingClientInterface;

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
     * Internal storage for all available gateways
     *
     * @var TimingClientCollection
     */
    protected static $gateways;

    /**
     * @param string $name
     * @return Common\TimingClientInterface
     */
    public static function create($name)
    {
        if (self::getCollection()->has($name)) {
            return self::getCollection()->get($name);
        }
        $factory = self::getFactory();

        $client = $factory::create($name);
        self::getCollection()->set($name, $client);

        return $client;
    }

    /**
     * @return Common\TimingClientInterface[]|TimingClientCollection
     */
    public static function all()
    {
        return self::getCollection()->all();
    }

    /**
     * @param TimingClientInterface|string $client
     * @return void
     */
    public static function register($client)
    {
        if ($client instanceof TimingClientInterface) {
            $name = $client->getName();
        } else {
            $name = $client;
            $client = self::create($name);
        }
        self::getCollection()->set($name, $client);
    }

    /**
     * @param string $url
     * @return DetectorResult
     */
    public static function detect($url)
    {
        return ClientDetector::detect($url, static::getCollection());
    }

    public static function registerAllSupportedGateways()
    {
        $clients = TimingClientFactory::getSupportedClients();
        foreach ($clients as $client) {
            static::create($client);
        }
    }

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
     * @return TimingClientCollection
     */
    public static function getCollection()
    {
        if (is_null(self::$gateways)) {
            self::$gateways = new TimingClientCollection;
        }
        return self::$gateways;
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
}
