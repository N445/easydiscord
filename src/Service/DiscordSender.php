<?php


namespace N445\EasyDiscord\Service;


use GuzzleHttp\Client;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Message;

class DiscordSender
{
    const BASE_URL = 'https://discordapp.com';
    const URL      = '/api/webhooks/%s/%s';

    /**
     * @var string
     */
    private $url;

    /**
     * @param string $id
     * @param string $token
     * @return $this
     */
    public function init(string $id, string $token)
    {
        $this->url = sprintf(self::URL, $id, $token);
        return $this;
    }
    
    public function send(Message $message)
    {
        $client = new Client([
            'base_uri' => self::BASE_URL,
        ]);

        $body = [
            "username" => $message->getUsername(),
        ];

        if ($message->getEmbeds()) {
            $body["embeds"] = array_map(function (Embed $embed) {
                $embedArray = [
                    "title"       => $embed->getTitle(),
                    "description" => $embed->getDescription(),
                    "color"       => $embed->getColor(),
                ];

                if ($embed->getFooter()) {
                    $embedArray["footer"] = [
                        "text" => $embed->getFooter()->getText(),
                    ];
                }

                if ($embed->getImage()) {
                    $embedArray["image"] = [
                        "url"       => $embed->getImage()->getUrl(),
                        "proxy_url" => $embed->getImage()->getProxyUrl(),
                        "height"    => $embed->getImage()->getHeight(),
                        "width"     => $embed->getImage()->getWidth(),
                    ];
                }

                return $embedArray;

            }, $message->getEmbeds());
        }

        $body = array_filter($body);

        $client->post($this->url, [
            "json" => $body,
        ]);
    }
}