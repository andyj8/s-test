<?php

namespace Sainsburys\Scraper\Render;

use Sainsburys\Scraper\Article;

class JsonRenderer implements Renderer
{
    /**
     * @param Article[] $articles
     * @return string
     */
    public function render($articles)
    {
        $output = array_map(function(Article $article) {
            return new ArticleView(
                $article->getTitle(),
                $article->getHref(),
                $article->getSizeAsKb(),
                $article->getMostUsedWord()
            );
        }, $articles);

        return json_encode($output, JSON_PRETTY_PRINT);
    }
}