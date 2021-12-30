<?php

namespace App\Repository;

use App\Entity\Consultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Consultation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consultation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consultation[]    findAll()
 * @method Consultation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consultation::class);
    }
    //retrouver touts consultations ont le diagnostic en cours
    public function findDiagnosticByDiag1()
    {
        $query = $this->_em->createQuery(
            'SELECT c
         FROM App\Entity\Consultation c
         WHERE c.diagnostic = :diagnostic
         ORDER BY c.diagnostic
         ASC'
        )
            ->setParameter('diagnostic', 'en cours')
        ;
        return $query->execute();
    }
    //retrouver touts consultations ont le diagnostic en attente
    public function findDiagnosticByDiag2()
    {
        $query = $this->_em->createQuery(
            'SELECT c
         FROM App\Entity\Consultation c
         WHERE c.diagnostic >= :diagnostic
         ORDER BY c.diagnostic
         ASC'
        )
            ->setParameter('diagnostic', 'en attente')
        ;
        return $query->execute();
    }
    // /**
    //  * @return Consultation[] Returns an array of Consultation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Consultation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
