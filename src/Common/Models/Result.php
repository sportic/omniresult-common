<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class Result
 * @package Sportic\Omniresult\Common\Models
 */
class Result extends AbstractModel
{
    use Behaviours\HasId;
    use Behaviours\HasCountry;
    use Behaviours\HasDob;
    use Behaviours\HasGender;
    use Behaviours\HasHref;
    use Behaviours\HasNames;
    use Behaviours\HasTime;
    use Behaviours\HasResult;
    use Behaviours\HasPositions {
        setPosition as setPositionTrait;
    }
    use Behaviours\HasRaceCategory;

    protected $bib;

    protected $club;

    protected $status;
    protected $notes;


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
     * @param $type
     * @param $value
     */
    protected function setPosition($type, $value)
    {
        $status = $this->parseStatusFromPosition($value);
        if ($status !== null) {
            $this->setStatus($status);
            return;
        }
        $this->setPositionTrait($type, $value);
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

    public function populateFromAthlete(Athlete $athlete)
    {
        $this->setFirstName($athlete->getFirstName());
        $this->setLastName($athlete->getLastName());
        $this->setGender($athlete->getGender());
        $this->setDob($athlete->getDob());
        $this->setCountry($athlete->getCountry());
        $this->setCategory($athlete->getCategory());
    }
}
