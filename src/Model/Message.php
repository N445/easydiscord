<?php


namespace N445\EasyDiscord\Model;


class Message
{
    /**
     * @var string|null
     */
    private $username;

    /**
     * @var string|null
     */
    private $content;

    /**
     * @var string|null
     */
    private $avatarUrl;

    /**
     * @var boolean|null
     */
    private $tts;

    /**
     * @var string|null
     */
    private $file;

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
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     * @return Message
     */
    public function setContent(?string $content): Message
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * @param string|null $avatarUrl
     * @return Message
     */
    public function setAvatarUrl(?string $avatarUrl): Message
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTts(): ?bool
    {
        return $this->tts;
    }

    /**
     * @param bool|null $tts
     * @return Message
     */
    public function setTts(?bool $tts): Message
    {
        $this->tts = $tts;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     * @return Message
     */
    public function setFile(?string $file): Message
    {
        $this->file = $file;
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