<?php
declare(strict_types = 1);

namespace App\UI\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use App\Application\Google\Supplier\UpdateSuppliersCommand as UpdateSuppliers;


class UpdateSuppliersCommand extends Command
{
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:update-suppliers')
            ->setDescription('Updates suppliers data in specified sheet in Google Sheets.')
        ;
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $sheetId = $input->getArgument('sheet_id');

        $envelope = $this->bus->dispatch(new UpdateSuppliers());

        $result = $envelope->last(HandledStamp::class)->getResult();

        $output->writeln("<info>Suppliers updated in sheet ID: $sheetId <br>
Date: <br>
Elapsed time: <br>
Memory used: <br>
Status: <br>
Processed rows:
                                   </info>");

        return 1;
    }

}