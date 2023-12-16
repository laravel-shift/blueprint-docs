---
title: Installing Blueprint
description: Add Blueprint to your Laravel application with Composer and setup your project in under 2 minutes.
extends: _layouts.documentation
section: content
---
## Installing Blueprint {#installing-blueprint}
You may install Blueprint via Composer. It's recommended to install Blueprint as a development dependency of your Laravel application. If you haven't created a Laravel application yet, follow the [installation guide in the Laravel docs](https://laravel.com/docs/10.x/installation#creating-a-laravel-project).

When ready, run the following command to install Blueprint:

```sh
composer require -W --dev laravel-shift/blueprint
```

### Additional Packages {#additional-packages}
Blueprint also _suggests_ installing the [Laravel Test Assertions package](https://github.com/jasonmccreary/laravel-test-assertions), as the generated tests may use some of the additional, helpful assertions provided by this package.

You may do so with the following command:

```sh
composer require --dev jasonmccreary/laravel-test-assertions
```

### Ignoring Blueprint files {#ignoring-blueprint-files}
You may also consider ignoring files Blueprint uses from version control. We'll talk about these files more in [Generating Components](/docs/generating-components). But for now, these files are mainly used as a "scratch pad" or "local cache". So it's unlikely you'd want to track their changes.

You may quickly add these files to your `.gitignore` with the following command:

```sh
echo '/draft.yaml' >> .gitignore
echo '/.blueprint' >> .gitignore
```
