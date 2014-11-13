<?php

namespace Sainsburys\Scraper\Parse;

class WordCounter
{
    /**
     * @var array
     */
    private $excludeWords;

    /**
     * @param string $excludeWords
     */
    public function __construct($excludeWords)
    {
        $this->excludeWords = explode(',', $excludeWords);
    }

    /**
     * @param string $content
     * @return string
     */
    public function getMostUsed($content)
    {
        $words = array();
        foreach (explode(' ', $content) as $split) {
            $words[] = trim(strtolower($split), '.",\'');
        }

        $clean = array();
        foreach ($words as $word) {
            if (!in_array($word, $this->excludeWords)) {
                $clean[] = $word;
            }
        }

        $counts = array_count_values($clean);
        arsort($counts);

        return key($counts);
    }

}

