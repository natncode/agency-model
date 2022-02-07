<?php

namespace DC\Model\Repository;

use DC\Model\Entity\TourDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TourDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method TourDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method TourDate[]    findAll()
 * @method TourDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TourDate::class);
    }

    // /**
    //  * @return TourDate[] Returns an array of TourDate objects
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
    public function findOneBySomeField($value): ?TourDate
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
