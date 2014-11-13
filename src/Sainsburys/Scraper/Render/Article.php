<?php

namespace Sainsburys\Scraper\Render;

class Article
{
    /**
     * @var string
     */
    public $href;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $size;

    /**
     * @var string
     */
    public $most_used_word;

    /**
     * @param string $href
     * @param string $title
     * @param string $size
     * @param string $most_used_word
     */
    public function __construct($href, $title, $size, $most_used_word)
    {
        $this->href = $href;
        $this->most_used_word = $most_used_word;
        $this->size = $size;
        $this->title = $title;
    }

}


