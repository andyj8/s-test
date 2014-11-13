<?php

namespace Sainsburys\Scraper\Render;

class ArticleView
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $href;

    /**
     * @var string
     */
    public $size;

    /**
     * @var string
     */
    public $most_used_word;

    /**
     * @param string $title
     * @param string $href
     * @param string $size
     * @param string $most_used_word
     */
    public function __construct($title, $href, $size, $most_used_word)
    {
        $this->href = $href;
        $this->most_used_word = $most_used_word;
        $this->size = $size;
        $this->title = $title;
    }

}


