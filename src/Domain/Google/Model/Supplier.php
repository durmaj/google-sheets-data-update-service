<?php

namespace App\Domain\Google\Model;

use Doctrine\ORM\Mapping as ORM;

class Supplier implements SupplierInterface
{
    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $supplierId;

    /**
     *
     * @var integer
     */
    protected $originId;

    /**
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $summary;

    /**
     *
     * @var string
     */
    protected $gtin;

    /**
     *
     * @var string
     */
    protected $mpn;

    /**
     *
     * @var string
     */
    protected $price;

    /**
     *
     * @var string
     */
    protected $currency;

    /**
     *
     * @var string
     */
    protected $shortcode;

    /**
     *
     * @var string
     */
    protected $category;

    /**
     *
     * @var \DateTime
     */
    protected $date;

    /**
     *
     * @var string
     */
    protected $sub;

    /**
     *
     * @var \DateTime
     */
    protected $dateUpdated;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    /**
     * @param int $supplierId
     */
    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return int
     */
    public function getOriginId(): int
    {
        return $this->originId;
    }

    /**
     * @param int $originId
     */
    public function setOriginId(int $originId): void
    {
        $this->originId = $originId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getGtin(): string
    {
        return $this->gtin;
    }

    /**
     * @param string $gtin
     */
    public function setGtin(string $gtin): void
    {
        $this->gtin = $gtin;
    }

    /**
     * @return string
     */
    public function getMpn(): string
    {
        return $this->mpn;
    }

    /**
     * @param string $mpn
     */
    public function setMpn(string $mpn): void
    {
        $this->mpn = $mpn;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getShortcode(): string
    {
        return $this->shortcode;
    }

    /**
     * @param string $shortcode
     */
    public function setShortcode(string $shortcode): void
    {
        $this->shortcode = $shortcode;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSub(): string
    {
        return $this->sub;
    }

    /**
     * @param string $sub
     */
    public function setSub(string $sub): void
    {
        $this->sub = $sub;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated(): \DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * @param \DateTime $dateUpdated
     */
    public function setDateUpdated(\DateTime $dateUpdated): void
    {
        $this->dateUpdated = $dateUpdated;
    }

}