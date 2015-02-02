<?php

namespace Rha\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Content');
        
        $qb = $repository->createQueryBuilder('c');
        $qb->where()->child("/cms/contact", 'c');
        
        $about = $qb->getQuery()->execute();
        
        return array('contactItems' => $about);
    }
}
