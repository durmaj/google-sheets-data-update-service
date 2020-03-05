<?php
declare(strict_types = 1);

namespace App\Domain\Google\Model;

interface SupplierInterface
{
    public function getId(): int;
    public function getSupplierId(): int;
    public function getTitle(): string;
    public function getDescription(): string;
    public function getSummary(): string;
    public function getGtin(): string;
    public function getMpn(): string;
    public function getPrice(): string;
    public function getShortcode(): string;
    public function getCategory(): string;
    public function getDate(): \DateTime;
    public function getSub(): string;
    public function getDateUpdated(): \DateTime;

}