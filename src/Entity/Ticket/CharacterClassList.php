<?php

namespace Aeris\FiestaOnlineBundle\Entity\Ticket;

use Aeris\FiestaOnlineBundle\Repository\Ticket\CharacterClassListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterClassListRepository::class)
 * @ORM\Table(name="tClassList")
 */
class CharacterClassList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="sID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="nName")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, name="sImage")
     */
    private $image;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
