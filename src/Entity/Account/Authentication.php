<?php

namespace Aeris\FiestaOnlineBundle\Entity\Account;

use Aeris\FiestaOnlineBundle\Repository\Account\AuthenticationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthenticationRepository::class)
 * @ORM\Table(name="`tUserAuth`")
 */
class Authentication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nAuthID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="sAuthName")
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", name="bIsLoginAble")
     */
    private $can_login;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="authentication")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getCanLogin(): ?bool
    {
        return $this->can_login;
    }

    public function setCanLogin(bool $can_login): self
    {
        $this->can_login = $can_login;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setAuthentication($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAuthentication() === $this) {
                $user->setAuthentication(null);
            }
        }

        return $this;
    }
}
