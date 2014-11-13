<?php

namespace Sainsburys\NewsBundle\Command;

use Sainsburys\Scraper\Render\Renderer;
use Sainsburys\Scraper\ScrapeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ScrapeNewsCommand extends Command
{
    const NAME = 'sainsburys:scrape';

    /**
     * @var ScrapeService
     */
    private $scraperService;

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @param ScrapeService $service
     * @param Renderer $renderer
     */
    public function __construct(ScrapeService $service, Renderer $renderer)
    {
        $this->scraperService = $service;
        $this->renderer = $renderer;

        parent::__construct(self::NAME);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $articles = $this->scraperService->scrapeNews();
        $json = $this->renderer->render($articles);

        echo $json;
    }

}
