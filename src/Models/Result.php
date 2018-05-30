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

    protected $time;

    protected $category;
    protected $gender;

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
        parent::__construct($parameters);
        $this->splits = new SplitCollection();
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
        $this->posGen = $posGen;
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
        $this->posCategory = $posCategory;
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
        $this->posGender = $posGender;
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
        $this->time = $time;
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
        $this->gender = $gender;
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
}
