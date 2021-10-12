<?php

namespace Aeris\FiestaOnlineBundle\Entity\Configuration;

use Aeris\FiestaOnlineBundle\Repository\Configuration\ShopItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShopItemRepository::class)
 * @ORM\Table(name="tItems")
 */
class ShopItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nID")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="nGoodsNo")
     */
    private $item_number;

    /**
     * @ORM\Column(type="string", length=255, name="sName")
     */
    private $name;

    /**
     * @ORM\Column(type="integer", name="nLot")
     */
    private $amount;

    /**
     * @ORM\Column(type="integer", name="nDuration")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", name="sDurationUnit")
     */
    private $durationUnit;

    /**
     * @ORM\Column(type="integer", name="nPrice")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=500, name="sDescription")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=ShopCategory::class, inversedBy="shopItems")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="nID", name="nCat")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=ShopItemStats::class)
     * @ORM\JoinColumn(nullable=true, referencedColumnName="nID", name="nStats")
     */
    private $stats;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="sImg")
     */
    private $image;

    /**
     * @ORM\Column(type="boolean", name="nEnabled")
     */
    private $enabled;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemNumber(): ?int
    {
        return $this->item_number;
    }

    public function setItemNumber(int $item_number): self
    {
        $this->item_number = $item_number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getDurationUnit()
    {
        return $this->durationUnit;
    }

    /**
     * @param mixed $durationUnit
     */
    public function setDurationUnit($durationUnit): void
    {
        $this->durationUnit = $durationUnit;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?ShopCategory
    {
        return $this->category;
    }

    public function setCategory(?ShopCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return ShopItemStats|null
     */
    public function getStats(): ?ShopItemStats
    {
        return $this->stats;
    }

    /**
     * @param mixed $stats
     */
    public function setStats($stats): void
    {
        $this->stats = $stats;
    }
}
