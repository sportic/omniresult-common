<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasNames
{
    protected $fullName;
    protected $firstName;
    protected $lastName;

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
        $this->parseNamesFromFull($fullName);
    }

    /**
     * @param mixed $fullName
     */
    public function setFullNameFL($fullName): void
    {
        $this->fullName = $fullName;
        $this->parseNamesFromFull($fullName, 'fl');
    }

    /**
     * @param mixed $fullName
     */
    public function setFullNameLF($fullName): void
    {
        $this->fullName = $fullName;
        $this->parseNamesFromFull($fullName, 'lf');
    }

    /**
     * @param string $fullName
     */
    protected function parseNamesFromFull($fullName, $type = 'fl')
    {
        if (strpos($fullName, ',')) {
            $names = explode(',', $fullName);
        } else {
            $names = explode(' ', $fullName);
        }

        $lastName = $type == 'lf' ? array_shift($names) : array_pop($names);
        $firstName = implode(' ', $names);

        $this->firstName = trim($firstName);
        $this->lastName = trim($lastName);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
        $this->parseFullName();
    }

    /**
     * @return mixed
     */
    public function getLastName(): mixed
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
        $this->parseFullName();
    }

    protected function parseFullName()
    {
        $this->fullName = trim($this->firstName . ' ' . $this->lastName);
    }
}
