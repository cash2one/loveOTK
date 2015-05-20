<?php

namespace User\DepositFinanceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ZhongZhuanController extends Controller
{

    /**
     * 查出中转现结款
     * @Route("/deposit/xianjie")
     * @Method("GET")
     * @Template("UserDepositFinanceBundle:Xianjie:list.html.twig")
     */
    public function cashAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');   //中转日期
        $dateEnd = $request->query->get('dateEnd');
        $zhongzhuandan = $request->query->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->query->get('chengyungongsi');//名字
        $shouyin =  $request->query->get('shouyin');
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->xianjie($dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi,$shouyin);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi,
            'shouyin'=> $shouyin
        );
    }

    /**
     * 查出中转现结款
     * @Route("/deposit/xianjie")
     * @Method("POST")
     * @Template("UserDepositFinanceBundle:Xianjie:table.html.twig")
     */
    public function xianjieAction(Request $request)
    {
        $dateStart = $request->request->get('dateStart');   //中转日期
        $dateEnd = $request->request->get('dateEnd');
        $zhongzhuandan = $request->request->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->request->get('chengyungongsi');
        $shouyin =  $request->request->get('shouyin');
        $fangshi =  $request->request->get('fangshi');
        $em = $this->getDoctrine()->getManager();
        $ids = $request->request->get('ids');
        $check = $request->request->get('check');
        $arr = split(',', $ids);
        foreach ($arr as $id) {
            if (is_numeric($id)) {
                $entity = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
                if($check){
                    if(!$entity->getXianfushouyin()) {
                        $entity->setXianfushouyin(True);
                        $entity->setXianfushouyinfangshi($fangshi);
                        $entity->setDatexianfushouyin(new \DateTime());
                    }
                }else {
                    if($entity->getXianfushouyin()) {
                        $entity->setXianfushouyin(False);
                        $entity->setXianfushouyinfangshi(Null);
                        $entity->setDatexianfushouyin(Null);
                    }
                }
            }
        }
        $em->flush();
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->xianjie($dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi,$shouyin);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi,
            'shouyin'=> $shouyin
        );
    }

    /**
     * 查出中转欠返
     * @Route("/deposit/qianfan")
     * @Method("GET")
     * @Template("UserDepositFinanceBundle:Qianfan:list.html.twig")
     */
    public function summaryAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');   //中转日期
        $dateEnd = $request->query->get('dateEnd');
        $zhongzhuandan = $request->query->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->query->get('chengyungongsi');//名字
        $shouyin =  $request->query->get('shouyin');
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->qianfan($dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi,$shouyin);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi,
            'shouyin'=> $shouyin
        );
    }


    /**
     * 查出中转欠返
     * @Route("/deposit/qianfan")
     * @Method("POST")
     * @Template("UserDepositFinanceBundle:Qianfan:table.html.twig")
     */
    public function qianfanAction(Request $request)
    {
        $dateStart = $request->request->get('dateStart');   //中转日期
        $dateEnd = $request->request->get('dateEnd');
        $zhongzhuandan = $request->request->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->request->get('chengyungongsi');
        $shouyin =  $request->request->get('shouyin');
        $fangshi =  $request->request->get('fangshi');
        $em = $this->getDoctrine()->getManager();
        $ids = $request->request->get('ids');
        $check = $request->request->get('check');
        $arr = split(',', $ids);
        foreach ($arr as $id) {
            if (is_numeric($id)) {
                $entity = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
                if($check){
                    if(!$entity->getJiekuanshouyin()) {
                        $entity->setJiekuanshouyin(True);
                        $entity->setJiekuanshouyinfangshi($fangshi);
                        $entity->setDatejiekuanshouyin(new \DateTime());
                    }
                }else {
                    if($entity->getJiekuanshouyin()) {
                        $entity->setJiekuanshouyin(False);
                        $entity->setJiekuanshouyinfangshi(Null);
                        $entity->setDatejiekuanshouyin(Null);
                    }
                }
            }
        }
        $em->flush();
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->qianfan($dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi,$shouyin);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi,
            'shouyin'=> $shouyin
        );
    }
    
    /**
     * 查出中转公司接收第三方欠款
     * @Route("/deposit/jiekuan")
     * @Method("GET")
     * @Template("UserDepositFinanceBundle:Jiekuan:list.html.twig")
     */
    public function paybackAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');   //中转日期
        $dateEnd = $request->query->get('dateEnd');
        $zhongzhuandan = $request->query->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->query->get('chengyungongsi');//名字
        $shouyin =  $request->query->get('shouyin');
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->jiekuan($dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi,$shouyin);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi,
            'shouyin'=> $shouyin
        );
    }

    /**
     * 查出中转公司接收第三方欠款
     * @Route("/deposit/jiekuan")
     * @Method("POST")
     * @Template("UserDepositFinanceBundle:Jiekuan:table.html.twig")
     */
    public function jiekuanAction(Request $request)
    {
        $dateStart = $request->request->get('dateStart');   //中转日期
        $dateEnd = $request->request->get('dateEnd');
        $zhongzhuandan = $request->request->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->request->get('chengyungongsi');
        $shouyin =  $request->request->get('shouyin');
        $fangshi =  $request->request->get('fangshi');
        $em = $this->getDoctrine()->getManager();
        $ids = $request->request->get('ids');
        $check = $request->request->get('check');
        $arr = split(',', $ids);
        foreach ($arr as $id) {
            if (is_numeric($id)) {
                $entity = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
                if($check){
                    if(!$entity->getJiekuanshouyin()) {
                        $entity->setJiekuanshouyin(True);
                        $entity->setJiekuanshouyinfangshi($fangshi);
                        $entity->setDatejiekuanshouyin(new \DateTime());
                    }
                }else {
                    if($entity->getJiekuanshouyin()) {
                        $entity->setJiekuanshouyin(False);
                        $entity->setJiekuanshouyinfangshi(Null);
                        $entity->setDatejiekuanshouyin(Null);
                    }
                }
            }
        }
        $em->flush();
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->jiekuan($dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi,$shouyin);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi,
            'shouyin'=> $shouyin
        );
    }




}
