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
    private $proxyUrl;

    /**
     * @var string|null
     */
    private $height;

    /**
     * @var string|null
     */
    private $width;

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string|null $url
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
    public function getProxyUrl()
    {
        return $this->proxyUrl;
    }

    /**
     * @param string|null $proxyUrl
     * @return Image
     */
    public function setProxyUrl($proxyUrl)
    {
        $this->proxyUrl = $proxyUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeight()
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
    public function getWidth()
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