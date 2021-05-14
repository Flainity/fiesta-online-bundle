<?php

namespace Aeris\FiestaOnlineBundle\Repository\Configuration;

use Aeris\FiestaOnlineBundle\Entity\Configuration\ShopCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShopCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopCategory[]    findAll()
 * @method ShopCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopCategory::class);
    }

    /**
     * @return int
     */
    public function getRowCount(): ?int
    {
        try {
            return $this->createQueryBuilder('sc')
                ->select('count(sc.id)')
                ->where('sc.enabled = 1')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NoResultException | NonUniqueResultException $e) {
            return 0;
        }
    }
}
