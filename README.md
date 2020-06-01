Installation
============

### Step 1: Download the Bundle

`composer require n445/easydiscord`

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new N445\EasyDiscord\N445EasyDiscordBundle(),
        ];

        // ...
    }

    // ...
}
```

### Usage

Only send embed message

```php
<?php

use N445\EasyDiscord\Model\Footer;
use N445\EasyDiscord\Model\Image;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Message;
use N445\EasyDiscord\Model\DiscordSender;

$footer = (new Footer())
        ->setText('Footer !')
;

$image = (new Image())
        ->setUrl('https://images.unsplash.com/photo-1517976384346-3136801d605d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80')
        ->setHeight(300) // optional
        ->setWidth(200) // optional
;

$embed = (new Embed())
        ->setTitle('n445')
        ->setDescription('My wonderful message')
        ->setColor(Colors::GREEN)
        ->setFooter($footer) // optional
        ->setImage($image) // optional
;

$message = (new Message())
        ->setUsername('My super bot')
        ->addEmbed($embed)
        ;

$id = 'MY_WEBHOOK_ID';
$token = 'MY_WEBHOOK_TOKEN';

(new DiscordSender())
        ->init($id,$token)
        ->send($message)
        ;
```

### Doc

https://discord.com/developers/docs/resources/webhook#execute-webhook
https://discord.com/developers/docs/resources/channel#embed-object
