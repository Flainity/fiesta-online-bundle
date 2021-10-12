<?php

namespace Aeris\FiestaOnlineBundle\Entity\Character;

use Aeris\FiestaOnlineBundle\Repository\Character\LoggedInRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoggedInRepository::class)
 * @ORM\Table(name="LoggedInChars")
 */
class LoggedIn
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="nCharNo")
     */
    private $charNo;

    /**
     * @ORM\Column(type="integer", name="nUserNo")
     */
    private $userNo;

    /**
     * @return int|null
     */
    public function getCharNo() : ?int
    {
        return $this->charNo;
    }

    /**
     * @return mixed
     */
    public function getUserNo()
    {
        return $this->userNo;
    }

    /**
     * @param mixed $userNo
     */
    public function setUserNo($userNo): void
    {
        $this->userNo = $userNo;
    }
}
