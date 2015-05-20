<?php

namespace User\OrderFinanceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class QiankuanController extends Controller
{

    /**
     * 查出客户现金未付款
     * @Route("/order/qiankuan")
     * @Method("GET")
     * @Template("UserOrderFinanceBundle:Qiankuan:list.html.twig")
     */
    public function indexAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');
        $dateEnd = $request->query->get('dateEnd');
        $name = $request->query->get('name');
        $awbno = $request->query->get('awbno');
        $qiankuan =  $request->query->get('qiankuan');
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('UserOrderBundle:Tuoyundan')->qiankuan($dateStart,$dateEnd,$name,$awbno,$qiankuan);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'name' =>$name,
            'awbno' => $awbno,
            'qiankuan' => $qiankuan
        );
    }

    /**
     * 查出客户现金未付款
     * @Route("/order/qiankuan")
     * @Method("POST")
     * @Template("UserOrderFinanceBundle:Qiankuan:table.html.twig")
     */
    public function qiankuanAction(Request $request)
    {
        $dateStart = $request->request->get('dateStart');
        $dateEnd = $request->request->get('dateEnd');
        $name = $request->request->get('name');
        $awbno = $request->request->get('awbno');
        $qiankuan =  $request->request->get('qiankuan');
        $em = $this->getDoctrine()->getManager();
        $fangshi =  $request->request->get('fangshi');
        $ids = $request->request->get('ids');
        $check = $request->request->get('check');
        $arr = split(',', $ids);
        foreach ($arr as $id) {
            if (is_numeric($id)) {
                $entity = $em->getRepository('UserOrderBundle:Tuoyundan')->find($id);
                if($check){
                    if(!$entity->getQiankuanshouyin()) {
                        $entity->setQiankuanshouyin(True);
                        $entity->setQiankuanshouyinfangshi($fangshi);
                        $entity->setDateqiankuanshouyin(new \DateTime());
                    }
                }else {
                    if($entity->getQiankuanshouyin()) {
                        $entity->setQiankuanshouyin(False);
                        $entity->setQiankuanshouyinfangshi(Null);
                        $entity->setDateqiankuanshouyin(Null);
                    }
                }
            }
        }
        $em->flush();
        $list = $em->getRepository('UserOrderBundle:Tuoyundan')->qiankuan($dateStart,$dateEnd,$name,$awbno,$qiankuan);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'name' =>$name,
            'awbno' => $awbno,
            'qiankuan' => $qiankuan
        );
    }




}
