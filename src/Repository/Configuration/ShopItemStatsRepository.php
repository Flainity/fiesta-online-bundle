<?php

namespace Aeris\FiestaOnlineBundle\Repository\Configuration;

use Aeris\FiestaOnlineBundle\Entity\Configuration\ShopItemStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShopItemStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopItemStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopItemStats[]    findAll()
 * @method ShopItemStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopItemStatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopItemStats::class);
    }
}
