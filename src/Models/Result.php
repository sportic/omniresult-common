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
}
