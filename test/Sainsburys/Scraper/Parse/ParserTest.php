<?php

namespace Sainsburys\Scraper\Parse;

use PHPUnit_Framework_TestCase;
use Sainsburys\Scraper\Article;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function testGetsArticles()
    {
        $config = new ParserConfig();
        $config->setArticlesSelector('.articles li a');
        $parser = new Parser($config);

        $html = '<body><div class="articles"><ul>
                    <li><a href="a">First</a></li>
                    <li><a href="b">Second</a></li>
                </ul></div></body>';

        $expected = array(
            new Article('First', 'a'),
            new Article('Second', 'b')
        );

        $this->assertEquals($expected, $parser->getArticles($html));
    }

    public function testGetsBody()
    {
        $config = new ParserConfig();
        $config->setBodySelector('.body p');
        $parser = new Parser($config);

        $html = '<body><div class="body">
                    <p>Start.</p>
                    <p>And the middle. </p>
                    <p> And the end.</p>
                </div></body>';

        $expected = 'Start. And the middle. And the end.';

        $this->assertEquals($expected, $parser->getBody($html));
    }

}
