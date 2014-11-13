<?php

namespace Sainsburys\Scraper;

use PHPUnit_Framework_TestCase;

class ArticleTest extends PHPUnit_Framework_TestCase
{
    const TITLE = 'Test';
    const HREF  = 'http://test';
    const SIZE  = 1024;
    const WORD  = 'hello';

    public function testHasTitle()
    {
        $article = $this->createArticle();
        $this->assertEquals(self::TITLE, $article->getTitle());
    }

    public function testHasHref()
    {
        $article = $this->createArticle();
        $this->assertEquals(self::HREF, $article->getHref());
    }

    public function testHasSize()
    {
        $article = $this->createArticle();
        $article->setSize(self::SIZE);
        $this->assertEquals(self::SIZE, $article->getSize());
    }

    public function testHasMostUsedWord()
    {
        $article = $this->createArticle();
        $article->setMostUsedWord(self::WORD);
        $this->assertEquals(self::WORD, $article->getMostUsedWord());
    }

    /**
     * @return Article
     */
    private function createArticle()
    {
        return new Article(self::TITLE, self::HREF);
    }

}


