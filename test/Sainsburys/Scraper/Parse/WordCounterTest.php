<?php

namespace Sainsburys\Scraper\Parse;

use PHPUnit_Framework_TestCase;

class WordCounterTest extends PHPUnit_Framework_TestCase
{
    public function testGetsMostUsed()
    {
        $string = 'one one two. three. two two.';
        $counter = new WordCounter();
        $this->assertEquals('two', $counter->getMostUsed($string));
    }

    public function testExcludesWords()
    {
        $excluded = 'not,nor';
        $string = 'not one one not two. three. two two. not not.';
        $counter = new WordCounter($excluded);
        $this->assertEquals('two', $counter->getMostUsed($string));
    }

}
