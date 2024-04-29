<?php

namespace App\Repository;

use App\Entity\ModaliteTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModaliteTransport>
 *
 * @method ModaliteTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModaliteTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModaliteTransport[]    findAll()
 * @method ModaliteTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModaliteTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModaliteTransport::class);
    }

//    /**
//     * @return ModaliteTransport[] Returns an array of ModaliteTransport objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ModaliteTransport
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
