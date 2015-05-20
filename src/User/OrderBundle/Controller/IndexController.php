<?php

namespace User\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class IndexController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        if ($this->getUser()) {
            return $this->redirect('/index');
        }
        else{
            return $this->redirect('/dd-admin');
        }
    }

    /**
     * @Route("/index")
     */
    public function homeAction()
    {
        return $this->render('UserOrderBundle:Index:index.html.twig');
    }
}
