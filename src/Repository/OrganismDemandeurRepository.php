<?php

namespace App\Repository;

use App\Entity\OrganismDemandeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrganismDemandeur>
 *
 * @method OrganismDemandeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrganismDemandeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrganismDemandeur[]    findAll()
 * @method OrganismDemandeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganismDemandeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrganismDemandeur::class);
    }

//    /**
//     * @return OrganismDemandeur[] Returns an array of OrganismDemandeur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrganismDemandeur
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
