<?php

namespace N445\EasyDiscord\Model;

class Field
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var boolean
     */
    private $inline = false;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Field
     */
    public function setName(string $name): Field
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Field
     */
    public function setValue(string $value): Field
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInline(): bool
    {
        return $this->inline;
    }

    /**
     * @param bool $inline
     * @return Field
     */
    public function setInline(bool $inline): Field
    {
        $this->inline = $inline;
        return $this;
    }
}