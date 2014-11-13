<?php

namespace Sainsburys\Scraper;

use Sainsburys\Scraper\Parse\Parser;
use Sainsburys\Scraper\Parse\WordCounter;
use Sainsburys\Scraper\Scraper\Scraper;

class ScrapeService
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var Scraper
     */
    private $scraper;

    /**
     * @var Parser
     */
    private $parser;

    /**
     * @var WordCounter
     */
    private $wordCounter;

    /**
     * @param string $url
     * @param Scraper $scraper
     * @param Parser $parser
     * @param WordCounter $wordCounter
     */
    public function __construct($url, Scraper $scraper, Parser $parser, WordCounter $wordCounter)
    {
        $this->url = $url;
        $this->parser = $parser;
        $this->scraper = $scraper;
        $this->wordCounter = $wordCounter;
    }

    /**
     * @return Article[]
     */
    public function scrapeNews()
    {
        $html = $this->scraper->getPageContent($this->url);

        $articles = $this->parser->getArticles($html);
        foreach ($articles as $article) {
            $this->setArticleDetails($article);
        }

        return $articles;
    }

    /**
     * @param Article $article
     */
    private function setArticleDetails(Article $article)
    {
        $size = $this->scraper->getPageSize($article->getHref());
        $article->setSize($size);

        $html = $this->scraper->getPageContent($article->getHref());
        $body = $this->parser->getBody($html);
        $word = $this->wordCounter->getMostUsed($body);
        $article->setMostUsedWord($word);
    }

}