<?php

namespace Sportic\Omniresult\Common\Parsers;

use Sportic\Omniresult\Common\Content\AbstractContent;
use Sportic\Omniresult\Common\Content\ContentFactory;
use Sportic\Omniresult\Common\Content\GenericContent;
use Sportic\Omniresult\Common\Models\AbstractModel;
use Sportic\Omniresult\Common\Scrapers\AbstractScraper;
use Sportic\Omniresult\Common\Utility\HasCallValidationTrait;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class AbstractParser
 * @package Sportic\Omniresult\Common\Parsers
 */
abstract class AbstractParser
{
    use HasCallValidationTrait;

    /**
     * @var AbstractScraper
     */
    protected $scraper;

    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * @var null|AbstractContent
     */
    protected $contents = null;

    /**
     * @return mixed
     */
    public function getContent()
    {
        if ($this->contents === null) {
            $this->initContents();
        }

        return $this->contents;
    }

    protected function initContents()
    {
        if ($this->isValidCall()) {
            $contents = $this->generateContent();
            $this->contents = ContentFactory::createFromArray($contents, $this->getContentClassName());
        } else {
            $this->contents = false;
        }
    }

    abstract protected function generateContent();

    /**
     * @return AbstractScraper
     */
    public function getScraper()
    {
        return $this->scraper;
    }

    /**
     * @param AbstractScraper $scraper
     */
    public function setScraper($scraper)
    {
        $this->scraper = $scraper;
    }

    /**
     * @return Crawler
     */
    public function getCrawler(): Crawler
    {
        return $this->crawler;
    }

    /**
     * @param Crawler $crawler
     */
    public function setCrawler(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->getContent();
    }

    /**
     * @return AbstractModel
     */
    public function getModel()
    {
        $model      = $this->getNewModel();
        $parameters = $this->getContent();
        $model->setParameters($parameters);

        return $model;
    }

    /**
     * @return AbstractModel
     */
    public function getNewModel()
    {
        $className = $this->getModelClassName();
        $model     = new $className();

        return $model;
    }

    abstract public function getModelClassName();

    /**
     * @return string
     */
    protected function getContentClassName()
    {
        return GenericContent::class;
    }
}
