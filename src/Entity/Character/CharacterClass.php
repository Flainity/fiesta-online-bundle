<?php

namespace Aeris\FiestaOnlineBundle\Entity\Character;

use Aeris\FiestaOnlineBundle\Repository\Character\CharacterClassRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterClassRepository::class)
 * @ORM\Table(name="tCharacterShape")
 */
class CharacterClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nCharNo")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="nClass")
     */
    private $class_id;

    /**
     * This will be filled by the Character Manager
     * @var string $name
     */
    private $name;

    /**
     * This will be filled by the Character Manager
     * @var string $image
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassId(): ?int
    {
        return $this->class_id;
    }

    public function setClassId(int $class_id): self
    {
        $this->class_id = $class_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
