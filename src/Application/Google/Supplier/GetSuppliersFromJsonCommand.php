<?php
declare(strict_types = 1);

namespace App\Application\Google\Supplier;


class GetSuppliersFromJsonCommand
{
    private $commandName;

    public function __construct()
    {
        $this->commandName = 'Get suppliers from JSON file';
    }

    public function getCommandName(): string
    {
        return $this->commandName;
    }

}