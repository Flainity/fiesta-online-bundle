<?php

namespace Aeris\FiestaOnlineBundle\Repository\Account;

use Aeris\FiestaOnlineBundle\Entity\Account\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\QueryException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return array|null
     */
    public function findAllIndexed(): ?array
    {
        try {
            return $this->createQueryBuilder('u')
                ->indexBy('u', 'u.id')
                ->getQuery()
                ->getResult();
        } catch (QueryException $e) {
            return null;
        }
    }

    public function getAccountsFromLastSevenDays()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $accountCount = [];

        for ($i = 1; $i <= 7; $i++)
        {
            $tempTime = new \DateTime('- 44 days');
            $dateTime = $tempTime->modify('+ '.$i.' days');

            $accountCount[$i]['date'] = $dateTime->format('d.M.Y');
            $accountCount[$i]['count'] =
                $queryBuilder
                    ->select('COUNT(a.id)')
                    ->where('a.created_at >= :start')
                    ->andWhere('a.created_at <= :end')
                    ->setParameter('start', $dateTime->setTime(0, 0, 0, 000000)->format('Y-m-d H:i:s.u'))
                    ->setParameter('end', $dateTime->setTime(23, 59, 59, 000000)->format('Y-m-d H:i:s.u'))
                    ->getQuery()
                    ->getSingleScalarResult();
        }

        return $accountCount;
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
