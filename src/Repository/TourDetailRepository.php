<?php

namespace DC\Model\Repository;

use DC\Model\Entity\TourDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TourDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method TourDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method TourDetail[]    findAll()
 * @method TourDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TourDetail::class);
    }

    // /**
    //  * @return TourDetail[] Returns an array of TourDetail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TourDetail
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
