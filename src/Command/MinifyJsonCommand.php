<?php

namespace App\Command;

use App\Kernel;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

#[AsCommand(
    name: 'app:minify-json',
    description: 'Add a short description for your command',
)]
class MinifyJsonCommand extends Command
{
    public function __construct(private readonly Filesystem $filesystem, private readonly Kernel $kernel)
    {
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
        $io = new SymfonyStyle($input, $output);

        $file_handle = file_get_contents($this->kernel->getProjectDir() . '/assets/source-json/Records.json');

        $json = array_map(function ($a) {
            return ['lat' => $a['latitudeE7']/10000000, 'lon' => $a['longitudeE7']/10000000];
        }, json_decode($file_handle, true)['locations']);

        $this->filesystem->dumpFile($this->kernel->getProjectDir() . '/assets/source-json/minify.json', json_encode($json));

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
