<?php

namespace N445\EasyDiscord\Model;

class Author
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
     * @var string|null
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
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Author
     */
    public function setUrl(?string $url): Author
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    /**
     * @param string|null $iconUrl
     * @return Author
     */
    public function setIconUrl(?string $iconUrl): Author
    {
        $this->iconUrl = $iconUrl;
        return $this;
    }


}