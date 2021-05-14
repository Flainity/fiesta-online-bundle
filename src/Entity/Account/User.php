<?php

namespace Aeris\FiestaOnlineBundle\Entity\Account;

use Aeris\FiestaOnlineBundle\Entity\Character\Character;
use Aeris\FiestaOnlineBundle\Repository\Account\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`tUser`")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nUserNo")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="sUserID")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, name="sUserPW")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", name="bIsAdmin")
     */
    private $admin = false;

    /**
     * @ORM\Column(type="boolean", name="bIsBlock")
     */
    private $blocked = false;

    /**
     * @ORM\Column(type="boolean", name="bIsDelete")
     */
    private $deleted = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="sUserIP")
     */
    private $ip = '127.0.0.1';

    /**
     * @ORM\Column(type="datetime", name="dDate")
     */
    private $created_at;

    /**
     * @ORM\Column(type="integer", name="nAGPoints")
     */
    private $mall_coins = 0;

    /**
     * @ORM\ManyToOne(targetEntity=Authentication::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=true, referencedColumnName="nAuthID", name="nAuthID")
     */
    private $authentication;

    /**
     * @var Character[]|null $characters
     * This will be filled by the account manager
     */
    private $characters;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoles(): ?array
    {
        $roles = [];
        $roles[] = 'ROLE_USER';

        if ($this->isAdmin())
            $roles[] = 'ROLE_ADMIN';

        return array_unique($roles);
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     */
    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }

    public function getBlocked(): ?bool
    {
        return $this->blocked;
    }

    public function setBlocked(bool $blocked): self
    {
        $this->blocked = $blocked;

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

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

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

    public function getMallCoins(): ?int
    {
        return $this->mall_coins;
    }

    public function setMallCoins(int $mall_coins): self
    {
        $this->mall_coins = $mall_coins;

        return $this;
    }

    public function getAuthentication(): ?Authentication
    {
        return $this->authentication;
    }

    public function setAuthentication(?Authentication $authentication): self
    {
        $this->authentication = $authentication;

        return $this;
    }

    /**
     * @return Character[]|null
     */
    public function getCharacters(): ?array
    {
        return $this->characters;
    }

    /**
     * @param Character[]|null $characters
     */
    public function setCharacters(?array $characters): void
    {
        $this->characters = $characters;
    }
}
