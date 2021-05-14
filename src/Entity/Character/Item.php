<?php

namespace Aeris\FiestaOnlineBundle\Entity\Character;

use Aeris\FiestaOnlineBundle\Repository\Character\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 * @ORM\Table(name="tItem")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nItemKey")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="nItemID")
     */
    private $item_id;

    /**
     * @ORM\Column(type="integer", name="nOwner")
     */
    private $owner;

    /**
     * @ORM\Column(type="integer", name="nStorage")
     */
    private $storage;

    /**
     * @ORM\Column(type="integer", name="nStorageType")
     */
    private $storage_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemId(): ?int
    {
        return $this->item_id;
    }

    public function setItemId(int $item_id): self
    {
        $this->item_id = $item_id;

        return $this;
    }

    public function getOwner(): ?int
    {
        return $this->owner;
    }

    public function setOwner(int $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getStorage(): ?int
    {
        return $this->storage;
    }

    public function setStorage(int $storage): self
    {
        $this->storage = $storage;

        return $this;
    }

    public function getStorageType(): ?int
    {
        return $this->storage_type;
    }

    public function setStorageType(int $storage_type): self
    {
        $this->storage_type = $storage_type;

        return $this;
    }
}
