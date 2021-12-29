<?php

namespace App\Repository;

use App\Entity\HistoireMaladie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoireMaladie|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoireMaladie|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoireMaladie[]    findAll()
 * @method HistoireMaladie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoireMaladieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoireMaladie::class);
    }

    // /**
    //  * @return HistoireMaladie[] Returns an array of HistoireMaladie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoireMaladie
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
