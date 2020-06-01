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

### Step 3: Usage

Only send embed message

```php
<?php

use N445\EasyDiscord\Helper\Colors;
use N445\EasyDiscord\Model\Author;
use N445\EasyDiscord\Model\Embed;
use N445\EasyDiscord\Model\Field;
use N445\EasyDiscord\Model\Footer;
use N445\EasyDiscord\Model\Image;
use N445\EasyDiscord\Model\Message;
use N445\EasyDiscord\Model\Thumbnail;
use N445\EasyDiscord\Service\DiscordSender;

// Init one embed
$embed = (new Embed())
    ->setTitle('My embed from EasyDiscord')
    ->setDescription('My wonderful message')
    ->setUrl('https://github.com/N445') // optional
    ->setColor(Colors::GREEN) // optional
;

// Add author optional
$author = (new Author())
    ->setName('N445')
    ->setUrl('https://github.com/N445')
    ->setIconUrl('https://avatars0.githubusercontent.com/u/25900291?s=460&v=4')
;
$embed->setAuthor($author);

// Add image optional
$image = (new Image())
    ->setUrl('https://images.unsplash.com/photo-1517976384346-3136801d605d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80');
$embed->setImage($image);

// Add thumbnail optional
$thumbnail = (new Thumbnail())
    ->setUrl('https://images.unsplash.com/photo-1517976384346-3136801d605d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80');
$embed->setThumbnail($thumbnail);

// Add footer optional
$footer = (new Footer())
    ->setText('Footer !');
$embed->setFooter($footer);

// Add fields optional
$field1 = (new Field())
    ->setName('field 1')
    ->setValue('value field 1')
    ->setInline(true)
;

$field2 = (new Field())
    ->setName('field 2')
    ->setValue('value field 2')
    ->setInline(true)
;

$field3 = (new Field())
    ->setName('field 3')
    ->setValue('value field 3')
;

$embed->addField($field1);
$embed->addField($field2);
$embed->addField($field3);
//or
$embed->setFields([
    $field1,
    $field2,
    $field3,
]);

// Init your message
$message = (new Message())
    ->setUsername('My super bot')
    ->addEmbed($embed)
;


// You can add multiple embed
// Init another embed
$embed2 = (new Embed())
    ->setTitle('other title')
    ->setDescription('My wonderful message 2')
;
$message->addEmbed($embed2);

$id = 'MY_WEBHOOK_ID';
$token = 'MY_WEBHOOK_TOKEN';

(new DiscordSender($id, $token))
    ->send($message);
```

### Doc

https://discord.com/developers/docs/resources/webhook#execute-webhook
https://discord.com/developers/docs/resources/channel#embed-object
