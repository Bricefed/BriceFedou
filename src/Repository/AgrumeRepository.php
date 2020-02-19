<?php

namespace App\Repository;

use App\Entity\Agrume;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Agrume|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agrume|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agrume[]    findAll()
 * @method Agrume[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgrumeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agrume::class);
    }

    // /**
    //  * @return Agrume[] Returns an array of Agrume objects
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
    public function findOneBySomeField($value): ?Agrume
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
