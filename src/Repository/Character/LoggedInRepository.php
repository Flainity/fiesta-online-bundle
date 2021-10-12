<?php

namespace Aeris\FiestaOnlineBundle\Repository\Character;

use Aeris\FiestaOnlineBundle\Entity\Character\LoggedIn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoggedIn|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoggedIn|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoggedIn[]    findAll()
 * @method LoggedIn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoggedInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoggedIn::class);
    }
}
