<?php

namespace App\Repository;

use App\Entity\ContactResa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactResa>
 *
 * @method ContactResa|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactResa|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactResa[]    findAll()
 * @method ContactResa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactResaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactResa::class);
    }

//    /**
//     * @return ContactResa[] Returns an array of ContactResa objects
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

//    public function findOneBySomeField($value): ?ContactResa
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
