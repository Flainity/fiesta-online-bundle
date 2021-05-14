<?php

namespace Aeris\FiestaOnlineBundle\Repository\Configuration;

use Aeris\FiestaOnlineBundle\Entity\Configuration\PaySafeCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaySafeCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaySafeCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaySafeCard[]    findAll()
 * @method PaySafeCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaySafeCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaySafeCard::class);
    }

    // /**
    //  * @return PaySafeCard[] Returns an array of PaySafeCard objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaySafeCard
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
