<?php
/**
 * Created by PhpStorm.
 * User: mateussousap
 * Date: 10/08/2015
 * Time: 21:31
 */

namespace Music\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class BandRepository extends EntityRepository
{
    public function getByRecordId(EntityManager $em, $recordId)
    {
        $qb = $em->createQueryBuilder();
        $list = $qb->select('b')
                ->from('band', 'b')
                ->where('b.recordsId = :record')
                ->setParameter('record', $recordId);

        var_dump($list->getParameter('name'));

        foreach($list as $l) {
            var_dump($l."<br/>");
        }

        return $list;
    }
}