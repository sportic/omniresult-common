<?php


namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasDob
{

    protected ?string $dob = null;
    protected ?string $yob = null;

    public function getDob(): ?string
    {
        return $this->dob;
    }

    public function setDob(?string $dob): void
    {
        $this->dob = $dob;
    }

    public function getYob(): ?string
    {
        return $this->yob;
    }

    public function setYob(?string $yob): void
    {
        $this->yob = $yob;
    }
}
