<?php

namespace App\Repository;

use App\Entity\CTechnique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CTechnique>
 *
 * @method CTechnique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CTechnique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CTechnique[]    findAll()
 * @method CTechnique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CTechniqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CTechnique::class);
    }

//    /**
//     * @return CTechnique[] Returns an array of CTechnique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CTechnique
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
