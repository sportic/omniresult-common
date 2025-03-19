<?php


namespace Sportic\Omniresult\Common\Models\Behaviours;

use Sportic\Omniresult\Common\Dto\Gender;

/**
 *
 */
trait HasGender
{

    protected ?Gender $gender = null;

    /**
     */
    public function getGender(): ?string
    {
        return $this->gender?->value;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $gender = strtolower($gender);
        switch ($gender) {
            case 'm':
            case 'male':
                $this->gender = Gender::MALE;
                break;
            case 'f':
            case 'female':
            case 'w':
                $this->gender = Gender::FEMALE;
                break;
            default:
                $this->gender = null;
        }
    }
}
