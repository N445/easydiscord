<?php


namespace N445\EasyDiscord\Model;

class Footer
{
   private $text;
    
    /**
     * @return mixed
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