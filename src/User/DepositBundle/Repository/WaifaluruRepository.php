<?php

namespace User\DepositBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class WaifaluruRepository extends EntityRepository
{

    public function page($pageNo, $maxPerPage)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder()
            ->select('wf')->from('UserDepositBundle:Waifaluru', 'wf');
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage($maxPerPage);
        $pagerfanta->setCurrentPage($pageNo);
        return $pagerfanta;
    }
    
    /**
     * 
     * @param unknown $check  审核与否  1/0
     * @param unknown $dateStart
     * @param unknown $dateEnd
     * @param unknown $zhongzhuandan  中转单号
     * @param unknown $chengyungongsi  承运公司
     * @return multitype:
     */
    public function  getAll($check=null,$dateStart,$dateEnd,$zhongzhuandan,$chengyungongsi) {
    	$qb = $this->getEntityManager()->createQueryBuilder()
    	->select('yd')->from('UserDepositBundle:Waifaluru', 'yd');
    	
    	if($dateStart && $dateEnd){
    		$qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
    				"dateStart", $dateStart);
    		$qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
    				"dateEnd", $dateEnd);
    	}
    	elseif ($dateStart) {
    		$qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
    				"dateStart", $dateStart);
    	}
    	elseif ($dateEnd) {
    		$qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
    				"dateEnd", $dateEnd);
    	}
    	if($zhongzhuandan){
    	$qb->andWhere("yd.zhongzhuandan = :zhongzhuandan")->setParameter(
    			"zhongzhuandan", $zhongzhuandan);
    	}
    	if($chengyungongsi){
    	$qb->andWhere("yd.chengyungongsi like :chengyungongsi")->setParameter(
    			"chengyungongsi", '%' . $chengyungongsi.'%');
    	}
    	$query = $qb->orderBy("yd.lastUpdated","ASC")->getQuery();
    	$list = $query->getResult();
    	return $list;
    }

    /**
     *
     * @param unknown $check  审核与否  1/0
     * @param unknown $dateStart
     * @param unknown $dateEnd
     * @param unknown $zhongzhuandan  中转单号
     * @param unknown $chengyungongsi  承运公司
     * @return multitype:
     */
    public function  xianjie($dateStart,$dateEnd,$zhongzhuandan,$chengyungongsi,$shouyin) {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('yd')->from('UserDepositBundle:Waifaluru', 'yd')
            ->where("yd.shenhe=1 and (yd.zhongzhuanjiesuanfangshi = '现结' or  yd.yufuyunfei > 0)");
        if($dateStart && $dateEnd){
            $qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
                "dateStart", $dateStart);
            $qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }
        elseif ($dateStart) {
            $qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
                "dateStart", $dateStart);
        }
        elseif ($dateEnd) {
            $qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }

        if($shouyin != '') {
            $qb->andWhere("yd.xianfushouyin = :shouyin")->setParameter(
                "shouyin", $shouyin);
        }

        if($zhongzhuandan){
            $qb->andWhere("yd.zhongzhuandan like :zhongzhuandan")->setParameter(
                "zhongzhuandan", '%' . $zhongzhuandan.'%');
        }
        if($chengyungongsi){
            $qb->andWhere("yd.chengyungongsi like :chengyungongsi")->setParameter(
                "chengyungongsi", '%' . $chengyungongsi.'%');
        }
        $query = $qb->orderBy("yd.lastUpdated","ASC")->getQuery();
        $list = $query->getResult();
        return $list;
    }

    /**
     *
     * @param unknown $check  审核与否  1/0
     * @param unknown $dateStart
     * @param unknown $dateEnd
     * @param unknown $zhongzhuandan  中转单号
     * @param unknown $chengyungongsi  承运公司
     * @return multitype:
     */
    public function  qianfan($dateStart,$dateEnd,$zhongzhuandan,$chengyungongsi,$shouyin) {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('yd')->from('UserDepositBundle:Waifaluru', 'yd')
            ->where("yd.shenhe=1 and yd.zhongzhuanjiesuanfangshi = '欠款'");
        if($dateStart && $dateEnd){
            $qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
                "dateStart", $dateStart);
            $qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }
        elseif ($dateStart) {
            $qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
                "dateStart", $dateStart);
        }
        elseif ($dateEnd) {
            $qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }

        if($shouyin != '') {
            $qb->andWhere("yd.jiekuanshouyin = :shouyin")->setParameter(
                "shouyin", $shouyin);
        }

        if($zhongzhuandan){
            $qb->andWhere("yd.zhongzhuandan like :zhongzhuandan")->setParameter(
                "zhongzhuandan", '%' . $zhongzhuandan.'%');
        }
        if($chengyungongsi){
            $qb->andWhere("yd.chengyungongsi like :chengyungongsi")->setParameter(
                "chengyungongsi", '%' . $chengyungongsi.'%');
        }
        $query = $qb->orderBy("yd.lastUpdated","ASC")->getQuery();
        $list = $query->getResult();
        return $list;
    }

    /**
     *
     * @param unknown $check  审核与否  1/0
     * @param unknown $dateStart
     * @param unknown $dateEnd
     * @param unknown $zhongzhuandan  中转单号
     * @param unknown $chengyungongsi  承运公司
     * @return multitype:
     */
    public function  jiekuan($dateStart,$dateEnd,$zhongzhuandan,$chengyungongsi,$shouyin) {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('yd')->from('UserDepositBundle:Waifaluru', 'yd')
        ->where("yd.shenhe=1 and yd.zhongzhuanjiesuanfangshi != '现结'");
        if($dateStart && $dateEnd){
            $qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
                "dateStart", $dateStart);
            $qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }
        elseif ($dateStart) {
            $qb->andWhere("yd.dateZhongzhuan >= :dateStart")->setParameter(
                "dateStart", $dateStart);
        }
        elseif ($dateEnd) {
            $qb->andWhere("yd.dateZhongzhuan <= :dateEnd")->setParameter(
                "dateEnd", $dateEnd);
        }

        if($shouyin != '') {
            $qb->andWhere("yd.jiekuanshouyin = :shouyin")->setParameter(
                "shouyin", $shouyin);
        }

        if($zhongzhuandan){
            $qb->andWhere("yd.zhongzhuandan like :zhongzhuandan")->setParameter(
                "zhongzhuandan", '%' . $zhongzhuandan.'%');
        }
        if($chengyungongsi){
            $qb->andWhere("yd.chengyungongsi like :chengyungongsi")->setParameter(
                "chengyungongsi", '%' . $chengyungongsi.'%');
        }
        $query = $qb->orderBy("yd.lastUpdated","ASC")->getQuery();
        $list = $query->getResult();
        return $list;
    }

}