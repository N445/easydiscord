<?php
namespace N445\EasyDiscord\Service;

use GuzzleHttp\Client;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Field;
use N445\EasyDiscord\Model\Message;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * DiscordSender constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ValidatorInterface $validator
    )
    {
        $this->client    = new Client([
            'base_uri' => self::BASE_URL,
        ]);
        $this->validator = $validator;
    }

    /**
     * @param string $id
     * @param string $token
     * @return $this
     */
    public function addIdToken(string $id, string $token):DiscordSender
    {
        $this->url       = sprintf(self::URL, $id, $token);
        return $this;
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
            $this->validate($embed);
            $embedArray = [
                "title"       => $embed->getTitle(),
                "description" => $embed->getDescription(),
                "url"         => $embed->getUrl(),
                "color"       => $embed->getColor(),
            ];

            $this->addAuthor($embed, $embedArray);
            $this->addFields($embed, $embedArray);
            $this->addFooter($embed, $embedArray);
            $this->addImage($embed, $embedArray);
            $this->addThumbnail($embed, $embedArray);
            $this->addVideo($embed, $embedArray);

            $this->body["embeds"][] = $embedArray;
        }
    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addAuthor(Embed $embed, array &$embedArray)
    {
        if (!$author = $embed->getAuthor()) {
            return;
        }
        $this->validate($author);
        $embedArray["author"] = [
            "name"     => $author->getName(),
            "url"      => $author->getUrl(),
            "icon_url" => $author->getIconUrl(),
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

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addFooter(Embed $embed, array &$embedArray)
    {
        if (!$footer = $embed->getFooter()) {
            return;
        }
        $this->validate($footer);
        $embedArray["footer"] = [
            "text" => $footer->getText(),
        ];

    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addImage(Embed $embed, array &$embedArray)
    {
        if (!$image = $embed->getImage()) {
            return;
        }
        $this->validate($image);
        $embedArray["image"] = [
            "url" => $image->getUrl(),
        ];

    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addThumbnail(Embed $embed, array &$embedArray)
    {
        if (!$thumbnail = $embed->getThumbnail()) {
            return;
        }
        $this->validate($thumbnail);
        $embedArray["thumbnail"] = [
            "url" => $thumbnail->getUrl(),
        ];

    }

    /**
     * @param Embed $embed
     * @param array $embedArray
     */
    private function addVideo(Embed $embed, array &$embedArray)
    {
        if (!$video = $embed->getVideo()) {
            return;
        }
        $this->validate($video);
        $embedArray["video"] = [
            "url" => $video->getUrl(),
        ];
    }

    /**
     * @param $class
     * @return \Exception
     */
    private function validate($class)
    {
        $errors = $this->validator->validate($class);

        if (count($errors) > 0) {
            return new \Exception((string)$errors);
        }
    }
}