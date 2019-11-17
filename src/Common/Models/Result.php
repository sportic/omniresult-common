<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class Result
 * @package Sportic\Omniresult\Common\Models
 */
class Result extends AbstractModel
{
    protected $id;

    protected $posGen;
    protected $posCategory;
    protected $posGender;

    protected $bib;

    protected $fullName;
    protected $firstName;
    protected $lastName;

    protected $time;
    protected $timeGross;

    protected $category;
    protected $gender;
    protected $country;

    protected $club;

    protected $status;
    protected $notes;

    protected $href;

    /**
     * @var SplitCollection
     */
    protected $splits;

    /**
     * @inheritdoc
     */
    public function __construct($parameters = [])
    {
        $this->splits = new SplitCollection();
        parent::__construct($parameters);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPosGen()
    {
        return $this->posGen;
    }

    /**
     * @param mixed $posGen
     */
    public function setPosGen($posGen): void
    {
        $this->setPosition('posGen', $posGen);
    }

    /**
     * @return mixed
     */
    public function getPosCategory()
    {
        return $this->posCategory;
    }

    /**
     * @param mixed $posCategory
     */
    public function setPosCategory($posCategory): void
    {
        $this->setPosition('posCategory', $posCategory);
    }

    /**
     * @return mixed
     */
    public function getPosGender()
    {
        return $this->posGender;
    }

    /**
     * @param mixed $posGender
     */
    public function setPosGender($posGender): void
    {
        $this->setPosition('posGender', $posGender);
    }

    /**
     * @param $type
     * @param $value
     */
    protected function setPosition($type, $value)
    {
        $status = $this->parseStatusFromPosition($value);
        if ($status !== null) {
            $this->setStatus($status);
        } else {
            $this->{$type} = $value;
        }
    }

    /**
     * @param $value
     * @return string|null
     */
    protected function parseStatusFromPosition($value)
    {
        $value = strtolower($value);
        switch ($value) {
            case 'dns':
            case 'dnf':
            case 'hd':
            case 'ooc':
                return $value;
            case 'dsq':
            case 'dq':
                return 'disqualified';
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getBib()
    {
        return $this->bib;
    }

    /**
     * @param mixed $bib
     */
    public function setBib($bib): void
    {
        $this->bib = $bib;
    }

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
     * @param string $fullName
     */
    protected function parseNamesFromFull($fullName)
    {
        if (strpos($fullName, ',')) {
            $names = explode(',', $fullName);
        } else {
            $names = explode(' ', $fullName);
        }

        $lastName = array_pop($names);
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
    public function getLastName()
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

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $time = str_replace(',', '.', $time);
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getTimeGross()
    {
        return $this->timeGross;
    }

    /**
     * @param mixed $timeGross
     */
    public function setTimeGross($timeGross): void
    {
        $this->timeGross = $timeGross;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param mixed $href
     */
    public function setHref($href): void
    {
        $this->href = $href;
    }

    /**
     * @return SplitCollection
     */
    public function getSplits(): SplitCollection
    {
        return $this->splits;
    }

    /**
     * @param SplitCollection|array $newSplits
     */
    public function setSplits($newSplits): void
    {
        if (is_array($newSplits)) {
            $splits = new SplitCollection();
            $splits->setItems($newSplits);
        } else {
            $splits = $newSplits;
        }
        $this->splits = $splits;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club): void
    {
        $this->club = $club;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }
}
