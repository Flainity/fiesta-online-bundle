<?php

namespace Aeris\FiestaOnlineBundle\Entity\Character;

use Aeris\FiestaOnlineBundle\Repository\Character\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="tCharacter")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nCharNo")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="sID")
     */
    private $name;

    /**
     * @ORM\Column(type="integer", name="nUserNo")
     */
    private $user_number;

    /**
     * @ORM\Column(type="integer", name="nAdminLevel")
     */
    private $admin_level;

    /**
     * @ORM\Column(type="datetime", name="dCreateDate")
     */
    private $created_at;

    /**
     * @ORM\Column(type="boolean", name="bDeleted")
     */
    private $deleted;

    /**
     * This will be filled by the Character Manager
     * @var CharacterClass $class
     */
    private $class;

    /**
     * @ORM\Column(type="integer", name="nLoginZoneX")
     */
    private $login_zone_x;

    /**
     * @ORM\Column(type="integer", name="nLoginZoneY")
     */
    private $login_zone_y;

    /**
     * @ORM\Column(type="datetime", name="dDeletedDate")
     */
    private $deleted_at;

    /**
     * @ORM\Column(type="string", length=255, name="sLoginZone")
     */
    private $login_map;

    /**
     * @ORM\Column(type="integer", name="nLevel")
     */
    private $level;

    /**
     * @ORM\Column(type="bigint", name="nExp")
     */
    private $experience;

    /**
     * @ORM\Column(type="integer", name="nSlotNo")
     */
    private $slot;

    /**
     * @ORM\Column(type="smallint", name="nHP")
     */
    private $hp;

    /**
     * @ORM\Column(type="smallint", name="nSP")
     */
    private $sp;

    /**
     * @ORM\Column(type="datetime", name="dLastLoginDate")
     */
    private $last_login_at;

    /**
     * @ORM\Column(type="integer", name="nLoginCount")
     */
    private $login_count;

    /**
     * @ORM\Column(type="integer", name="nFame")
     */
    private $fame;

    /**
     * @ORM\Column(type="integer", name="nPrisonMin")
     */
    private $prison_minutes;

    /**
     * @ORM\Column(type="integer", name="nPlayMin")
     */
    private $play_minutes;

    /**
     * @ORM\Column(type="bigint", name="nMoney")
     */
    private $money;

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

    public function getUserNumber(): ?int
    {
        return $this->user_number;
    }

    public function setUserNumber(int $user_number): self
    {
        $this->user_number = $user_number;

        return $this;
    }

    public function getAdminLevel(): ?int
    {
        return $this->admin_level;
    }

    public function setAdminLevel(int $admin_level): self
    {
        $this->admin_level = $admin_level;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getLoginZoneX(): ?int
    {
        return $this->login_zone_x;
    }

    public function setLoginZoneX(int $login_zone_x): self
    {
        $this->login_zone_x = $login_zone_x;

        return $this;
    }

    public function getLoginZoneY(): ?int
    {
        return $this->login_zone_y;
    }

    public function setLoginZoneY(int $login_zone_y): self
    {
        $this->login_zone_y = $login_zone_y;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(\DateTimeInterface $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getLoginMap(): ?string
    {
        return $this->login_map;
    }

    public function setLoginMap(string $login_map): self
    {
        $this->login_map = $login_map;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getSlot(): ?int
    {
        return $this->slot;
    }

    public function setSlot(int $slot): self
    {
        $this->slot = $slot;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getSp(): ?int
    {
        return $this->sp;
    }

    public function setSp(int $sp): self
    {
        $this->sp = $sp;

        return $this;
    }

    public function getLastLoginAt(): ?\DateTimeInterface
    {
        return $this->last_login_at;
    }

    public function setLastLoginAt(\DateTimeInterface $last_login_at): self
    {
        $this->last_login_at = $last_login_at;

        return $this;
    }

    public function getLoginCount(): ?int
    {
        return $this->login_count;
    }

    public function setLoginCount(int $login_count): self
    {
        $this->login_count = $login_count;

        return $this;
    }

    public function getFame(): ?int
    {
        return $this->fame;
    }

    public function setFame(int $fame): self
    {
        $this->fame = $fame;

        return $this;
    }

    public function getPrisonMinutes(): ?int
    {
        return $this->prison_minutes;
    }

    public function setPrisonMinutes(int $prison_minutes): self
    {
        $this->prison_minutes = $prison_minutes;

        return $this;
    }

    public function getPlayMinutes(): ?int
    {
        return $this->play_minutes;
    }

    public function setPlayMinutes(int $play_minutes): self
    {
        $this->play_minutes = $play_minutes;

        return $this;
    }

    public function getMoney(): ?string
    {
        return $this->money;
    }

    public function setMoney(string $money): self
    {
        $this->money = $money;

        return $this;
    }

    /**
     * @return CharacterClass
     */
    public function getClass(): CharacterClass
    {
        return $this->class;
    }

    /**
     * @param CharacterClass $class
     */
    public function setClass(CharacterClass $class): void
    {
        $this->class = $class;
    }
}
