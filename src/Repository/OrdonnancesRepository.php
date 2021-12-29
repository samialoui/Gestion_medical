<?php

namespace App\Repository;

use App\Entity\Ordonnances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ordonnances|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordonnances|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordonnances[]    findAll()
 * @method Ordonnances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdonnancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordonnances::class);
    }

    // /**
    //  * @return Ordonnances[] Returns an array of Ordonnances objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ordonnances
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
