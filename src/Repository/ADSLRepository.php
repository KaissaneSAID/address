<?php

namespace App\Repository;

use App\Entity\ADSL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ADSL>
 *
 * @method ADSL|null find($id, $lockMode = null, $lockVersion = null)
 * @method ADSL|null findOneBy(array $criteria, array $orderBy = null)
 * @method ADSL[]    findAll()
 * @method ADSL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ADSLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ADSL::class);
    }

//    /**
//     * @return ADSL[] Returns an array of ADSL objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ADSL
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
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
