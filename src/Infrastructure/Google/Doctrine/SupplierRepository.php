<?php
declare(strict_types =1);

namespace App\Infrastructure\Google\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Google\Model\Supplier;

class SupplierRepository extends ServiceEntityRepository
{
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        $this->em = $em;

        parent::__construct($registry, Supplier::class);
    }

    public function saveSupplier($data)
    {
        $decodedData = json_decode($data);

        $supplier = new Supplier();
        $supplier->setSupplierId($decodedData->ID);
        $supplier->setTitle($decodedData->title);
        $supplier->setDescription($decodedData->description);
        $supplier->setSummary($decodedData->summary);
        $supplier->setGtin($decodedData->gtin);
        $supplier->setMpn($decodedData->mpn);
        $supplier->setPrice($decodedData->price);
        $supplier->setShortcode($decodedData->shortcode);
        $supplier->setCategory($decodedData->category);
        $supplier->setSub(json_encode($decodedData->sub));
        $supplier->setDateUpdated(new \DateTime());

        $this->em->persist($supplier);

        $this->em->flush();
    }

}