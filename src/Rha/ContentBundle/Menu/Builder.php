<?php

namespace Rha\ContentBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function createMainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array(
            'navbar' => true,
        ));
        
        $menu->addChild('About', array(
            'dropdown' => true,
            'caret' => true,
            ));
        
        $menu['About']->addChild('Our Mission', array('route' => 'mission'));
        $menu['About']->addChild('Who We Are', array('route' => 'profiles'));
        $menu['About']->addChild('Our Culture', array('route' => 'culture'));
        
        $menu->addChild('Contact', array('route' => 'contact'));
        
        $menu->addChild('Portfolio', array('route' => 'portfolio'));
        
        $checker = $this->container->get('security.authorization_checker');
        
        if ($checker->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $userName = $user->getUsername();
            
            $menu->addChild("Hello,$userName", array(
                        'dropdown' => true,
                        'caret' => true,
                        ))
                 ->setAttribute('divider_prepend', true)
                 ->setAttribute('class', 'nav pull-right');
                 
            $menu["Hello,$userName"]->addChild('Logout', array('route' => '_logout'));
        }
        
        return $menu;
    }
    public function createNavbarsSubnavMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array(
            'subnavbar' => true,
        ));
        $menu->addChild('Top', array('uri' => '#top'));
        $menu->addChild('Menus', array('uri' => '#menus'));
        $menu->addChild('Navbars', array('uri' => '#navbars'));
        $menu->addChild('Template', array('uri' => '#template'));
        // ... add more children
        return $menu;
    }
    public function createComponentsSubnavMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array(
            'subnavbar' => true,
        ));
        $menu->addChild('Top', array('uri' => '#top'));
        $menu->addChild('Flashs', array('uri' => '#flashs'));
        $menu->addChild('Session Flashs', array('uri' => '#session-flashes'));
        $menu->addChild('Labels & Badges', array('uri' => '#labels-badges'));
        // ... add more children
        return $menu;
    }
}
