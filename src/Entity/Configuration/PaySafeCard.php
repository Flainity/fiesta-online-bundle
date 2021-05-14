<?php

namespace Aeris\FiestaOnlineBundle\Entity\Configuration;

use Aeris\FiestaOnlineBundle\Repository\Configuration\PaySafeCardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaySafeCardRepository::class)
 * @ORM\Table(name="tPaysafecard")
 */
class PaySafeCard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="orderID")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="nUserNo")
     */
    private $user_number;

    /**
     * @ORM\Column(type="string", length=255, name="nCode")
     */
    private $code;

    /**
     * @ORM\Column(type="integer", name="nCoins")
     */
    private $coins;

    /**
     * @ORM\Column(type="boolean", name="nStatus")
     */
    private $status = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNumber(): ?int
    {
        return $this->user_number;
    }

    public function setUserNumber(int $user_number): self
    {
        $this->user_number = $user_number;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCoins(): ?int
    {
        return $this->coins;
    }

    public function setCoins(int $coins): self
    {
        $this->coins = $coins;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
