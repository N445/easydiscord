Installation
============

### Step 1: Download the Bundle

Edit your `package.json` file in your root dir

```json
{
  "repositories": [
    {
      "name": "N445/easydiscord",
      "type": "vcs",
      "url": "git@github.com:N445/easydiscord.gitgit@github.com:N445/easydiscord.git"
    }
  ],
  "require": {
    // ...
    "N445/easydiscord": "dev-master",
    // ...
  }
}
```

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
            new N445\EasyDiscord\OzXXXX(),
        ];

        // ...
    }

    // ...
}
```

### Step 3 Edit sample file

replace "XXXX" by your bundle name in readme.md, composer.json and rename OzXXXXBundle + namespace