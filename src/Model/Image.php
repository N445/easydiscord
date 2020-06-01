<?php

namespace N445\EasyDiscord\Model;

class Image
{
    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $height;

    /**
     * @var string|null
     */
    private $width;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeight(): ?string
    {
        return $this->height;
    }

    /**
     * @param string|null $height
     * @return Image
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->width;
    }

    /**
     * @param string|null $width
     * @return Image
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }
}