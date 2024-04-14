<?php


namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasGender
{

    protected $gender;

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
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
                $this->gender = 'male';
                break;
            default:
                $this->gender = $gender;
        }
    }
}
