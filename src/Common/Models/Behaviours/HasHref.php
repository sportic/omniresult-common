<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasHref
{
    /**
     * @var string
     */
    protected ?string $href = null;

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref(string $href): void
    {
        $this->href = $href;
    }
}
