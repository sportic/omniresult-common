<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

use Sportic\Omniresult\Common\Models\RaceCategory;

/**
 *
 */
trait HasRaceCategory
{
    protected string|RaceCategory|null $category = null;

    public function getCategory(): string|RaceCategory|null
    {
        return $this->category;
    }

    public function setCategory(string|RaceCategory|null $raceCategory): void
    {
        $this->category = $raceCategory;
    }
}
