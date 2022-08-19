<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class AddUserCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('user:add')
            ->setDescription('Adds user with given username to database')
            ->addArgument('username', InputArgument::REQUIRED, 'User\'s username');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $username = $input->getArgument('username');

        $output->writeln(\sprintf('Adding user %s…', $username));

        return 0;
    }

}
