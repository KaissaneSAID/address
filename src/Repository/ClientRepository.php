<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Client>
 *
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

//    /**
//     * @return Client[] Returns an array of Client objects
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

// ClientRepository.php

public function findByNom(string $nom): array
{
    return $this->createQueryBuilder('c')
        ->andWhere('c.nom LIKE :nom')
        ->setParameter('nom', '%' . $nom . '%')
        ->getQuery()
        ->getResult();
}
public function findByAddress(string $ipaddress): array
{
    return $this->createQueryBuilder('c')
        ->andWhere('c.ipaddress = :ipaddress')
        ->setParameter('ipaddress', $ipaddress)
        ->getQuery()
        ->getResult();
}

}
