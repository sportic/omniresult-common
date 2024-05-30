<?php

namespace Sportic\Omniresult\Common\Utility\Traits;

/**
 *
 */
trait IteratorTrait
{
    protected int $index = 0;

    /**
     * Resets the collection.
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->index = 0;
        return reset($this->items);
    }

    /**
     * Gets current collection item.
     *
     * @return mixed Value
     */
    #[\ReturnTypeWillChange]
    public function current(): mixed
    {
        return current($this->items);
    }

    /**
     * Gets the next collection value.
     *
     * @return mixed Value
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->index++;
        return next($this->items);
    }

    /**
     * @return mixed
     */
    public function end()
    {
        $this->index = count($this->items);
        return end($this->items);
    }


    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return int|TKey|string|null
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return key($this->items);
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid(): bool
    {
        return (current($this->items) !== false);
    }
}
