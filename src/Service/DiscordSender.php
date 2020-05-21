<?php


namespace N445\EasyDiscord\Service;


use GuzzleHttp\Client;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Message;

class DiscordSender
{
    const URL = '/api/webhooks/%s/%s';
    
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
            'base_uri' => 'https://discordapp.com',
        ]);
        
        $body = [
            "username" => $message->getUsername(),
            "embeds" => array_map(function (Embed $embed) {
                return [
                    "title" => $embed->getTitle(),
                    "description" => $embed->getDescription(),
                    "color" => $embed->getColor(),
                    "footer" => [
                        "text" => $embed->getFooter()->getText(),
                    ],
                ];
            }, $message->getEmbeds()),
        ];
        
        $client->post($this->url, [
            "json" => $body,
        ]);
    }
}