<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasPositions
{
    protected $posGen;
    protected $posCategory;
    protected $posGender;

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
        $this->{$type} = intval($value);
    }
}
