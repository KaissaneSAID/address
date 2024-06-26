<?php

namespace App\Repository;

use App\Entity\Ls;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ls>
 *
 * @method Ls|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ls|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ls[]    findAll()
 * @method Ls[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ls::class);
    }

//    /**
//     * @return Ls[] Returns an array of Ls objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ls
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

public function findBybenef(string $benef): array
{
    return $this->createQueryBuilder('b')
        ->andWhere('b.beneficiaire LIKE :beneficiaire')
        ->setParameter('beneficiaire', '%' . $benef . '%')
        ->getQuery()
        ->getResult();
}
}
