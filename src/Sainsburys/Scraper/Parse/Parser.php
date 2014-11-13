<?php

namespace Sainsburys\Scraper\Parse;

use Sainsburys\Scraper\Article;
use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    /**
     * @var ParserConfig
     */
    private $config;

    /**
     * @param ParserConfig $config
     */
    public function __construct(ParserConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $html
     * @return Article[]
     */
    public function getArticles($html)
    {
        $crawler = $this->getCrawler($html);

        $articles = array();
        $selector = $this->config->getArticlesSelector();
        foreach ($crawler->filter($selector) as $node) {
            $articles[] = new Article($this->getTitle($node), $node->getAttribute('href'));
        }

        return $articles;
    }

    /**
     * @param string $html
     * @return string
     */
    public function getBody($html)
    {
        $crawler = $this->getCrawler($html);

        $paragraphs = array();
        $selector = $this->config->getBodySelector();
        foreach ($crawler->filter($selector) as $node) {
            $paragraphs[] = trim($node->nodeValue);
        }

        return implode(' ', $paragraphs);
    }

    /**
     * @param \DOMElement $node
     * @return string
     */
    private function getTitle(\DOMElement $node)
    {
        $spans = $node->getElementsByTagName('span');
        if ($spans->length) {
            $node->removeChild($spans->item(0));
        }

        return trim($node->textContent);
    }

    /**
     * @param string $html
     * @return Crawler
     */
    private function getCrawler($html)
    {
        $crawler = new Crawler();
        $crawler->addContent($html);

        return $crawler;
    }

}
