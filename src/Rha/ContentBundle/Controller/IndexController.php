<?php

namespace Rha\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Content');
        
        $qb = $repository->createQueryBuilder('c');
        $qb->where()->child("/cms/home", 'c');
        
        $content = $qb->getQuery()->execute();
        
        return array('content' => $content);
    }
    
    /**
     * @Route("/error", name="error")
     * @Template()
     */
    public function errorAction()
    {
        $cards = array();
        
        for ( $i = 1; $i <=30; $i++) {
            $front = htmlentities($this->container->get('templating.helper.assets')->getUrl("bundles/rhacontent/images/211-$i.jpg"));
            
            $card = array('front' => $front);
            
            $cards[] = $card;
        }
        
        return array(
            'cards' => $cards
            );
    }
    
    /**
     * @Route("/theme", name="theme")
     * @Template()
     */
    public function themeAction()
    {
        return array();
    }
}
