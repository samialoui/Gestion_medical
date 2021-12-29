<?php

namespace App\Repository;

use App\Entity\Traitements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Traitements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traitements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traitements[]    findAll()
 * @method Traitements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraitementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Traitements::class);
    }
    public function findTraitementById($idV)
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Traitements t
         WHERE t.id = :id
         ORDER BY t.id
         ASC'
        )
            ->setParameter('id', $idV)
        ;
        return $query->execute();
    }
    // /**
    //  * @return Traitements[] Returns an array of Traitements objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Traitements
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
