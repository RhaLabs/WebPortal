<?php

namespace Rha\ContentBundle\DataFixtures\PHPCR;

use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\ODM\PHPCR\Document\Generic;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Rha\ContentBundle\Document\Profile;
use Rha\ContentBundle\Document\Content;
use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;

/**
 * Loads the initial demo data of the demo website.
 */
class LoadImageData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 10; // number in which order to load fixtures
    }
    
    /**
     * Load data fixtures with the passed DocumentManager
     *
     * @param DocumentManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if (!$manager instanceof DocumentManager) {
            $class = get_class($manager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }
        
        $dataDir = realpath(__DIR__ . '/../../Resources/public/images');

        // tweak homepage
        $root = $manager->find(null, '/cms');
        
        // media root
        $mediaRoot = $manager->find(null, '/cms/media');
        
        if (empty($mediaRoot)) {
            $mediaRoot = new Generic();
            $mediaRoot->setNodename('media');
            $mediaRoot->setParent($root);
            $manager->persist($mediaRoot);
        }
        
        // Image
        $image = new Image();
        $image->setParent($mediaRoot);
        $image->setName('211.jpg');
        $image->setFileContentFromFilesystem($dataDir .'/211.jpg');
        $manager->persist($image);
        
        // save the changes
        $manager->flush();
    }
}
