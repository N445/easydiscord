<?php

namespace N445\EasyDiscord\Validator;

use N445\EasyDiscord\Model\Author;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Field;
use N445\EasyDiscord\Model\Footer;

class EmbedValidator
{
    /**
     * @var Embed
     */
    private $embed;

    private $nbErrors = 0;

    private $messages = [];


    public function validate(Embed $embed)
    {
        $this->embed = $embed;
        $this->validateEmbed();
        $this->validateAuthor();
        $this->validateField();
        $this->validateFooter();
        $this->sendException();
    }

    private function validateEmbed()
    {
        if (strlen($this->embed->getTitle()) > 256) {
            $this->nbErrors++;
            $this->messages[] = "Le nom de l'embed ne doit pas dépasser 256 caractères";
        }

        if (strlen($this->embed->getDescription()) > 2048) {
            $this->nbErrors++;
            $this->messages[] = "La description ne doit pas dépasser 2048 caractères";
        }

        if (count($this->embed->getFields()) > 25) {
            $this->nbErrors++;
            $this->messages[] = "Nombre de 'fields' max (25)";
        }
    }

    private function validateAuthor()
    {
        /** @var Author $author */
        if (!$author = $this->embed->getAuthor()) {
            return;
        }
        if (strlen($author->getName()) > 256) {
            $this->nbErrors++;
            $this->messages[] = "Le nom de l'auteur ne doit pas dépasser 256 caractères";
        }
    }

    private function validateField()
    {
        /** @var Field $field */
        foreach ($this->embed->getFields() as $field) {
            if (strlen($field->getName()) > 256) {
                $this->nbErrors++;
                $this->messages[] = "Le nom du field ne doit pas dépasser 256 caractères";
            }
            if (strlen($field->getValue()) > 1024) {
                $this->nbErrors++;
                $this->messages[] = "La value du field ne doit pas dépasser 1024 caractères";
            }
        }
    }

    private function validateFooter()
    {
        /** @var Footer $footer */
        if (!$footer = $this->embed->getFooter()) {
            return;
        }
        if (strlen($footer->getText()) > 2048) {
            $this->nbErrors++;
            $this->messages[] = "Le texte du footer ne doit pas dépasser 2048 caractères";
        }
    }

    private function sendException()
    {
        if (0 === $this->nbErrors) {
            return;
        }
        throw new \Exception(implode(', ', $this->messages));
    }
}