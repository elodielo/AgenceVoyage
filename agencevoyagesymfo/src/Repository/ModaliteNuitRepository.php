<?php

namespace App\Repository;

use App\Entity\ModaliteNuit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModaliteNuit>
 *
 * @method ModaliteNuit|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModaliteNuit|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModaliteNuit[]    findAll()
 * @method ModaliteNuit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModaliteNuitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModaliteNuit::class);
    }

//    /**
//     * @return ModaliteNuit[] Returns an array of ModaliteNuit objects
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

//    public function findOneBySomeField($value): ?ModaliteNuit
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
