<?php

namespace Aeris\FiestaOnlineBundle\Repository\Configuration;

use Aeris\FiestaOnlineBundle\Entity\Configuration\PayPalPayment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PayPalPayment|null find($id, $lockMode = null, $lockVersion = null)
 * @method PayPalPayment|null findOneBy(array $criteria, array $orderBy = null)
 * @method PayPalPayment[]    findAll()
 * @method PayPalPayment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PayPalPaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PayPalPayment::class);
    }

    // /**
    //  * @return PayPalPayment[] Returns an array of PayPalPayment objects
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
    public function findOneBySomeField($value): ?PayPalPayment
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
