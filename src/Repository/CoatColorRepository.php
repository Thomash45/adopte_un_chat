<?php

namespace App\Repository;

use App\Entity\CoatColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoatColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoatColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoatColor[]    findAll()
 * @method CoatColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoatColorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoatColor::class);
    }

//    /**
//     * @return CoatColor[] Returns an array of CoatColor objects
//     */
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
    public function findOneBySomeField($value): ?CoatColor
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
