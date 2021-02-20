---
title: Advanced Configuration
description: Publish the configuration file to configure Blueprint to follow your own custom conventions.
extends: _layouts.documentation
section: content
---
## Blueprint Configuration {#blueprint-configuration}
Blueprint aims to provide sensible defaults which align nicely with Laravel's conventions. However, you are free to configure Blueprint to follow your own custom conventions.

To do so, you may publish the configuration file with the following command:

```sh
php artisan vendor:publish --tag=blueprint-config
```

This will copy a `blueprint.php` file into the `config` folder. Similar to the default Laravel configuration files, each of the configuration options are preceded by a detailed comment.

^^^
Laravel 8 reintroduced the `app/Models` folder as well as adopted [class-based routes](https://freek.dev/1210-a-better-way-to-register-routes-in-laravel). Since these were optional changes, Blueprint does not assume these conventions in order to remain backwards compatible.

If you are running Laravel 8 or have adopted these conventions, you should customize your configuration by setting the `models_namespace` option to `Models` and the `generate_fqcn_route` option to `true`.
^^^

In summary, there are options for customizing the paths and namespaces for generated components, as well as options to toggle code generation. For example, to always generate foreign key constraints or PHPDocs for model properties.

To see all the available options, browse the [`blueprint.php` configuration file on GitHub](https://github.com/laravel-shift/blueprint/blob/master/config/blueprint.php).
