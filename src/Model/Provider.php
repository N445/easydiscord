<?php

namespace N445\EasyDiscord\Model;

/**
 * todo
 * Not implemented yet
 * Class Provider
 * @package N445\EasyDiscord\Model
 */
class Provider
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Provider
     */
    public function setName(string $name): Provider
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Provider
     */
    public function setUrl(?string $url): Provider
    {
        $this->url = $url;
        return $this;
    }
}