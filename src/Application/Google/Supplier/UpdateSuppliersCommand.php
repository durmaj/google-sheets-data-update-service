<?php
declare(strict_types = 1);

namespace App\Application\Google\Supplier;


class UpdateSuppliersCommand
{
    private $commandName;
    private $sheetId;

    public function __construct($sheetId)
    {
        $this->commandName = 'Update suppliers in Google Sheets';
        $this->sheetId = $sheetId;
    }

    public function getCommandName(): string
    {
        return $this->commandName;
    }

    public function getSheetId()
    {
        return $this->sheetId;
    }

}