<?php

namespace Rha\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/about")
 */
class AboutController extends Controller
{
    /**
     * @Route("/", name="about")
     * @Template()
     */
    public function aboutAction()
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Content');
        
        $qb = $repository->createQueryBuilder('c');
        $qb->where()->child("/cms/about", 'c');
        
        $about = $qb->getQuery()->execute();
        
        return array('aboutItems' => $about);
    }
    
    /**
     * @Route("/mission", name="mission")
     * @Template()
     */
    public function missionAction()
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Content');
        
        $qb = $repository->createQueryBuilder('c');
        $qb->where()->child("/cms/about/mission", 'c');
        
        $about = $qb->getQuery()->execute();
        
        return array('aboutItems' => $about);
    }
    
    /* see ProfileController for 'Who we are' */
    
    /**
     * @Route("/culture", name="culture")
     * @Template()
     */
    public function cultureAction()
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Content');
        
        $qb = $repository->createQueryBuilder('c');
        $qb->where()->child("/cms/about/culture", 'c');
        
        $about = $qb->getQuery()->execute();
        
        return array('aboutItems' => $about);
    }

}
