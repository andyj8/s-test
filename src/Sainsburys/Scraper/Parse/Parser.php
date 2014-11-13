<?php

namespace Sainsburys\Scraper\Parse;

use Sainsburys\Scraper\Article;
use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    /**
     * @param string $html
     * @return Article[]
     */
    public function getArticles($html)
    {
        $crawler = new Crawler();
        $crawler->addContent($html);
        $nodes = $crawler->filter('#most-popular .open li a');

        $articles = array();
        foreach ($nodes as $node) {
            $title = trim($node->nodeValue);
            $articles[] = new Article($title, $node->getAttribute('href'));
        }

        return $articles;
    }

    /**
     * @param string $html
     * @return string
     */
    public function getBody($html)
    {
        $crawler = new Crawler();
        $crawler->addContent($html);

        $paragraphs = array();
        $nodes = $crawler->filter('.story-body p');
        foreach ($nodes as $node) {
            $paragraphs[] = $node->nodeValue;
        }

        return implode(' ', $paragraphs);
    }

}
