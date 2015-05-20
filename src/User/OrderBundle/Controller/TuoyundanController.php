<?php

namespace User\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use User\OrderBundle\Repository\TuoYunDanRepository;
use User\OrderBundle\Entity\Tuoyundan;
use User\OrderBundle\Form\TuoyundanForm;



/**
 * 托运单的 增删改查
 */
class TuoyundanController extends Controller
{
    /**
     * @Route("/yundan/yundan/",name="_yundan")
     * @Method("GET")
     * @Template("UserOrderBundle:Tuoyundan:list.html.twig")
     */
       public function indexSearchAction(Request $request)
    {
        $dateStart = $request->query->get('dateStart');
        $dateEnd = $request->query->get('dateEnd');
        $name = $request->query->get('name');
        $awbno = $request->query->get('awbno');
        $em = $this->getDoctrine()->getManager();
        $waifa = false; //还没有外发的托运单
        $list = $em->getRepository('UserOrderBundle:Tuoyundan')->getAll($waifa,$dateStart,$dateEnd,$name,$awbno);
        return array(
            'list' => $list,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
            'name' =>$name,
            'awbno' => $awbno
        );
    }


    /**
     *
     * @Route("/yundan/yundan-new", name="_yundan_new")
     * @Method("GET")
     * @Template("UserOrderBundle:Tuoyundan:new.html.twig")
     */
    public function newAction()
    {
        $entity = new Tuoyundan();
        $form = $this->createCreateForm($entity);
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }


    /**
     * Creates a new Product entity.
     *
     * @Route("/yundan/yundan-create", name="_yundan_create")
     * @Method("POST")
     * @Template("UserOrderBundle:Tuoyundan:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tuoyundan();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid() && ($path = $form->getData()) instanceOf Tuoyundan){
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('_yundan'));
       }
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );

    }

    /**
     *
     * @Route("/yundan/yundan-edit/{id}", name="_yundan_edit")
     * @Method("GET")
     * @Template("UserOrderBundle:Tuoyundan:edit.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserOrderBundle:Tuoyundan')->find($id);
        if ($entity instanceOf Tuoyundan ) {
            $form = $this->createCreateForm($entity);
        }
        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }


    /**
     *
     * @Route("/yundan/yundan-update/{id}", name="_yundan_update")
     * @Method("POST")
     * @Template("UserOrderBundle:Tuoyundan:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserOrderBundle:Tuoyundan')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }
        $editForm = $this->createCreateForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('_yundan'));
        }
        return array(
            'entity' => $entity,
            'form' => $editForm->createView(),
        );
    }


    /**
     *
     * @Route("/yundan/yundan-delete/{id}", name="_yundan_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserOrderBundle:Tuoyundan')->find($id);
        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('_yundan'));
    }


    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tuoyundan $entity)
    {
        $form = $this->createForm(new TuoyundanForm(), $entity);
        return $form;
    }

}
