<?php

namespace App\Repository;

use App\Entity\Hospitalisations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hospitalisations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hospitalisations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hospitalisations[]    findAll()
 * @method Hospitalisations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HospitalisationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hospitalisations::class);
    }
    public function AllAntecedentPatientVisitbyId($id)
    {
        $qb = $this->createQueryBuilder('a')
            ->Join('a.antecedent', 'an')
            ->Join('a.patient', 'p')
            ->Join('a.visite', 'v')
            ->andwhere('a.antecedent =:idF')
            ->andwhere('a.patient =:idF')
            ->andwhere('a.visite =:idF')
            ->setParameter('idF', $id);

        return $qb->getQuery()->getResult();
    }
    public function load()
    {
        $qb = $this->createQueryBuilder('a')
            ->Join('a.antecedent', 'an')
            ->Join('a.patient', 'p')
            ->Join('a.visite', 'v');

        return $qb->getQuery()->execute();
    }
    // /**
    //  * @return Hospitalisations[] Returns an array of Hospitalisations objects
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
    public function findOneBySomeField($value): ?Hospitalisations
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
