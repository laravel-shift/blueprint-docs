---
title: Blueprint Configuration
description: Description
extends: _layouts.documentation
section: content
---
## Blueprint Configuration
Blueprint aims to provide sensible defaults which align nicely with Laravel's conventions. However, you are free to configure Blueprint to follow your own custom conventions.

To do so, you may publish the configuration file with the following command:

```sh
php artisan vendor:publish --tag=config --provider='Blueprint\ServiceProvider'
```

This will add a copy of the `blueprint.php` file in the `config` folder. Similar to the default Laravel configuration files, each of the configuration options are preceded by a detailed header comment.

In summary, there are options for customizing the paths and namespaces for generated components, as well as options to toggle code generation. For example, to always generate foreign key constraints or PHPDocs for model properties.

To see all the available option, browse the [`blueprint.php` configuration file on GitHub](https://github.com/laravel-shift/blueprint/blob/master/config/blueprint.php).
￼￼
