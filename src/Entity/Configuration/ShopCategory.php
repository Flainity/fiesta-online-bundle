<?php

namespace Aeris\FiestaOnlineBundle\Entity\Configuration;

use Aeris\FiestaOnlineBundle\Repository\Configuration\ShopCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShopCategoryRepository::class)
 * @ORM\Table(name="tCats")
 */
class ShopCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="sName")
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", name="nEnabled")
     */
    private $enabled;

    /**
     * @ORM\OneToMany(targetEntity=ShopItem::class, mappedBy="category")
     */
    private $shopItems;

    public function __construct()
    {
        $this->shopItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|ShopItem[]
     */
    public function getShopItems(): Collection
    {
        return $this->shopItems;
    }

    public function addShopItem(ShopItem $shopItem): self
    {
        if (!$this->shopItems->contains($shopItem)) {
            $this->shopItems[] = $shopItem;
            $shopItem->setCategory($this);
        }

        return $this;
    }

    public function removeShopItem(ShopItem $shopItem): self
    {
        if ($this->shopItems->removeElement($shopItem)) {
            // set the owning side to null (unless already changed)
            if ($shopItem->getCategory() === $this) {
                $shopItem->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }


}
