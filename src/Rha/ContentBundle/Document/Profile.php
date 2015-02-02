<?php

namespace Rha\ContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(referenceable=true)
 */
class Profile
{
    use ContentTrait;
    
    /**
     * @PHPCR\String(nullable=true)
     */
    protected $summary;
    
    public function getSummary()
    {
        return $this->summary;
    }
    
    public function setSummary($content)
    {
        $this->summary = $content;
        return $this;
    }
}
