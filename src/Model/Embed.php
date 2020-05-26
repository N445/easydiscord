<?php


namespace N445\EasyDiscord\Model;


use N445\EasyDiscord\Helper\Colors;

class Embed
{
    /**
     * @var string
     */
    private $title;
    
    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $color = Colors::DEFAULT;

    /**
     * @var Footer|null
     */
    private $footer;

    /**
     * @var Image|null
     */
    private $image;


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Embed
     */
    public function setTitle(string $title): Embed
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $description
     * @return Embed
     */
    public function setDescription(string $description): Embed
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @param int $color
     * @return Embed
     */
    public function setColor(int $color): Embed
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return Footer|null
     */
    public function getFooter(): Footer
    {
        return $this->footer;
    }

    /**
     * @param Footer|null $footer
     * @return Embed
     */
    public function setFooter($footer): Embed
    {
        $this->footer = $footer;
        return $this;
    }


    /**
     * @return Image|null
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     * @return Embed
     */
    public function setImage($image): Embed
    {
        $this->image = $image;
        return $this;
    }


}