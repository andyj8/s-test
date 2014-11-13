<?php

namespace Sainsburys\Scraper;

use Sainsburys\Scraper\Parse\Parser;
use Sainsburys\Scraper\Parse\WordCounter;
use Sainsburys\Scraper\Scraper\Scraper;

class ScrapeService
{
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
     * @param Scraper $scraper
     * @param Parser $parser
     * @param WordCounter $wordCounter
     */
    public function __construct(Scraper $scraper, Parser $parser, WordCounter $wordCounter)
    {
        $this->parser = $parser;
        $this->scraper = $scraper;
        $this->wordCounter = $wordCounter;
    }

    /**
     * @return Article[]
     */
    public function scrapeNews()
    {
        $url = '/var/www/html/sainsburys/test/assets/test.html';
        $html = $this->scraper->getPageContent($url);

        $articles = $this->parser->getArticles($html);

        foreach ($articles as $article) {
            $size = $this->scraper->getPageSize($article->getHref());
            $article->setSize($size);

            $html = $this->scraper->getPageContent($article->getHref());
            $body = $this->parser->getBody($html);

            $word = $this->wordCounter->getMostUsed($body);
            $article->setMostUsedWord($word);

        }

        print_r($articles);


    }

}