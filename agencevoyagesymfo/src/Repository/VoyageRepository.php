<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Voyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Voyage>
 *
 * @method Voyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voyage[]    findAll()
 * @method Voyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voyage::class);
    }

    // Dans votre contrôleur ou service Symfony


    public function findVoyageWhereModaliteTransport($modaliteTransport): array
    {
      // On commence par créer un QueryBuilder, et on donne en paramètre un alias de la table dans laquelle on va chercher. Dans tous les cas, comme on est dans FilmRepository, ce sera dans la table film qu'on cherchera, même si on met f, ou F, ou autre chose. C'est un alias.
        return $this->createQueryBuilder("voyage")
        ->join("voyage.modaliteTransport", "modaliteTransport")
        ->join("voyage.endroit", "endroit")

        // On précise la clause WHERE :
        ->where("modaliteTransport.nom = :nom")
        ->setMaxResults(10)
        // On lui donne le paramètre qu'on lui a promis c'est comme bindParam avec PDO : (les ':' sont facultatifs)
        ->setParameter(":nom", $modaliteTransport)
        // On exécute la requête :
        ->getQuery()
        // Et enfin on récupère le résultat :
        ->getResult();
    }


    public function findVoyageParPays($pays): array
    {
      // On commence par créer un QueryBuilder, et on donne en paramètre un alias de la table dans laquelle on va chercher. Dans tous les cas, comme on est dans FilmRepository, ce sera dans la table film qu'on cherchera, même si on met f, ou F, ou autre chose. C'est un alias.
        return $this->createQueryBuilder("voyage")
        ->join("voyage.endroit", "endroit")
        ->join("endroit.pays", "pays")

        // On précise la clause WHERE :
        ->where("pays.nom = :nom")
        ->setMaxResults(10)
        // On lui donne le paramètre qu'on lui a promis c'est comme bindParam avec PDO : (les ':' sont facultatifs)
        ->setParameter(":nom", $pays)
        // On exécute la requête :
        ->getQuery()
        // Et enfin on récupère le résultat :
        ->getResult();
    }

    public function findVoyageParNom(string $nom): ?Voyage
    {
        return $this->createQueryBuilder('voyage')
            ->where('voyage.nom = :nom')
            ->setParameter('nom', $nom)
            ->getQuery()
            ->getOneOrNullResult();  // Utilisation de getOneOrNullResult pour un seul résultat
    }
    
    public function findAllByUser(User $user): array
    {
        return $this->createQueryBuilder('voyage')
            ->join('voyage.user', 'user')
            ->where('user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }


    public function findAllwithAll(){
        return $this->createQueryBuilder("voyage")
        ->join("voyage.modaliteNuit", "modaliteNuit")
        ->join("voyage.modaliteTransport", "transport")
        ->join("voyage.endroit", "endroit")
        ->join("endroit.pays", "pays")

        // On exécute la requête :
        ->getQuery()
        // Et enfin on récupère le résultat :
        ->getResult();

    }
//    /**
//     * @return Voyage[] Returns an array of Voyage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Voyage
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
