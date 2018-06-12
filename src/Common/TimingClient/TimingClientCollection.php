<?php

namespace Sportic\Omniresult\Common\TimingClient;

use ArrayIterator;
use IteratorAggregate;
use Sportic\Omniresult\Common\TimingClientInterface;

/**
 * Class TimingClientCollection
 * @package Sportic\Omniresult\Common\TimingClient
 */
class TimingClientCollection implements IteratorAggregate
{
    /**
     * @var TimingClientInterface[]
     */
    protected $items;

    /**
     * TimingClientCollection constructor.
     * @param TimingClientInterface[] $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * {@inheritDoc}
     * @param \Nip\Records\AbstractModels\Record $element
     */
    public function add($element, $key = null)
    {
        if ($key == null) {
            $this->items[] = $element;

            return;
        }
        $this->set($key, $element);
    }

    /**
     * @param string $id
     * @param mixed $value
     */
    public function set($id, $value)
    {
        $this->items[$id] = $value;
    }


    /**
     * Returns a parameter by name.
     *
     * @param string $key The key
     * @param mixed $default The default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : $default;
    }

    /**
     * @return boolean
     * @param string $key
     */
    public function has($key)
    {
        return isset($this->items[$key]) || array_key_exists($key, $this->items);
    }

    /**
     * @param $key
     * @return bool
     * @deprecated Use ->has($key) instead
     */
    public function exists($key)
    {
        return $this->has($key);
    }


    /**
     * Returns the parameters.
     *
     * @return array An array of parameters
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @return TimingClientInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param TimingClientInterface[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
