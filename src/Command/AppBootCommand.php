<?php

namespace App\Command;

use App\Service\AppBootService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:boot',
    description: 'Booting application',
)]
class AppBootCommand extends Command
{
    private $appBootService;

    public function __construct(AppBootService $appBootService)
    {
        $this->appBootService = $appBootService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->write($this->appBootService->createFirtUser());

        return Command::SUCCESS;
    }
}
