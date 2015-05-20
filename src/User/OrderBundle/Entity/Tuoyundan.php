<?php
namespace User\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 托运单
 * @ORM\Entity(repositoryClass="User\OrderBundle\Repository\TuoyundanRepository")
 * @ORM\Table(name="dd_tuoyundan")
 */
class Tuoyundan
{

    public function __construct()
    {
        $this->waifa = False;
        $this->xianfushouyin =FALSE;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 运单号码
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $awbno;

    /**
     * 目的城市
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * 线路
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $xianlu;

    /**
     * 交接方式
     * @ORM\Column(type="string", length=16)
     */
    private $jiaojiefangshi;


    /**
     *品名
     * @ORM\Column(type="string", length=255)
     */
    private $pinming;

    /**
     *件数
     * @ORM\Column(type="string",nullable=true, length=255)
     */
    private $jianshu;

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
     *  提货电话
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $tihuodianhua;

    /**
     *  提货地址
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $tihuodizhi;

    /**
     *  发货方名称
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $fahuomingcheng;

    /**
     *  发货方固话
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $fahuoguhua;

    /**
     *  发货方手机
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $fahuoshouji;

    /**
     *  收货方名称
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $shouhoumingcheng;

    /**
     *  收货方固话
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $shouhouguhua;

    /**
     *  收货方手机
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $shouhoushouji;

    /**
     *  回单张书
     * @ORM\Column(type="integer",nullable=true)
     */
    private $huidan;

    /**
     *  特殊要求
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $teshuyaoqiu;

    /**
     *  备注
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $beizhu;

    /**
     *   计费方式
     * @ORM\Column(type="string", length=255)
     */
    private $jifeifangshi;

    /**
     *  基本运费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "基本运费"})
     */
    private $jibenyunfei;

    /**
     *  提货费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "提货费"})
     */
    private $tihuofei;

    /**
     *  送货费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "送货费"})
     */
    private $songhuofei;


    /**
     *  中转费
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "中转费"})
     */
    private $zhongzhuanfei;

    /**
     *  代收货款
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "代收货款"})
     */
    private $daishouhuokuan;

    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否代收货款收银"})
     */
    private $daishouhuokuanshouyin;

    /**
     *
     * @ORM\Column(type="string", length=255,nullable=true,options={"comment" = "代收货款收银方式"})
     */
    private $daishouhuokuanshouyinfangshi;

    /**
     * @ORM\Column(name="date_daishouhuokuanshouyin",type="datetime",nullable=true,options={"comment" = "代收货款收银时间"})
     */
    private $datedaishouhuokuanshouyin;

    /**
     *  其他费用
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "其他费用"})
     */
    private $qitafeiyong;

    /**
     *   运费合计
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "运费"})
     */
    private $yunfei;


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

    /**
     *  到付
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "到付"})
     */
    private $daofu;

    /**
     *  回单付
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "回单付"})
     */
    private $huidanfu;

    /**
     *  月结
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "月结"})
     */
    private $yuejie;

    //欠款
    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否欠款收银"})
     */
    private $qiankuanshouyin;

    /**
     *
     * @ORM\Column(type="string", length=255,nullable=true,options={"comment" = "欠款收银方式"})
     */
    private $qiankuanshouyinfangshi;

    /**
     * @ORM\Column(name="date_qiankuanshouyin",type="datetime",nullable=true,options={"comment" = "欠款收银时间"})
     */
    private $dateqiankuanshouyin;

    /**
     *  回扣
     * @ORM\Column(type="float",nullable=true,options={"default" = 0,"comment" = "回扣"})
     */
    protected $huikou;

    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否回扣收银"})
     */
    private $huikoushouyin;

    /**
     *
     * @ORM\Column(type="string", length=255,nullable=true,options={"comment" = "回扣收银方式"})
     */
    private $huikoushouyinfangshi;

    /**
     * @ORM\Column(name="date_huikoushouyin",type="datetime",nullable=true,options={"comment" = "回扣收银时间"})
     */
    private $datehuikoushouyin;

    /**
     *   结算方式
     * @ORM\Column(type="string", length=255)
     */
    private $jiesuanfangshi;

    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否开发票"})
     */
    protected $fapiao;

    /**
     *   费用说明
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $feiyongshuoming;

    /**
     * @ORM\Column(type="boolean",nullable=true,options={"default" = 0,"comment" = "是否外发"})
     */
    protected $waifa;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set awbno
     *
     * @param string $awbno
     * @return Tuoyundan
     */
    public function setAwbno($awbno)
    {
        $this->awbno = $awbno;

        return $this;
    }

    /**
     * Get awbno
     *
     * @return string 
     */
    public function getAwbno()
    {
        return $this->awbno;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Tuoyundan
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set xianlu
     *
     * @param string $xianlu
     * @return Tuoyundan
     */
    public function setXianlu($xianlu)
    {
        $this->xianlu = $xianlu;

        return $this;
    }

    /**
     * Get xianlu
     *
     * @return string 
     */
    public function getXianlu()
    {
        return $this->xianlu;
    }

    /**
     * Set jiaojiefangshi
     *
     * @param string $jiaojiefangshi
     * @return Tuoyundan
     */
    public function setJiaojiefangshi($jiaojiefangshi)
    {
        $this->jiaojiefangshi = $jiaojiefangshi;

        return $this;
    }

    /**
     * Get jiaojiefangshi
     *
     * @return string 
     */
    public function getJiaojiefangshi()
    {
        return $this->jiaojiefangshi;
    }

    /**
     * Set pinming
     *
     * @param string $pinming
     * @return Tuoyundan
     */
    public function setPinming($pinming)
    {
        $this->pinming = $pinming;

        return $this;
    }

    /**
     * Get pinming
     *
     * @return string 
     */
    public function getPinming()
    {
        return $this->pinming;
    }

    /**
     * Set jianshu
     *
     * @param string $jianshu
     * @return Tuoyundan
     */
    public function setJianshu($jianshu)
    {
        $this->jianshu = $jianshu;

        return $this;
    }

    /**
     * Get jianshu
     *
     * @return string 
     */
    public function getJianshu()
    {
        return $this->jianshu;
    }

    /**
     * Set zhongliang
     *
     * @param integer $zhongliang
     * @return Tuoyundan
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
     * @return Tuoyundan
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
     * Set tihuodianhua
     *
     * @param string $tihuodianhua
     * @return Tuoyundan
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
     * Set tihuodizhi
     *
     * @param string $tihuodizhi
     * @return Tuoyundan
     */
    public function setTihuodizhi($tihuodizhi)
    {
        $this->tihuodizhi = $tihuodizhi;

        return $this;
    }

    /**
     * Get tihuodizhi
     *
     * @return string 
     */
    public function getTihuodizhi()
    {
        return $this->tihuodizhi;
    }

    /**
     * Set fahuomingcheng
     *
     * @param string $fahuomingcheng
     * @return Tuoyundan
     */
    public function setFahuomingcheng($fahuomingcheng)
    {
        $this->fahuomingcheng = $fahuomingcheng;

        return $this;
    }

    /**
     * Get fahuomingcheng
     *
     * @return string 
     */
    public function getFahuomingcheng()
    {
        return $this->fahuomingcheng;
    }

    /**
     * Set fahuoguhua
     *
     * @param string $fahuoguhua
     * @return Tuoyundan
     */
    public function setFahuoguhua($fahuoguhua)
    {
        $this->fahuoguhua = $fahuoguhua;

        return $this;
    }

    /**
     * Get fahuoguhua
     *
     * @return string 
     */
    public function getFahuoguhua()
    {
        return $this->fahuoguhua;
    }

    /**
     * Set fahuoshouji
     *
     * @param string $fahuoshouji
     * @return Tuoyundan
     */
    public function setFahuoshouji($fahuoshouji)
    {
        $this->fahuoshouji = $fahuoshouji;

        return $this;
    }

    /**
     * Get fahuoshouji
     *
     * @return string 
     */
    public function getFahuoshouji()
    {
        return $this->fahuoshouji;
    }

    /**
     * Set shouhoumingcheng
     *
     * @param string $shouhoumingcheng
     * @return Tuoyundan
     */
    public function setShouhoumingcheng($shouhoumingcheng)
    {
        $this->shouhoumingcheng = $shouhoumingcheng;

        return $this;
    }

    /**
     * Get shouhoumingcheng
     *
     * @return string 
     */
    public function getShouhoumingcheng()
    {
        return $this->shouhoumingcheng;
    }

    /**
     * Set shouhouguhua
     *
     * @param string $shouhouguhua
     * @return Tuoyundan
     */
    public function setShouhouguhua($shouhouguhua)
    {
        $this->shouhouguhua = $shouhouguhua;

        return $this;
    }

    /**
     * Get shouhouguhua
     *
     * @return string 
     */
    public function getShouhouguhua()
    {
        return $this->shouhouguhua;
    }

    /**
     * Set shouhoushouji
     *
     * @param string $shouhoushouji
     * @return Tuoyundan
     */
    public function setShouhoushouji($shouhoushouji)
    {
        $this->shouhoushouji = $shouhoushouji;

        return $this;
    }

    /**
     * Get shouhoushouji
     *
     * @return string 
     */
    public function getShouhoushouji()
    {
        return $this->shouhoushouji;
    }

    /**
     * Set huidan
     *
     * @param integer $huidan
     * @return Tuoyundan
     */
    public function setHuidan($huidan)
    {
        $this->huidan = $huidan;

        return $this;
    }

    /**
     * Get huidan
     *
     * @return integer 
     */
    public function getHuidan()
    {
        return $this->huidan;
    }

    /**
     * Set teshuyaoqiu
     *
     * @param string $teshuyaoqiu
     * @return Tuoyundan
     */
    public function setTeshuyaoqiu($teshuyaoqiu)
    {
        $this->teshuyaoqiu = $teshuyaoqiu;

        return $this;
    }

    /**
     * Get teshuyaoqiu
     *
     * @return string 
     */
    public function getTeshuyaoqiu()
    {
        return $this->teshuyaoqiu;
    }

    /**
     * Set beizhu
     *
     * @param string $beizhu
     * @return Tuoyundan
     */
    public function setBeizhu($beizhu)
    {
        $this->beizhu = $beizhu;

        return $this;
    }

    /**
     * Get beizhu
     *
     * @return string 
     */
    public function getBeizhu()
    {
        return $this->beizhu;
    }

    /**
     * Set jifeifangshi
     *
     * @param string $jifeifangshi
     * @return Tuoyundan
     */
    public function setJifeifangshi($jifeifangshi)
    {
        $this->jifeifangshi = $jifeifangshi;

        return $this;
    }

    /**
     * Get jifeifangshi
     *
     * @return string 
     */
    public function getJifeifangshi()
    {
        return $this->jifeifangshi;
    }

    /**
     * Set jibenyunfei
     *
     * @param float $jibenyunfei
     * @return Tuoyundan
     */
    public function setJibenyunfei($jibenyunfei)
    {
        $this->jibenyunfei = $jibenyunfei;

        return $this;
    }

    /**
     * Get jibenyunfei
     *
     * @return float 
     */
    public function getJibenyunfei()
    {
        return $this->jibenyunfei;
    }

    /**
     * Set tihuofei
     *
     * @param float $tihuofei
     * @return Tuoyundan
     */
    public function setTihuofei($tihuofei)
    {
        $this->tihuofei = $tihuofei;

        return $this;
    }

    /**
     * Get tihuofei
     *
     * @return float 
     */
    public function getTihuofei()
    {
        return $this->tihuofei;
    }

    /**
     * Set songhuofei
     *
     * @param float $songhuofei
     * @return Tuoyundan
     */
    public function setSonghuofei($songhuofei)
    {
        $this->songhuofei = $songhuofei;

        return $this;
    }

    /**
     * Get songhuofei
     *
     * @return float 
     */
    public function getSonghuofei()
    {
        return $this->songhuofei;
    }

    /**
     * Set zhongzhuanfei
     *
     * @param float $zhongzhuanfei
     * @return Tuoyundan
     */
    public function setZhongzhuanfei($zhongzhuanfei)
    {
        $this->zhongzhuanfei = $zhongzhuanfei;

        return $this;
    }

    /**
     * Get zhongzhuanfei
     *
     * @return float 
     */
    public function getZhongzhuanfei()
    {
        return $this->zhongzhuanfei;
    }

    /**
     * Set daishouhuokuan
     *
     * @param float $daishouhuokuan
     * @return Tuoyundan
     */
    public function setDaishouhuokuan($daishouhuokuan)
    {
        $this->daishouhuokuan = $daishouhuokuan;

        return $this;
    }

    /**
     * Get daishouhuokuan
     *
     * @return float 
     */
    public function getDaishouhuokuan()
    {
        return $this->daishouhuokuan;
    }

    /**
     * Set qitafeiyong
     *
     * @param float $qitafeiyong
     * @return Tuoyundan
     */
    public function setQitafeiyong($qitafeiyong)
    {
        $this->qitafeiyong = $qitafeiyong;

        return $this;
    }

    /**
     * Get qitafeiyong
     *
     * @return float 
     */
    public function getQitafeiyong()
    {
        return $this->qitafeiyong;
    }

    /**
     * Set yunfei
     *
     * @param float $yunfei
     * @return Tuoyundan
     */
    public function setYunfei($yunfei)
    {
        $this->yunfei = $yunfei;

        return $this;
    }

    /**
     * Get yunfei
     *
     * @return float 
     */
    public function getYunfei()
    {
        return $this->yunfei;
    }

    /**
     * Set xianfu
     *
     * @param float $xianfu
     * @return Tuoyundan
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
     * Set daofu
     *
     * @param float $daofu
     * @return Tuoyundan
     */
    public function setDaofu($daofu)
    {
        $this->daofu = $daofu;

        return $this;
    }

    /**
     * Get daofu
     *
     * @return float 
     */
    public function getDaofu()
    {
        return $this->daofu;
    }

    /**
     * Set huidanfu
     *
     * @param float $huidanfu
     * @return Tuoyundan
     */
    public function setHuidanfu($huidanfu)
    {
        $this->huidanfu = $huidanfu;

        return $this;
    }

    /**
     * Get huidanfu
     *
     * @return float 
     */
    public function getHuidanfu()
    {
        return $this->huidanfu;
    }

    /**
     * Set yuejie
     *
     * @param float $yuejie
     * @return Tuoyundan
     */
    public function setYuejie($yuejie)
    {
        $this->yuejie = $yuejie;

        return $this;
    }

    /**
     * Get yuejie
     *
     * @return float 
     */
    public function getYuejie()
    {
        return $this->yuejie;
    }

    /**
     * Set huikou
     *
     * @param float $huikou
     * @return Tuoyundan
     */
    public function setHuikou($huikou)
    {
        $this->huikou = $huikou;

        return $this;
    }

    /**
     * Get huikou
     *
     * @return float 
     */
    public function getHuikou()
    {
        return $this->huikou;
    }

    /**
     * Set jiesuanfangshi
     *
     * @param string $jiesuanfangshi
     * @return Tuoyundan
     */
    public function setJiesuanfangshi($jiesuanfangshi)
    {
        $this->jiesuanfangshi = $jiesuanfangshi;

        return $this;
    }

    /**
     * Get jiesuanfangshi
     *
     * @return string 
     */
    public function getJiesuanfangshi()
    {
        return $this->jiesuanfangshi;
    }

    /**
     * Set fapiao
     *
     * @param boolean $fapiao
     * @return Tuoyundan
     */
    public function setFapiao($fapiao)
    {
        $this->fapiao = $fapiao;

        return $this;
    }

    /**
     * Get fapiao
     *
     * @return boolean 
     */
    public function getFapiao()
    {
        return $this->fapiao;
    }

    /**
     * Set feiyongshuoming
     *
     * @param string $feiyongshuoming
     * @return Tuoyundan
     */
    public function setFeiyongshuoming($feiyongshuoming)
    {
        $this->feiyongshuoming = $feiyongshuoming;

        return $this;
    }

    /**
     * Get feiyongshuoming
     *
     * @return string 
     */
    public function getFeiyongshuoming()
    {
        return $this->feiyongshuoming;
    }

    /**
     * Set waifa
     *
     * @param boolean $waifa
     * @return Tuoyundan
     */
    public function setWaifa($waifa)
    {
        $this->waifa = $waifa;

        return $this;
    }

    /**
     * Get waifa
     *
     * @return boolean 
     */
    public function getWaifa()
    {
        return $this->waifa;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Tuoyundan
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
     * @return Tuoyundan
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
     * @return Tuoyundan
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
     * @return Tuoyundan
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
     * Set daishouhuokuanshouyin
     *
     * @param boolean $daishouhuokuanshouyin
     * @return Tuoyundan
     */
    public function setDaishouhuokuanshouyin($daishouhuokuanshouyin)
    {
        $this->daishouhuokuanshouyin = $daishouhuokuanshouyin;

        return $this;
    }

    /**
     * Get daishouhuokuanshouyin
     *
     * @return boolean 
     */
    public function getDaishouhuokuanshouyin()
    {
        return $this->daishouhuokuanshouyin;
    }

    /**
     * Set daishouhuokuanshouyinfangshi
     *
     * @param string $daishouhuokuanshouyinfangshi
     * @return Tuoyundan
     */
    public function setDaishouhuokuanshouyinfangshi($daishouhuokuanshouyinfangshi)
    {
        $this->daishouhuokuanshouyinfangshi = $daishouhuokuanshouyinfangshi;

        return $this;
    }

    /**
     * Get daishouhuokuanshouyinfangshi
     *
     * @return string 
     */
    public function getDaishouhuokuanshouyinfangshi()
    {
        return $this->daishouhuokuanshouyinfangshi;
    }

    /**
     * Set datedaishouhuokuanshouyin
     *
     * @param \DateTime $datedaishouhuokuanshouyin
     * @return Tuoyundan
     */
    public function setDatedaishouhuokuanshouyin($datedaishouhuokuanshouyin)
    {
        $this->datedaishouhuokuanshouyin = $datedaishouhuokuanshouyin;

        return $this;
    }

    /**
     * Get datedaishouhuokuanshouyin
     *
     * @return \DateTime 
     */
    public function getDatedaishouhuokuanshouyin()
    {
        return $this->datedaishouhuokuanshouyin;
    }

    /**
     * Set xianfushouyin
     *
     * @param boolean $xianfushouyin
     * @return Tuoyundan
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
     * @return Tuoyundan
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
     * @return Tuoyundan
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
     * Set qiankuanshouyin
     *
     * @param boolean $qiankuanshouyin
     * @return Tuoyundan
     */
    public function setQiankuanshouyin($qiankuanshouyin)
    {
        $this->qiankuanshouyin = $qiankuanshouyin;

        return $this;
    }

    /**
     * Get qiankuanshouyin
     *
     * @return boolean 
     */
    public function getQiankuanshouyin()
    {
        return $this->qiankuanshouyin;
    }

    /**
     * Set qiankuanshouyinfangshi
     *
     * @param string $qiankuanshouyinfangshi
     * @return Tuoyundan
     */
    public function setQiankuanshouyinfangshi($qiankuanshouyinfangshi)
    {
        $this->qiankuanshouyinfangshi = $qiankuanshouyinfangshi;

        return $this;
    }

    /**
     * Get qiankuanshouyinfangshi
     *
     * @return string 
     */
    public function getQiankuanshouyinfangshi()
    {
        return $this->qiankuanshouyinfangshi;
    }

    /**
     * Set dateqiankuanshouyin
     *
     * @param \DateTime $dateqiankuanshouyin
     * @return Tuoyundan
     */
    public function setDateqiankuanshouyin($dateqiankuanshouyin)
    {
        $this->dateqiankuanshouyin = $dateqiankuanshouyin;

        return $this;
    }

    /**
     * Get dateqiankuanshouyin
     *
     * @return \DateTime 
     */
    public function getDateqiankuanshouyin()
    {
        return $this->dateqiankuanshouyin;
    }

    /**
     * Set huikoushouyin
     *
     * @param boolean $huikoushouyin
     * @return Tuoyundan
     */
    public function setHuikoushouyin($huikoushouyin)
    {
        $this->huikoushouyin = $huikoushouyin;

        return $this;
    }

    /**
     * Get huikoushouyin
     *
     * @return boolean 
     */
    public function getHuikoushouyin()
    {
        return $this->huikoushouyin;
    }

    /**
     * Set huikoushouyinfangshi
     *
     * @param string $huikoushouyinfangshi
     * @return Tuoyundan
     */
    public function setHuikoushouyinfangshi($huikoushouyinfangshi)
    {
        $this->huikoushouyinfangshi = $huikoushouyinfangshi;

        return $this;
    }

    /**
     * Get huikoushouyinfangshi
     *
     * @return string 
     */
    public function getHuikoushouyinfangshi()
    {
        return $this->huikoushouyinfangshi;
    }

    /**
     * Set datehuikoushouyin
     *
     * @param \DateTime $datehuikoushouyin
     * @return Tuoyundan
     */
    public function setDatehuikoushouyin($datehuikoushouyin)
    {
        $this->datehuikoushouyin = $datehuikoushouyin;

        return $this;
    }

    /**
     * Get datehuikoushouyin
     *
     * @return \DateTime 
     */
    public function getDatehuikoushouyin()
    {
        return $this->datehuikoushouyin;
    }
}
