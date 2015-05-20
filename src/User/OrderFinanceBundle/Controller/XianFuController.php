<?php

namespace User\OrderFinanceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints\Null;
use Symfony\Component\Validator\Constraints\True;

class XianFuController extends Controller
{

    /**
     * 查出客户现金未付款
     * @Route("/order/xianfu")
     * @Method("GET")
     * @Template("UserOrderFinanceBundle:Xianfu:list.html.twig")
     */
    public function indexAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');//开始时间
        $dateEnd = $request->query->get('dateEnd');//结束时间
        $name = $request->query->get('name');//名字
        $awbno = $request->query->get('awbno');//订单号
        $xianfu =  $request->query->get('xianfu');
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('UserOrderBundle:Tuoyundan')->xianfu($dateStart,$dateEnd,$name,$awbno,$xianfu);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'name' =>$name,
            'awbno' => $awbno,
            'xianfu' => $xianfu
        );
    }

    /**
     * 查出客户现金未付款
     * @Route("/order/xianfu")
     * @Method("POST")
     * @Template("UserOrderFinanceBundle:Xianfu:table.html.twig")
     */
    public function xianfuAction(Request $request)
    {
        $dateStart = $request->request->get('dateStart');
        $dateEnd = $request->request->get('dateEnd');
        $name = $request->request->get('name');
        $awbno = $request->request->get('awbno');
        $xianfu =  $request->request->get('xianfu');
        $fangshi =  $request->request->get('fangshi');
        $em = $this->getDoctrine()->getManager();
        $ids = $request->request->get('ids');
        $check = $request->request->get('check');
        $arr = split(',', $ids);
        foreach ($arr as $id) {
            if (is_numeric($id)) {
                $entity = $em->getRepository('UserOrderBundle:Tuoyundan')->find($id);
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

        $list = $em->getRepository('UserOrderBundle:Tuoyundan')->xianfu($dateStart,$dateEnd,$name,$awbno,$xianfu);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'name' =>$name,
            'awbno' => $awbno,
            'xianfu' => $xianfu
        );
    }







}
