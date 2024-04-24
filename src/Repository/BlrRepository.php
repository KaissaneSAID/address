<?php

namespace App\Repository;

use App\Entity\Blr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Blr>
 *
 * @method Blr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blr[]    findAll()
 * @method Blr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blr::class);
    }

//    /**
//     * @return Blr[] Returns an array of Blr objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Blr
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
