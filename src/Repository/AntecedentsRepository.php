<?php

namespace App\Repository;

use App\Entity\Antecedents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Antecedents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Antecedents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Antecedents[]    findAll()
 * @method Antecedents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AntecedentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Antecedents::class);
    }
    public function findAntecedentById($idV)
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Antecedents t
         WHERE t.id = :id
         ORDER BY t.id
         ASC'
        )
            ->setParameter('id', $idV)
        ;
        return $query->execute();
    }

    // /**
    //  * @return Antecedents[] Returns an array of Antecedents objects
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
    public function findOneBySomeField($value): ?Antecedents
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
