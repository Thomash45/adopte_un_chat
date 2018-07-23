<?php

namespace App\Repository;

use App\Entity\Announce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Announce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Announce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Announce[]    findAll()
 * @method Announce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnounceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Announce::class);
    }

    /**
     * @return Announce[] Returns an array of Announce objects
     */
    public function findBySearchGlobal($city,$dep,$reg,$race)
    {
        if ($city != ""){
            $key = 'city';
            $val = $city;
        }elseif ($dep != ""){
            $key = 'departement';
            $val = $dep;
        }else{
            $key = 'region';
            $val = $reg;
        }

        if ($race != "") {
            $keyrace = 'race';
            $valrace = $race;
        }

        return $this->createQueryBuilder('a')
            ->andWhere('a.'.$key.' = :val')
            ->andWhere('a.'.$keyrace.' = :valrace')
            ->setParameter('val', $val)
            ->setParameter('valrace', $race)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Announce
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
