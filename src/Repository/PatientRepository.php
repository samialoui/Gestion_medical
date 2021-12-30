<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }
    public function findPatientById($idV)
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.id = :id
         ORDER BY t.id
         ASC'
        )
            ->setParameter('id', $idV)
        ;
        return $query->execute();
    }
    //retrouver toutes les hommes
    public function findPatientByHomme()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.sexe = :sexe
         ORDER BY t.sexe
         ASC'
        )
            ->setParameter('sexe', 'homme')
        ;
        return $query->execute();
    }
    //retrouver toutes les femmes
    public function findPatientByFemme()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.sexe = :sexe
         ORDER BY t.sexe
         ASC'
        )
            ->setParameter('sexe', 'femme')
        ;
        return $query->execute();
    }
    //retrouver touts personnes ont l'age supérieur a 50
    public function findPatientByAgeSup50()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.age >= :age
         ORDER BY t.age
         ASC'
        )
            ->setParameter('age', 50)
        ;
        return $query->execute();
    }
    //retrouver touts personnes ont l'age supérieur a 50
    public function findPatientByAgeInf50()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.age <= :age
         ORDER BY t.age
         ASC'
        )
            ->setParameter('age', 50)
        ;
        return $query->execute();
    }
    //retrouver touts personnes de tunis
    public function findPatientDeTunis()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.adr <= :adr
         ORDER BY t.adr
         ASC'
        )
            ->setParameter('adr', 'tunis')
        ;
        return $query->execute();
    }
    //retrouver touts personnes de marsa
    public function findPatientDeMarsa()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.adr <= :adr
         ORDER BY t.adr
         ASC'
        )
            ->setParameter('adr', 'marsa')
        ;
        return $query->execute();
    }
    //retrouver touts personnes de mednine
    public function findPatientDeMednine()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.adr <= :adr
         ORDER BY t.adr
         ASC'
        )
            ->setParameter('adr', 'mednine')
        ;
        return $query->execute();
    }
    //retrouver touts personnes de Metlaoui
    public function findPatientDeMetlaoui()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.adr <= :adr
         ORDER BY t.adr
         ASC'
        )
            ->setParameter('adr', 'metlaoui')
        ;
        return $query->execute();
    }
    //retrouver touts personnes de beja
    public function findPatientDeBeja()
    {
        $query = $this->_em->createQuery(
            'SELECT t
         FROM App\Entity\Patient t
         WHERE t.adr <= :adr
         ORDER BY t.adr
         ASC'
        )
            ->setParameter('adr', 'beja')
        ;
        return $query->execute();
    }


    // /**
    //  * @return Patient[] Returns an array of Patient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
