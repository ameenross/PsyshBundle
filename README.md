# PsyshBundle for Symfony 2.x

## Intro

When trying to install the Psysh Bundle from Theo Fidry in a Symfony 2.3
project, I ran into a bug. Since Theo Fidry only seems to maintain a newer
version of the bundle (he only has a master branch), I decided to fork.

## Install

```bash
composer require --dev ameenross/psysh-bundle:^2.0.3
```

Then, enable the bundle by updating your `app/AppKernel.php` file to enable the bundle:
```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    //...

    if (in_array($this->getEnvironment(), ['dev', 'test'])) {
        //...
        $bundles[] = new Fidry\PsyshBundle\PsyshBundle();
    }

    return $bundles;
}
