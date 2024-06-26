<?php

namespace App\Repository;

use App\Entity\PlanAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanAddress>
 *
 * @method PlanAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanAddress[]    findAll()
 * @method PlanAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanAddress::class);
    }

//    /**
//     * @return PlanAddress[] Returns an array of PlanAddress objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlanAddress
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }



public function findByAddress(string $address): array
{
    return $this->createQueryBuilder('a')
        ->andWhere('a.address = :address')
        ->setParameter('address', $address)
        ->getQuery()
        ->getResult();
}
public function findByReceveur(string $receveur): array
{
    return $this->createQueryBuilder('a')
    ->andWhere('a.receveurclient LIKE :receveurclient')
    ->setParameter('receveurclient', '%' . $receveur . '%')
        ->getQuery()
        ->getResult();
}
public function findByType(string $type): array
{
    return $this->createQueryBuilder('a')
    ->andWhere('a.type LIKE :type')
    ->setParameter('type', '%' . $type . '%')
        ->getQuery()
        ->getResult();
}

}
