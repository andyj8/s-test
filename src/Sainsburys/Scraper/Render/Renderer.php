<?php

namespace Sainsburys\Scraper\Render;

use Sainsburys\Scraper\Article;

interface Renderer
{
    /**
     * @param Article[] $articles
     * @return mixed
     */
    public function render($articles);

}
