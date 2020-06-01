<?php

namespace N445\EasyDiscord\Model;
use Symfony\Component\Validator\Constraints as Assert;

class Author
{
    /**
     * @var string
     * @Assert\Length(
     *      max = 256,
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $iconUrl;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Author
     */
    public function setName(string $name): Author
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Author
     */
    public function setUrl(string $url): Author
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * @param string $iconUrl
     * @return Author
     */
    public function setIconUrl(string $iconUrl): Author
    {
        $this->iconUrl = $iconUrl;
        return $this;
    }
}