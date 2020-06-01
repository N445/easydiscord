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
     * @var string|null
     */
    private $url;

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
     * @var Thumbnail|null
     */
    private $thumbnail;

    /**
     * @var Video|null
     */
    private $video;

    /**
     * @var Author|null
     */
    private $author;

    /**
     * @var Field[]
     */
    private $fields=[];


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
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Embed
     */
    public function setUrl(?string $url): Embed
    {
        $this->url = $url;
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
    public function getFooter(): ?Footer
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
    public function getImage(): ?Image
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

    /**
     * @return Thumbnail|null
     */
    public function getThumbnail(): ?Thumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param Thumbnail|null $thumbnail
     * @return Embed
     */
    public function setThumbnail(?Thumbnail $thumbnail): Embed
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     * @return Embed
     */
    public function setVideo(?Video $video): Embed
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author|null $author
     * @return Embed
     */
    public function setAuthor(?Author $author): Embed
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param Field[] $fields
     * @return Embed
     */
    public function setFields(array $fields): Embed
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param Field $field
     * @return Embed
     */
    public function addField(Field $field): Embed
    {
        $this->fields[] = $field;
        return $this;
    }
}