<?php
namespace AppBundle\Twig;

class AnnonceExtension extends \Twig_Extension{
  public function getFilters(){
    return array(
      new \Twig_SimpleFilter(
        'prix',
        array(
          $this, 'prixFilter'
        ),
        array(
          'is_safe' => array('html')
        )
      ),
      new \Twig_SimpleFilter(
        'prixColor',
        array(
          $this, 'prixColoration'
        ),
        array(
          'is_safe' => array('html')
        )
      )
    );
  }

  public function prixFilter($nombre, $decimals = 0){
    $prix = number_format($nombre, $decimals, ',', ' ');
    return $prix.' <i class="fa fa-eur" aria-hidden="true"></i>';
  }

  public function prixColoration($nombre){
    $prix = number_format($nombre, 0, '', '');
    if ($prix < 50) {
      return 'rgb(20, 184, 20)';
    }else if ($prix >= 50 && $prix <= 500) {
      return 'rgb(0, 0, 255)';
    }else if ($prix > 500) {
      return 'rgb(255, 0, 0)';
    }
    return 'rgb(0, 0, 0)';
  }

  public function getName(){
    return 'annonce_extension';
  }
}
