<?php

namespace App\Repository;

use App\Entity\Diagnostics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Diagnostics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diagnostics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diagnostics[]    findAll()
 * @method Diagnostics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiagnosticsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diagnostics::class);
    }


    // /**
    //  * @return Diagnostics[] Returns an array of Diagnostics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Diagnostics
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
