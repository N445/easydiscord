<?php


namespace N445\EasyDiscord\Model;


class Message
{
    /**
     * @var string
     */
    private $username;
    
    /**
     * @var Embed[]
     */
    private $embeds;
    
    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
    
    /**
     * @param string $username
     * @return Message
     */
    public function setUsername(string $username): Message
    {
        $this->username = $username;
        return $this;
    }
    
    /**
     * @return Embed[]
     */
    public function getEmbeds(): array
    {
        return $this->embeds;
    }
    
    /**
     * @param Embed[] $embeds
     * @return Message
     */
    public function setEmbeds(array $embeds): Message
    {
        $this->embeds = $embeds;
        return $this;
    }
}