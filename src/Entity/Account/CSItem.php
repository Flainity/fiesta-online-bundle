<?php

namespace Aeris\FiestaOnlineBundle\Entity\Account;

use Aeris\FiestaOnlineBundle\Repository\Account\CSItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CSItemRepository::class)
 * @ORM\Table(name="tChargeItem")
 */
class CSItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="rowNo")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="userNo")
     */
    private $user_number;

    /**
     * @ORM\Column(type="integer", name="orderNo")
     */
    private $order_number;

    /**
     * @ORM\Column(type="integer", name="goodsNo")
     */
    private $item_number;

    /**
     * @ORM\Column(type="integer", name="amount")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime", name="registerDate")
     */
    private $bought_at;

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

    public function getOrderNumber(): ?int
    {
        return $this->order_number;
    }

    public function setOrderNumber(int $order_number): self
    {
        $this->order_number = $order_number;

        return $this;
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

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getBoughtAt(): ?\DateTimeInterface
    {
        return $this->bought_at;
    }

    public function setBoughtAt(\DateTimeInterface $bought_at): self
    {
        $this->bought_at = $bought_at;

        return $this;
    }
}
