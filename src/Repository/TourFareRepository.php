<?php

namespace DC\Model\Repository;

use DC\Model\Entity\TourFare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TourFare|null find($id, $lockMode = null, $lockVersion = null)
 * @method TourFare|null findOneBy(array $criteria, array $orderBy = null)
 * @method TourFare[]    findAll()
 * @method TourFare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourFareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TourFare::class);
    }

    // /**
    //  * @return TourFare[] Returns an array of TourFare objects
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
    public function findOneBySomeField($value): ?TourFare
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
