<?php

namespace Sainsburys\Scraper;

class Article
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $href;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string
     */
    private $mostUsedWord;

    /**
     * @param string $title
     * @param string $href
     */
    public function __construct($title, $href)
    {
        $this->href = $href;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @return string
     */
    public function getMostUsedWord()
    {
        return $this->mostUsedWord;
    }

    /**
     * @param string $mostUsedWord
     */
    public function setMostUsedWord($mostUsedWord)
    {
        $this->mostUsedWord = $mostUsedWord;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getSizeAsKb()
    {
        return round(($this->size / 1024), 1) . 'kb';
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

}


