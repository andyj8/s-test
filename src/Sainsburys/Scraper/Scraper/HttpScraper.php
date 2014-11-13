<?php

namespace Sainsburys\Scraper\Scraper;

class HttpScraper implements Scraper
{
    /**
     * @param string $location
     * @return int
     */
    public function getPageSize($location)
    {
        $head = array_change_key_case(get_headers($location, true));
        $filesize = $head['content-length'];

        return $filesize;
    }

    /**
     * @param string $location
     * @return mixed
     */
    public function getPageContent($location)
    {
        return file_get_contents($location);
    }

}


