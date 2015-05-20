<?php

namespace User\OrderBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class TuoyundanRepository extends EntityRepository
{
    public function  getAll($waifa, $dateStart, $dateEnd, $name, $awbno)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('yd')->from('UserOrderBundle:Tuoyundan', 'yd')->where('yd.waifa = :waifa')->setParameter(
                "waifa", $waifa);
        if ($dateStart && $dateEnd) {
            $qb->andWhere("yd.lastUpdated >= :dateStart")->setParameter(
                "dateStart", $dateStart);
            $qb->andWhere("yd.lastUpdated <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        } elseif ($dateStart) {
            $qb->andWhere("yd.lastUpdated >= :dateStart")->setParameter(
                "dateStart", $dateStart);
        } elseif ($dateEnd) {
            $qb->andWhere("yd.lastUpdated <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }
        if ($name) {
            $qb->andWhere("yd.fahuomingcheng like :name")->setParameter(
                "name", '%' . $name.'%');
        }
        if ($awbno) {
            $qb->andWhere("yd.awbno like :awbno")->setParameter(
                "awbno", '%' . $awbno.'%');
        }


        $query = $qb->getQuery();
        $list = $query->getResult();
        return $list;
    }

//    public function page($pageNo, $maxPerPage,$waifa)
//    {
//        $queryBuilder = $this->getEntityManager()->createQueryBuilder()
//            ->select('yd')->from('UserOrderBundle:Tuoyundan', 'yd')->where('yd.waifa = ?1');
//        $queryBuilder->setParameter(1, $waifa);
//        $adapter = new DoctrineORMAdapter($queryBuilder);
//        $pagerfanta = new Pagerfanta($adapter);
//        $pagerfanta->setMaxPerPage($maxPerPage);
//        $pagerfanta->setCurrentPage($pageNo);
//        return $pagerfanta;
//    }

    /**
     * 查询客户现付收银
     * @param $dateStart
     * @param $dateEnd
     * @param $name
     * @param $awbno
     * @param $xianfu
     * @return array
     */
    public function xianfu($dateStart, $dateEnd, $name, $awbno,$xianfu)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('yd')->from('UserOrderBundle:Tuoyundan', 'yd')->where('yd.xianfu > 0');
        if ($dateStart && $dateEnd) {
            $qb->andWhere("yd.lastUpdated >= :dateStart")->setParameter(
                "dateStart", $dateStart);
            $qb->andWhere("yd.lastUpdated <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        } elseif ($dateStart) {
            $qb->andWhere("yd.lastUpdated >= :dateStart")->setParameter(
                "dateStart", $dateStart);
        } elseif ($dateEnd) {
            $qb->andWhere("yd.lastUpdated <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }
        if($xianfu != '') {
                $qb->andWhere("yd.xianfushouyin = :xianfu")->setParameter(
                    "xianfu", $xianfu);
        }
        if ($name) {
            $qb->andWhere("yd.fahuomingcheng like :name")->setParameter(
                "name", '%' . $name.'%');
        }
        if ($awbno) {
            $qb->andWhere("yd.awbno like :awbno")->setParameter(
                "awbno", '%' . $awbno.'%');
        }
        $query = $qb->getQuery();
        $list = $query->getResult();
        return $list;
    }

    public function qiankuan($dateStart, $dateEnd, $name, $awbno,$qiankuan)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('yd')->from('UserOrderBundle:Tuoyundan', 'yd')->where('yd.huidanfu > 0 or yd.yuejie > 0');
        if ($dateStart && $dateEnd) {
            $qb->andWhere("yd.lastUpdated >= :dateStart")->setParameter(
                "dateStart", $dateStart);
            $qb->andWhere("yd.lastUpdated <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        } elseif ($dateStart) {
            $qb->andWhere("yd.lastUpdated >= :dateStart")->setParameter(
                "dateStart", $dateStart);
        } elseif ($dateEnd) {
            $qb->andWhere("yd.lastUpdated <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }

        if($qiankuan != '') {
            $qb->andWhere("yd.qiankuanshouyin = :qiankuan")->setParameter(
                "qiankuan", $qiankuan);
        }
        if ($name) {
            $qb->andWhere("yd.fahuomingcheng like :name")->setParameter(
                "name", '%' . $name.'%');
        }
        if ($awbno) {
            $qb->andWhere("yd.awbno like :awbno")->setParameter(
                "awbno", '%' . $awbno.'%');
        }
        $query = $qb->getQuery();
        $list = $query->getResult();
        return $list;
    }


}