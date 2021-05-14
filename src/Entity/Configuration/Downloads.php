<?php

namespace Aeris\FiestaOnlineBundle\Entity\Configuration;

use Aeris\FiestaOnlineBundle\Repository\Configuration\DownloadsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DownloadsRepository::class)
 * @ORM\Table(name="tDownloads")
 */
class Downloads
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $google;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $mega;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoogle(): ?string
    {
        return $this->google;
    }

    public function setGoogle(string $google): self
    {
        $this->google = $google;

        return $this;
    }

    public function getMega(): ?string
    {
        return $this->mega;
    }

    public function setMega(string $mega): self
    {
        $this->mega = $mega;

        return $this;
    }
}
