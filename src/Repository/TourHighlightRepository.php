<?php

namespace DC\Model\Repository;

use DC\Model\Entity\TourHighlight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TourHighlight|null find($id, $lockMode = null, $lockVersion = null)
 * @method TourHighlight|null findOneBy(array $criteria, array $orderBy = null)
 * @method TourHighlight[]    findAll()
 * @method TourHighlight[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourHighlightRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TourHighlight::class);
    }

    // /**
    //  * @return TourHighlight[] Returns an array of TourHighlight objects
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
    public function findOneBySomeField($value): ?TourHighlight
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
