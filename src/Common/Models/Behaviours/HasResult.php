<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasResult
{
    protected ?string $result = null;

    /**
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param string $time
     */
    public function setResult($result): void
    {
        $this->result = (string) $result;
    }

}
