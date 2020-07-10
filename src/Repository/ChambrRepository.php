<?php

namespace App\Repository;

use App\Entity\Chambr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Chambr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chambr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chambr[]    findAll()
 * @method Chambr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChambrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chambr::class);
    }

    // /**
    //  * @return Chambr[] Returns an array of Chambr objects
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
    public function findOneBySomeField($value): ?Chambr
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
