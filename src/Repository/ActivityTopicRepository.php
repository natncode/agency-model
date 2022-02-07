<?php

namespace DC\Model\Repository;

use DC\Model\Entity\ActivityTopic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActivityTopic|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityTopic|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityTopic[]    findAll()
 * @method ActivityTopic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityTopicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityTopic::class);
    }

    // /**
    //  * @return ActivityTopic[] Returns an array of ActivityTopic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActivityTopic
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
