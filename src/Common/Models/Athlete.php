<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class Athlete
 * @package Sportic\Omniresult\Common\Models
 */
class Athlete extends AbstractModel
{
    use Behaviours\HasId;
    use Behaviours\HasCountry;
    use Behaviours\HasDob;
    use Behaviours\HasGender;
    use Behaviours\HasNames;
    use Behaviours\HasRaceCategory;
}
