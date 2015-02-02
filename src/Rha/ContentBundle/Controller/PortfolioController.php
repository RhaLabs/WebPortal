<?php

namespace Rha\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/portfolio")
 */
class PortfolioController extends Controller
{
    /**
     * @Route("/", name="portfolio")
     * @Template()
     */
    public function portfolioAction()
    {        
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Content');
        
        $qb = $repository->createQueryBuilder('p');
        $qb->where()->child("/cms/portfolio", 'p');
        
        $portfolio = $qb->getQuery()->execute();
        
        return array('portfolioItems' => $portfolio);
    }
}
