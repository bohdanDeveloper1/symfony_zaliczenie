<?php

namespace App\Repository;

use App\Entity\IssueComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IssueComment>
 *
 * @method IssueComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueComment[]    findAll()
 * @method IssueComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssueCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssueComment::class);
    }

    public function save(IssueComment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IssueComment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
