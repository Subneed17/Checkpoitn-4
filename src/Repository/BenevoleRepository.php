<?php

namespace App\Repository;

use App\Entity\Benevole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Benevole|null find($id, $lockMode = null, $lockVersion = null)
 * @method Benevole|null findOneBy(array $criteria, array $orderBy = null)
 * @method Benevole[]    findAll()
 * @method Benevole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BenevoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Benevole::class);
    }

     /**
      * @return Benevole[] Returns an array of Benevole objects
      */
    public function findAllByDate()
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.CaptureAt', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //   * @return Benevole[] Returns an array of Benevole objects
    //   */
    //   public function findAllYears($years)
    //   {
    //       return $this->createQueryBuilder('b')
    //         ->andWhere('b.CaptureAt = :val')
    //         ->setParameter('val', $years)
    //         ->orderBy('b.CaptureAt', 'ASC')
    //         ->getQuery()
    //         ->getResult()
    //       ;
    //   }


    // /**
    //  * @return Benevole[] Returns an array of Benevole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Benevole
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
