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

    /**
     * @var Image|null
     */
    private $image;

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
     * @return Image|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     * @return Message
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
}