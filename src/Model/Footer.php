<?php


namespace N445\EasyDiscord\Model;
use Symfony\Component\Validator\Constraints as Assert;

class Footer
{
   private $text;
    
    /**
     * @return mixed
     * @Assert\Length(
     *      max = 2048,
     *      maxMessage = "Le text ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * @param mixed $text
     * @return Footer
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
   
   
}