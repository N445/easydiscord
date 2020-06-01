<?php


namespace N445\EasyDiscord\Model;


class Message
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var Embed[]|null
     */
    private $embeds;

    public function __construct()
    {
        $this->embeds = [];
    }

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
     * @return Embed[]|null
     */
    public function getEmbeds()
    {
        return $this->embeds;
    }

    /**
     * @param Embed[]|null $embeds
     * @return Message
     */
    public function setEmbeds($embeds)
    {
        $this->embeds = $embeds;
        return $this;
    }

    /**
     * @param Embed|null $embed
     * @return Message
     */
    public function addEmbed($embed)
    {
        $this->embeds[] = $embed;
        return $this;
    }
}