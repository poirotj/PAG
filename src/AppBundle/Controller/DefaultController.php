<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller{

  /**
   * @Route("/", name="app_default_homepage")
   */
  public function indexAction(Request $request){
    // replace this example code with whatever you need
    return $this->render('index.html.twig');
  }

  /**
   * @Route("/conditions", name="app_default_condition")
   */
  public function conditionsAction(){
    return $this->render('condition.html.twig');
  }

}
