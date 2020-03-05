<?php

namespace App\MessageHandler;


use App\Application\Google\Supplier\UpdateSuppliersCommand;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UpdateSuppliersHandler implements MessageHandlerInterface
{
    public function __invoke(UpdateSuppliersCommand $updateSuppliersCommand)
    {

    }

}