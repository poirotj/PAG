<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ContactController extends Controller{
  /**
   * @Route("/contact", name="app_default_contact")
   * @Method({"GET"})
   */
  public function contactAction(){
    return $this->render('form/contact.html.twig');
  }

  /**
   * @Route("/contact", name="app_default_contactpost")
   * @Method({"POST"})
   */
  public function contactPostAction(){
    $request = Request::createFromGlobals();
    $message = $request->request->get('identite')." : ".$request->get('message');

    $object = 'PAG';
    if ('dev' === $this->get('kernel')->getEnvironment()) {
      $object .= ' développement';
    }

    $email =  \Swift_Message::newInstance()
              ->setSubject($object)
              ->setFrom('jonathan.poirot@hotmail.fr')
              ->setTo('jonathan.apidae@yopmail.com')
              ->setBody($message)
    ;

    $retour = $this->get('mailer')->send($email);

    return $this->render('form/contact.html.twig',
      array('confirmation' => $retour )
    );
  }
}
