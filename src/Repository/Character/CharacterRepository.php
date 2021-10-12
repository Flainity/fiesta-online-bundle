<?php

namespace Aeris\FiestaOnlineBundle\Repository\Character;

use Aeris\FiestaOnlineBundle\Entity\Character\Character;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Character|null find($id, $lockMode = null, $lockVersion = null)
 * @method Character|null findOneBy(array $criteria, array $orderBy = null)
 * @method Character[]    findAll()
 * @method Character[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Character::class);
    }

    public function getCharactersFromLastSevenDays()
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $charCount = [];

        for ($i = 1; $i <= 7; $i++)
        {
            $tempTime = new \DateTime('- 7 days');
            $dateTime = $tempTime->modify('+ '.$i.' days');

            $charCount[$i]['date'] = $dateTime->format('d.M.Y');
            $charCount[$i]['count'] =
                $queryBuilder
                ->select('COUNT(c.id)')
                ->where('c.created_at >= :start')
                ->andWhere('c.created_at <= :end')
                ->setParameter('start', $dateTime->setTime(0, 0, 0, 000000)->format('Y-m-d H:i:s.u'))
                ->setParameter('end', $dateTime->setTime(23, 59, 59, 000000)->format('Y-m-d H:i:s.u'))
                ->getQuery()
                ->getSingleScalarResult();
        }

        return $charCount;
    }

    // /**
    //  * @return Character[] Returns an array of Character objects
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
    public function findOneBySomeField($value): ?Character
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
