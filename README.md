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

### Doc

https://discord.com/developers/docs/resources/webhook#execute-webhook
https://discord.com/developers/docs/resources/channel#embed-object
