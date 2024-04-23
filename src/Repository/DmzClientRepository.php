<?php

namespace App\Repository;

use App\Entity\DmzClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DmzClient>
 *
 * @method DmzClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method DmzClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method DmzClient[]    findAll()
 * @method DmzClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DmzClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DmzClient::class);
    }

//    /**
//     * @return DmzClient[] Returns an array of DmzClient objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DmzClient
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function findBybenef(string $benef): array
{
    return $this->createQueryBuilder('b')
        ->andWhere('b.affectation LIKE :affectation')
        ->setParameter('affectation', '%' . $benef . '%')
        ->getQuery()
        ->getResult();
}
}
