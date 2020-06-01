<?php
namespace N445\EasyDiscord\Service;

use GuzzleHttp\Client;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Message;
use N445\EasyDiscord\Model\Field;

/**
 * Class DiscordSender
 * @package N445\EasyDiscord\Service
 */
class DiscordSender
{

    const BASE_URL = 'https://discordapp.com';

    const URL = '/api/webhooks/%s/%s';

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $body;

    /**
     * @var Message
     */
    private $message;

    /**
     * DiscordSender constructor.
     * @param string $id
     * @param string $token
     */
    public function __construct(string $id, string $token)
    {
        $this->url    = sprintf(self::URL, $id, $token);
        $this->client = new Client([
            'base_uri' => self::BASE_URL,
        ]);
    }

    /**
     * @param Message $message
     */
    public function send(Message $message)
    {
        $this->message = $message;

        $this->initBody();

        if ($message->getEmbeds()) {
            $this->setEmbed();
        }

        $this->body = array_filter($this->body);

        $this->client->post($this->url, [
            "json" => $this->body,
        ]);
    }

    private function initBody()
    {
        $this->body = [
            "username" => $this->message->getUsername(),
        ];
    }

    private function setEmbed()
    {
        /** @var Embed $embed */
        foreach ($this->message->getEmbeds() as $embed) {
            $embedArray = [
                "title"       => $embed->getTitle(),
                "description" => $embed->getDescription(),
                "url"         => $embed->getUrl(),
                "color"       => $embed->getColor(),
            ];

            $this->addFooter($embed, $embedArray);
            $this->addImage($embed, $embedArray);
            $this->addThumbnail($embed, $embedArray);
            $this->addVideo($embed, $embedArray);
            $this->addAuthor($embed, $embedArray);
            $this->addFields($embed, $embedArray);

            $this->body["embeds"][] = $embedArray;
        }
    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addFooter(Embed $embed, array &$embedArray)
    {
        if (!$embed->getFooter()) {
            return;
        }
        $embedArray["footer"] = [
            "text" => $embed->getFooter()->getText(),
        ];

    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addImage(Embed $embed, array &$embedArray)
    {
        if (!$embed->getImage()) {
            return;
        }
        $embedArray["image"] = [
            "url" => $embed->getImage()->getUrl(),
        ];

    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addThumbnail(Embed $embed, array &$embedArray)
    {
        if (!$embed->getThumbnail()) {
            return;
        }
        $embedArray["thumbnail"] = [
            "url" => $embed->getThumbnail()->getUrl(),
        ];

    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addVideo(Embed $embed, array &$embedArray)
    {
        if (!$embed->getVideo()) {
            return;
        }
        $embedArray["video"] = [
            "url" => $embed->getThumbnail()->getUrl(),
        ];
    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addAuthor(Embed $embed, array &$embedArray)
    {
        if (!$embed->getAuthor()) {
            return;
        }
        $embedArray["author"] = [
            "name"     => $embed->getAuthor()->getName(),
            "url"      => $embed->getAuthor()->getUrl(),
            "icon_url" => $embed->getAuthor()->getIconUrl(),
        ];
    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addFields(Embed $embed, array &$embedArray)
    {
        $embedArray["fields"] = array_map(function (Field $field) {
            return [
                "name"   => $field->getName(),
                "value"  => $field->getValue(),
                "inline" => $field->isInline(),
            ];
        }, $embed->getFields());
    }
}