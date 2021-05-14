<?php

namespace Aeris\FiestaOnlineBundle\Repository\Ticket;

use Aeris\FiestaOnlineBundle\Entity\Ticket\CharacterClassList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterClassList|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterClassList|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterClassList[]    findAll()
 * @method CharacterClassList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterClassListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterClassList::class);
    }

    // /**
    //  * @return CharacterClassList[] Returns an array of CharacterClassList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CharacterClassList
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
