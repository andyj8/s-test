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
    public function __construct($excludeWords = '')
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
            $word = trim(strtolower($split), '.-",\'');
            if (!empty($word) && !in_array($word, $this->excludeWords)) {
                $words[] = $word;
            }
        }

        $counts = array_count_values($words);
        arsort($counts);

        return key($counts);
    }

}

