<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Annonce;
use AppBundle\Form\AnnonceType;

class AnnonceController extends Controller
{

  /**
   * @Route("/annonce", name="app_annonce_index")
   */
  public function indexAction(){
    $em = $this->getDoctrine()->getManager();

    $annonces = $em->getRepository('AppBundle:Annonce')->findAll();

    return $this->render('annonce/list-annonces.html.twig',
      array(
        'annonces' => $annonces
      )
    );
  }

  /**
   * @Route("/annonce/{id}", name="app_annonce_view", requirements={"id" = "\d+"})
   */
  public function viewAction($id){
    $em = $this->getDoctrine()->getManager();
    $annonce = $em->getRepository('AppBundle:Annonce')->find($id);

    return $this->render('annonce/view_annonce.html.twig',
      array(
        'annonce' => $annonce
      )
    );
  }

  /**
   * @Route("/ajouter-annonce", name="app_annonce_add")
   */
  public function addAction(Request $request){
    $annonce  = new Annonce();
    $form     = $this->get('form.factory')->create(AnnonceType::class, $annonce);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($annonce);
      $em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

			return $this->redirectToRoute('app_annonce_index');
		}

		return $this->render('annonce/add_annonce.html.twig',
      array(
		    'form' => $form->createView(),
		  )
    );
  }

}
