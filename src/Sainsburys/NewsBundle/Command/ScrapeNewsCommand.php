<?php

namespace Sainsburys\NewsBundle\Command;

use Sainsburys\Scraper\ScrapeService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ScrapeNewsCommand extends ContainerAwareCommand
{
    const NAME = 'sainsburys:scrape';

    protected function configure()
    {
        $this->setName(self::NAME);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $service = $this->getContainer()->get('sainsburys.scrape.service');

        $articles = $service->scrapeNews();



    }

}
