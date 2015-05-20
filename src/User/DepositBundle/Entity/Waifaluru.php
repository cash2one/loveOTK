<?php
namespace User\DepositBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 外发录入
 * @ORM\Entity(repositoryClass="User\DepositBundle\Repository\WaifaluruRepository")
 * @ORM\Table(name="dd_waifaluru")
 */
class Waifaluru
{

    public function __construct()
    {
        $this->dateZhongzhuan = new \DateTime();
        // $this->deleted = false;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 托运单id
     * @ORM\Column(name="tuoyundan_id",type="integer",nullable=true,options={"comment" = "托运单id"})
     */
    private $tuoyundanId;

    /**
     * @ORM\Column(name="date_zhongzhuan",type="datetime",nullable=true,options={"comment" = "中转时间"})
     */
    private $dateZhongzhuan; #中转时间

    /**
     *  承运公司
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $chengyungongsi; #承运公司

    /**
     * 中转单号
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $zhongzhuandan;#中转单号

    /**
     *    本地电话
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $bendidianhua;#本地电话

    /**
     *   提货电话
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $tihuodianhua;#提货电话


    /**
     *   联系人
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $lianxiren;

    /**
     *    联系地址
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $lianxidizhi;

    /**
     * 重量（KG）
     * @ORM\Column(type="integer",nullable=true)
     */
    private $zhongliang;

    /**
     *  体积（立方米）
     * @ORM\Column(type="integer",nullable=true)
     */
    private $tiji;

    /**
     *    外发员
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $waifayuan;

    /**
     * @ORM\Column(name="date_daoda",type="datetime",nullable=true,options={"comment" = "到达时间"})
     */
    private $dateDaoda; #到达时间


    /**
     *  应付运费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "应付运费"})
     */
    private $yingfuyunfei;
    /**
     *  应付送货费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "应付送货费"})
     */
    private $yingfusonghuofei;
    /**
     *  应付其他
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "应付其他"})
     */
    private $yingfuqita;
    /**
     *  预付运费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "预付运费"})
     */
    private $yufuyunfei;

    //中转总额 （计算出来） 应付运费 + 应付送货费 + 应付其他 - 预付运费 不存
    private $zhongzhuanzonge;

    public function getZhongzhuanzonge()
    {
        $zhongzhuanzonge = $this->getYingfuyunfei() + $this->getYingfusonghuofei() + $this->getYingfuqita() - $this->getYufuyunfei();
        return $zhongzhuanzonge;
    }

    /**
     *  到付总额 到（计算） 代收货款 +  到付运费  后台计算出来 保留  审核
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "到付总额"})
     */
    private $daofuzonge;

    //应收余额（= 到付- 中转）
    //应付余额（=中转 - 到付）
    //   结款金额 不存
    private $jiesuanjine;

    public function getjiesuanjine()
    {
        $jiesuanjine = $this->getDaofuzonge() - $this->getZhongzhuanzonge();
        return $jiesuanjine;
    }


    /**
     *   中转结算方式
     * @ORM\Column(type="string", length=255)
     */
    private $zhongzhuanjiesuanfangshi;

    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否审核"})
     */
    protected $shenhe;


    /**
     * @ORM\Column(name="date_created",type="datetime",nullable=true,options={"comment" = "创建时间"})
     */
    protected $dateCreated; #创建时间

    /**
     * @ORM\Column(name="last_updated",type="datetime",nullable=true,options={"comment" = "修改时间"})
     */
    protected $lastUpdated; #修改时间

    /**
     * @ORM\Column(name="create_by",type="string", length=32,nullable=true,options={"comment" = "创建人"})
     */
    protected $createBy; #创建人

    /**
     * @ORM\Column(name="last_updated_by",type="string",nullable=true, length=32,options={"comment" = "修改人"})
     */
    protected $lastUpdatedBy; #修改人

    /**
     *  现付
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "现付"})
     */
    private $xianfu;


    //现付收银 是或者否
    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否现付收银"})
     */
    private $xianfushouyin;

    /**
     *  现付收银方式
     * @ORM\Column(type="string", length=255,nullable=true,options={"comment" = "现付收银方式"})
     */
    private $xianfushouyinfangshi;

    /**
     * @ORM\Column(name="date_xianfushouyin",type="datetime",nullable=true,options={"comment" = "现付收银时间"})
     */
    private $datexianfushouyin;


    //结款收银 是或者否
    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否现付收银"})
     */
    private $jiekuanshouyin;

    /**
     *  结款收银方式
     * @ORM\Column(type="string", length=255,nullable=true,options={"comment" = "结款收银方式"})
     */
    private $jiekuanshouyinfangshi;

    /**
     * @ORM\Column(name="date_jiekuanshouyin",type="datetime",nullable=true,options={"comment" = "结款收银时间"})
     */
    private $datejiekuanshouyin;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tuoyundanId
     *
     * @param integer $tuoyundanId
     * @return Waifaluru
     */
    public function setTuoyundanId($tuoyundanId)
    {
        $this->tuoyundanId = $tuoyundanId;

        return $this;
    }

    /**
     * Get tuoyundanId
     *
     * @return integer
     */
    public function getTuoyundanId()
    {
        return $this->tuoyundanId;
    }

    /**
     * Set dateZhongzhuan
     *
     * @param \DateTime $dateZhongzhuan
     * @return Waifaluru
     */
    public function setDateZhongzhuan($dateZhongzhuan)
    {
        $this->dateZhongzhuan = $dateZhongzhuan;

        return $this;
    }

    /**
     * Get dateZhongzhuan
     *
     * @return \DateTime
     */
    public function getDateZhongzhuan()
    {
        return $this->dateZhongzhuan;
    }

    /**
     * Set chengyungongsi
     *
     * @param string $chengyungongsi
     * @return Waifaluru
     */
    public function setChengyungongsi($chengyungongsi)
    {
        $this->chengyungongsi = $chengyungongsi;

        return $this;
    }

    /**
     * Get chengyungongsi
     *
     * @return string
     */
    public function getChengyungongsi()
    {
        return $this->chengyungongsi;
    }

    /**
     * Set zhongzhuandan
     *
     * @param string $zhongzhuandan
     * @return Waifaluru
     */
    public function setZhongzhuandan($zhongzhuandan)
    {
        $this->zhongzhuandan = $zhongzhuandan;

        return $this;
    }

    /**
     * Get zhongzhuandan
     *
     * @return string
     */
    public function getZhongzhuandan()
    {
        return $this->zhongzhuandan;
    }

    /**
     * Set bendidianhua
     *
     * @param string $bendidianhua
     * @return Waifaluru
     */
    public function setBendidianhua($bendidianhua)
    {
        $this->bendidianhua = $bendidianhua;

        return $this;
    }

    /**
     * Get bendidianhua
     *
     * @return string
     */
    public function getBendidianhua()
    {
        return $this->bendidianhua;
    }

    /**
     * Set tihuodianhua
     *
     * @param string $tihuodianhua
     * @return Waifaluru
     */
    public function setTihuodianhua($tihuodianhua)
    {
        $this->tihuodianhua = $tihuodianhua;

        return $this;
    }

    /**
     * Get tihuodianhua
     *
     * @return string
     */
    public function getTihuodianhua()
    {
        return $this->tihuodianhua;
    }

    /**
     * Set lianxiren
     *
     * @param string $lianxiren
     * @return Waifaluru
     */
    public function setLianxiren($lianxiren)
    {
        $this->lianxiren = $lianxiren;

        return $this;
    }

    /**
     * Get lianxiren
     *
     * @return string
     */
    public function getLianxiren()
    {
        return $this->lianxiren;
    }

    /**
     * Set lianxidizhi
     *
     * @param string $lianxidizhi
     * @return Waifaluru
     */
    public function setLianxidizhi($lianxidizhi)
    {
        $this->lianxidizhi = $lianxidizhi;

        return $this;
    }

    /**
     * Get lianxidizhi
     *
     * @return string
     */
    public function getLianxidizhi()
    {
        return $this->lianxidizhi;
    }

    /**
     * Set zhongliang
     *
     * @param integer $zhongliang
     * @return Waifaluru
     */
    public function setZhongliang($zhongliang)
    {
        $this->zhongliang = $zhongliang;

        return $this;
    }

    /**
     * Get zhongliang
     *
     * @return integer
     */
    public function getZhongliang()
    {
        return $this->zhongliang;
    }

    /**
     * Set tiji
     *
     * @param integer $tiji
     * @return Waifaluru
     */
    public function setTiji($tiji)
    {
        $this->tiji = $tiji;

        return $this;
    }

    /**
     * Get tiji
     *
     * @return integer
     */
    public function getTiji()
    {
        return $this->tiji;
    }

    /**
     * Set waifayuan
     *
     * @param string $waifayuan
     * @return Waifaluru
     */
    public function setWaifayuan($waifayuan)
    {
        $this->waifayuan = $waifayuan;

        return $this;
    }

    /**
     * Get waifayuan
     *
     * @return string
     */
    public function getWaifayuan()
    {
        return $this->waifayuan;
    }

    /**
     * Set dateDaoda
     *
     * @param \DateTime $dateDaoda
     * @return Waifaluru
     */
    public function setDateDaoda($dateDaoda)
    {
        $this->dateDaoda = $dateDaoda;

        return $this;
    }

    /**
     * Get dateDaoda
     *
     * @return \DateTime
     */
    public function getDateDaoda()
    {
        return $this->dateDaoda;
    }


    /**
     * Set yufuyunfei
     *
     * @param float $yufuyunfei
     * @return Waifaluru
     */
    public function setYufuyunfei($yufuyunfei)
    {
        $this->yufuyunfei = $yufuyunfei;

        return $this;
    }

    /**
     * Get yufuyunfei
     *
     * @return float
     */
    public function getYufuyunfei()
    {
        return $this->yufuyunfei;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Waifaluru
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     * @return Waifaluru
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set createBy
     *
     * @param string $createBy
     * @return Waifaluru
     */
    public function setCreateBy($createBy)
    {
        $this->createBy = $createBy;

        return $this;
    }

    /**
     * Get createBy
     *
     * @return string
     */
    public function getCreateBy()
    {
        return $this->createBy;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param string $lastUpdatedBy
     * @return Waifaluru
     */
    public function setLastUpdatedBy($lastUpdatedBy)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;

        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return string
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }

    /**
     * Set zhongzhuanjiesuanfangshi
     *
     * @param string $zhongzhuanjiesuanfangshi
     * @return Waifaluru
     */
    public function setZhongzhuanjiesuanfangshi($zhongzhuanjiesuanfangshi)
    {
        $this->zhongzhuanjiesuanfangshi = $zhongzhuanjiesuanfangshi;

        return $this;
    }

    /**
     * Get zhongzhuanjiesuanfangshi
     *
     * @return string
     */
    public function getZhongzhuanjiesuanfangshi()
    {
        return $this->zhongzhuanjiesuanfangshi;
    }

    /**
     * Set shenhe
     *
     * @param boolean $shenhe
     * @return Waifaluru
     */
    public function setShenhe($shenhe)
    {
        $this->shenhe = $shenhe;

        return $this;
    }

    /**
     * Get shenhe
     *
     * @return boolean
     */
    public function getShenhe()
    {
        return $this->shenhe;
    }

    /**
     * Set daofuzonge
     *
     * @param float $daofuzonge
     * @return Waifaluru
     */
    public function setDaofuzonge($daofuzonge)
    {
        $this->daofuzonge = $daofuzonge;

        return $this;
    }

    /**
     * Get daofuzonge
     *
     * @return float
     */
    public function getDaofuzonge()
    {
        return $this->daofuzonge;
    }

    /**
     * Set xianfushouyin
     *
     * @param boolean $xianfushouyin
     * @return Waifaluru
     */
    public function setXianfushouyin($xianfushouyin)
    {
        $this->xianfushouyin = $xianfushouyin;

        return $this;
    }

    /**
     * Get xianfushouyin
     *
     * @return boolean
     */
    public function getXianfushouyin()
    {
        return $this->xianfushouyin;
    }

    /**
     * Set xianfushouyinfangshi
     *
     * @param string $xianfushouyinfangshi
     * @return Waifaluru
     */
    public function setXianfushouyinfangshi($xianfushouyinfangshi)
    {
        $this->xianfushouyinfangshi = $xianfushouyinfangshi;

        return $this;
    }

    /**
     * Get xianfushouyinfangshi
     *
     * @return string
     */
    public function getXianfushouyinfangshi()
    {
        return $this->xianfushouyinfangshi;
    }

    /**
     * Set datexianfushouyin
     *
     * @param \DateTime $datexianfushouyin
     * @return Waifaluru
     */
    public function setDatexianfushouyin($datexianfushouyin)
    {
        $this->datexianfushouyin = $datexianfushouyin;

        return $this;
    }

    /**
     * Get datexianfushouyin
     *
     * @return \DateTime
     */
    public function getDatexianfushouyin()
    {
        return $this->datexianfushouyin;
    }

    /**
     * Set jiekuanshouyin
     *
     * @param boolean $jiekuanshouyin
     * @return Waifaluru
     */
    public function setJiekuanshouyin($jiekuanshouyin)
    {
        $this->jiekuanshouyin = $jiekuanshouyin;

        return $this;
    }

    /**
     * Get jiekuanshouyin
     *
     * @return boolean
     */
    public function getJiekuanshouyin()
    {
        return $this->jiekuanshouyin;
    }

    /**
     * Set jiekuanshouyinfangshi
     *
     * @param string $jiekuanshouyinfangshi
     * @return Waifaluru
     */
    public function setJiekuanshouyinfangshi($jiekuanshouyinfangshi)
    {
        $this->jiekuanshouyinfangshi = $jiekuanshouyinfangshi;

        return $this;
    }

    /**
     * Get jiekuanshouyinfangshi
     *
     * @return string
     */
    public function getJiekuanshouyinfangshi()
    {
        return $this->jiekuanshouyinfangshi;
    }

    /**
     * Set datejiekuanshouyin
     *
     * @param \DateTime $datejiekuanshouyin
     * @return Waifaluru
     */
    public function setDatejiekuanshouyin($datejiekuanshouyin)
    {
        $this->datejiekuanshouyin = $datejiekuanshouyin;

        return $this;
    }

    /**
     * Get datejiekuanshouyin
     *
     * @return \DateTime
     */
    public function getDatejiekuanshouyin()
    {
        return $this->datejiekuanshouyin;
    }

    /**
     * Set xianfu
     *
     * @param float $xianfu
     * @return Waifaluru
     */
    public function setXianfu($xianfu)
    {
        $this->xianfu = $xianfu;

        return $this;
    }

    /**
     * Get xianfu
     *
     * @return float
     */
    public function getXianfu()
    {
        return $this->xianfu;
    }

    /**
     * Set yingfuyunfei
     *
     * @param float $yingfuyunfei
     * @return Waifaluru
     */
    public function setYingfuyunfei($yingfuyunfei)
    {
        $this->yingfuyunfei = $yingfuyunfei;

        return $this;
    }

    /**
     * Get yingfuyunfei
     *
     * @return float
     */
    public function getYingfuyunfei()
    {
        return $this->yingfuyunfei;
    }

    /**
     * Set yingfusonghuofei
     *
     * @param float $yingfusonghuofei
     * @return Waifaluru
     */
    public function setYingfusonghuofei($yingfusonghuofei)
    {
        $this->yingfusonghuofei = $yingfusonghuofei;

        return $this;
    }

    /**
     * Get yingfusonghuofei
     *
     * @return float
     */
    public function getYingfusonghuofei()
    {
        return $this->yingfusonghuofei;
    }

    /**
     * Set yingfuqita
     *
     * @param float $yingfuqita
     * @return Waifaluru
     */
    public function setYingfuqita($yingfuqita)
    {
        $this->yingfuqita = $yingfuqita;

        return $this;
    }

    /**
     * Get yingfuqita
     *
     * @return float
     */
    public function getYingfuqita()
    {
        return $this->yingfuqita;
    }
}
