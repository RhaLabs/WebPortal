<?php

namespace Rha\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/about/profile")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/", name="profiles")
     * @Template()
     */
    public function profilesAction()
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Profile');
        
        $profileList = $repository->findAll();
        
        return array('profiles' => $profileList);
    }
    
    /**
     * @Route("/{name}", name="profile")
     * @Template()
     */
    public function profileAction($name)
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('RhaContentBundle:Profile');
        
        $profile = $repository->find("/cms/about/us/$name");
        
        return array('profile' => $profile);
    }
}
