<?php

namespace App\Repository;

use App\Entity\ExamensClinique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExamensClinique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamensClinique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamensClinique[]    findAll()
 * @method ExamensClinique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamensCliniqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamensClinique::class);
    }

    // /**
    //  * @return ExamensClinique[] Returns an array of ExamensClinique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExamensClinique
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
