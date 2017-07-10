<?php

namespace BonoboBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BonoboController extends Controller
{
    /**
     * @Route("/homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
