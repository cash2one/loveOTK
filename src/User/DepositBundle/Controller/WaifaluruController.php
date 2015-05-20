<?php

namespace User\DepositBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Validator\Constraints\True;
use User\DepositBundle\Entity\Waifaluru;
use User\DepositBundle\Form\WaifaluruForm;
use User\DepositBundle\Repository\WaifaluruRepository;
use User\OrderBundle\Entity\Tuoyundan;
use User\OrderBundle\Repository\TuoYunDanRepository;


/**
 * 外发录入 增删改查
 */
class WaifaluruController extends Controller
{
    /**
     * @Route("/deposit/deposit",name="_deposit")
     * @Method("GET")
     * @Template("UserDepositBundle:Tuoyundan:list.html.twig")
     */
    public function indexSearchAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');
        $dateEnd = $request->query->get('dateEnd');
        $em = $this->getDoctrine()->getManager();
        $waifa = false; //还没有外发的托运单
        $list = $em->getRepository('UserOrderBundle:Tuoyundan')->getAll($waifa, $dateStart, $dateEnd,null,null);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd
        );
    }

    /**
     * @Route("/deposit/list",name="_deposit_list")
     * @Method("GET")
     * @Template("UserDepositBundle:Waifaluru:list.html.twig")
     */
    public function waifaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dateStart = $request->query->get('dateStart');   //中转日期
        $dateEnd = $request->query->get('dateEnd');
        $zhongzhuandan = $request->query->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->query->get('chengyungongsi');
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->getAll(null, $dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            "zhongzhuandan" => $zhongzhuandan,
            "chengyungongsi" => $chengyungongsi
        );
    }

    /**
     *
     * @Route("/deposit/deposit-new/{yundanid}", name="_deposit_new")
     * @Method("GET")
     * @Template("UserDepositBundle:Waifaluru:new.html.twig")
     */
    public function newAction($yundanid)
    {
        $entity = new Waifaluru();
        $entity->setTuoyundanId($yundanid); //托运单id
        // $entity ->addXianfu(new Xianfu());
        $em = $this->getDoctrine()->getManager();
        $tuoyundan = $em->getRepository('UserOrderBundle:Tuoyundan')->find($yundanid);
        $form = $this->createCreateForm($entity);
        return array(
            'entity' => $entity,
            'tuoyundan' => $tuoyundan,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a new Product entity.
     *
     * @Route("/deposit/deposit-create", name="_deposit_create")
     * @Method("POST")
     * @Template("UserDepositBundle:Waifaluru:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Waifaluru();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid() && ($path = $form->getData()) instanceOf Waifaluru) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            $yundanid = $path->getTuoyundanId();
            $tuoyundan = $em->getRepository('UserOrderBundle:Tuoyundan')->find($yundanid);
            $tuoyundan->setWaifa(True);//改变运单的状态 已经外发
            $em->flush();
//            foreach ($path->getXianfu() as $xianfu) {
//                $xianfu->setTuoyundan($path);
//                $em->persist($xianfu);
//            }
            $em->flush();
            return $this->redirect($this->generateUrl('_deposit_list'));
        }
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );

    }

    /**
     *
     * @Route("/deposit/deposit-edit/{id}", name="_deposit_edit")
     * @Method("GET")
     * @Template("UserDepositBundle:Waifaluru:edit.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
        $tuoyundan = $em->getRepository('UserOrderBundle:Tuoyundan')->find($entity->getTuoyundanId());
        if ($entity instanceOf Waifaluru) {
            $form = $this->createCreateForm($entity);
        }
        return array(
            'entity' => $entity,
            'tuoyundan' => $tuoyundan,
            'form' => $form->createView()
        );
    }


    /**
     *
     * @Route("/deposit/deposit-deposit/{id}", name="_deposit_update")
     * @Method("POST")
     * @Template("UserDepositBundle:Waifaluru:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }
        $editForm = $this->createCreateForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('_deposit_list'));
        }
        return array(
            'entity' => $entity,
            'form' => $editForm->createView(),
        );
    }


    /**
     *
     * @Route("/deposit/deposit-delete/{id}", name="_deposit_delete")
     * @Method("get")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('_deposit'));
    }

    /**
     *
     * @Route("/deposit/deposit-shehe", name="_deposit_shenhe")
     * @Method("post")
     * @Template("UserDepositBundle:Waifaluru:table.html.twig")
     */
    public function shenheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ids = $request->request->get('ids');
        $check = $request->request->get('check');

        $arr = split(',', $ids);
        foreach ($arr as $id) {
            if (is_numeric($id)) {
                $zhongzhuan = $em->getRepository('UserDepositBundle:Waifaluru')->find($id);
                $zhongzhuan->setShenhe($check);
                //到付总额
                $tuoyun = $em->getRepository('UserOrderBundle:Tuoyundan')->find($zhongzhuan->getTuoyundanId());
                $zhongzhuan->setDaofuzonge($check ? $tuoyun->getDaofu() + $tuoyun->getDaishouhuokuan() : 0);
                //结算方式判断 预付运费额度
                switch ($zhongzhuan->getZhongzhuanjiesuanfangshi()) {
                    case '现结':
                     if($check) {
                    //应付运费 + 应付送货费 +应付其他
                    $zhongzhuan->setXianfu($check ? $zhongzhuan->getYingfuyunfei() + $zhongzhuan->getYingfusonghuofei() + $zhongzhuan->getYingfuqita() - $zhongzhuan->getDaofuzonge() : 0);
                    $zhongzhuan->setXianfushouyin(False);
                     } else {
                         $zhongzhuan->setXianfu(0);
                         $zhongzhuan->setXianfushouyin(False);
                     }break;
                }

            }
            //取消审核
        }
        $em->flush();
        $dateStart = $request->request->get('dateStart');   //中转日期
        $dateEnd = $request->request->get('dateEnd');
        $zhongzhuandan = $request->request->get('zhongzhuandan');  //中转单号
        $chengyungongsi = $request->request->get('chengyungongsi');
        $list = $em->getRepository('UserDepositBundle:Waifaluru')->getAll($check, $dateStart, $dateEnd, $zhongzhuandan, $chengyungongsi);
        return array(
            'list' => $list,
        );
    }


    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Waifaluru $entity)
    {
        $form = $this->createForm(new WaifaluruForm(), $entity);
        return $form;
    }

}
