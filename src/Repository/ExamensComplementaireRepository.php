<?php

namespace App\Repository;

use App\Entity\ExamensComplementaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExamensComplementaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamensComplementaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamensComplementaire[]    findAll()
 * @method ExamensComplementaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamensComplementaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamensComplementaire::class);
    }

    // /**
    //  * @return ExamensComplementaire[] Returns an array of ExamensComplementaire objects
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
    public function findOneBySomeField($value): ?ExamensComplementaire
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
