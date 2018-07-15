<?php

namespace App\Repository;

use App\Entity\CoatStyleColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoatStyleColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoatStyleColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoatStyleColor[]    findAll()
 * @method CoatStyleColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoatStyleColorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoatStyleColor::class);
    }

//    /**
//     * @return CoatStyleColor[] Returns an array of CoatStyleColor objects
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
    public function findOneBySomeField($value): ?CoatStyleColor
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
