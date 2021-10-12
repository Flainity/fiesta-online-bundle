<?php

namespace Aeris\FiestaOnlineBundle\Entity\Configuration;

use Aeris\FiestaOnlineBundle\Repository\Configuration\ShopItemStatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShopItemStatsRepository::class)
 * @ORM\Table(name="tItemStats")
 */
class ShopItemStats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, name="sName")
     */
    private $name;

    /**
     * @ORM\Column(type="integer", name="nSTR", nullable=true)
     */
    private $strength;

    /**
     * @ORM\Column(type="integer", name="nEND", nullable=true)
     */
    private $endurance;

    /**
     * @ORM\Column(type="integer", name="nDEX", nullable=true)
     */
    private $dexterity;

    /**
     * @ORM\Column(type="integer", name="nINT", nullable=true)
     */
    private $intelligence;

    /**
     * @ORM\Column(type="integer", name="nSPR", nullable=true)
     */
    private $spirit;

    /**
     * @ORM\Column(type="integer", name="nHP", nullable=true)
     */
    private $health;

    /**
     * @ORM\Column(type="integer", name="nSP", nullable=true)
     */
    private $mana;

    /**
     * @ORM\Column(type="string", length=50, name="sPhysicalDamage", nullable=true)
     */
    private $physical_damage;

    /**
     * @ORM\Column(type="string", length=50, name="sMagicalDamage", nullable=true)
     */
    private $magical_damage;

    /**
     * @ORM\Column(type="string", length=50, name="sPhysicalDefense", nullable=true)
     */
    private $physical_defense;

    /**
     * @ORM\Column(type="string", length=50, name="sMagicalDefense", nullable=true)
     */
    private $magical_defense;

    /**
     * @ORM\Column(type="string", length=50, name="sAim", nullable=true)
     */
    private $aim;

    /**
     * @ORM\Column(type="string", length=50, name="sEvasion", nullable=true)
     */
    private $evasion;

    /**
     * @ORM\Column(type="string", length=50, name="sCritRate", nullable=true)
     */
    private $critical_rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength): void
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getEndurance()
    {
        return $this->endurance;
    }

    /**
     * @param mixed $endurance
     */
    public function setEndurance($endurance): void
    {
        $this->endurance = $endurance;
    }

    /**
     * @return mixed
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * @param mixed $dexterity
     */
    public function setDexterity($dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return mixed
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * @param mixed $intelligence
     */
    public function setIntelligence($intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    /**
     * @return mixed
     */
    public function getSpirit()
    {
        return $this->spirit;
    }

    /**
     * @param mixed $spirit
     */
    public function setSpirit($spirit): void
    {
        $this->spirit = $spirit;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health): void
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * @param mixed $mana
     */
    public function setMana($mana): void
    {
        $this->mana = $mana;
    }

    /**
     * @return mixed
     */
    public function getPhysicalDamage()
    {
        return $this->physical_damage;
    }

    /**
     * @param mixed $physical_damage
     */
    public function setPhysicalDamage($physical_damage): void
    {
        $this->physical_damage = $physical_damage;
    }

    /**
     * @return mixed
     */
    public function getMagicalDamage()
    {
        return $this->magical_damage;
    }

    /**
     * @param mixed $magical_damage
     */
    public function setMagicalDamage($magical_damage): void
    {
        $this->magical_damage = $magical_damage;
    }

    /**
     * @return mixed
     */
    public function getPhysicalDefense()
    {
        return $this->physical_defense;
    }

    /**
     * @param mixed $physical_defense
     */
    public function setPhysicalDefense($physical_defense): void
    {
        $this->physical_defense = $physical_defense;
    }

    /**
     * @return mixed
     */
    public function getMagicalDefense()
    {
        return $this->magical_defense;
    }

    /**
     * @param mixed $magical_defense
     */
    public function setMagicalDefense($magical_defense): void
    {
        $this->magical_defense = $magical_defense;
    }

    /**
     * @return mixed
     */
    public function getAim()
    {
        return $this->aim;
    }

    /**
     * @param mixed $aim
     */
    public function setAim($aim): void
    {
        $this->aim = $aim;
    }

    /**
     * @return mixed
     */
    public function getEvasion()
    {
        return $this->evasion;
    }

    /**
     * @param mixed $evasion
     */
    public function setEvasion($evasion): void
    {
        $this->evasion = $evasion;
    }

    /**
     * @return mixed
     */
    public function getCriticalRate()
    {
        return $this->critical_rate;
    }

    /**
     * @param mixed $critical_rate
     */
    public function setCriticalRate($critical_rate): void
    {
        $this->critical_rate = $critical_rate;
    }

    public function __toString()
    {
        return $this->name;
    }
}
