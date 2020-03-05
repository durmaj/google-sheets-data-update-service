<?php
declare(strict_types = 1);

namespace App\Application\Google\Supplier;

use App\Infrastructure\Google\Doctrine\SupplierRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetSuppliersFromJsonHandler implements MessageHandlerInterface
{
    private $supplierRepository;
    private $jsonDir;

    public function __construct(SupplierRepository $supplierRepository, $jsonDir)
    {
        $this->supplierRepository = $supplierRepository;
        $this->jsonDir = $jsonDir;
    }

    public function __invoke(GetSuppliersFromJsonCommand $command)
    {
        $repository = $this->supplierRepository;

        $suppliers = json_decode(file_get_contents($this->jsonDir . "/". $_ENV['DATA_FILE_NAME']));

        //TODO: make it in batches

        foreach ($suppliers as $supplier) {
            try {
                $repository->saveSupplier(json_encode($supplier));
            } catch (\Exception $e) {
                echo $e;
            }
        }

        return true;
    }

}