<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\DBAL\Connection;

class DatabaseTestCommand extends Command
{
    protected static $defaultName = 'app:database:test';

    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Tests database connection.')
            ->setHelp('This command allows you to test your database connection...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->connection->connect();
            if ($this->connection->isConnected()) {
                $output->writeln('Successfully connected to the database.');
                return Command::SUCCESS;
            } else {
                $output->writeln('Failed to connect to the database.');
                return Command::FAILURE;
            }
        } catch (\Exception $e) {
            $output->writeln('Failed to connect to the database.');
            $output->writeln('Error: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}