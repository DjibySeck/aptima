<?php

namespace App\Repository;

use App\Entity\ReseauIncendie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReseauIncendie>
 *
 * @method ReseauIncendie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReseauIncendie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReseauIncendie[]    findAll()
 * @method ReseauIncendie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReseauIncendieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReseauIncendie::class);
    }

    public function save(ReseauIncendie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ReseauIncendie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ReseauIncendie[] Returns an array of ReseauIncendie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReseauIncendie
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
