---
title: Extending Blueprint
description: Build your own add-ons to generate even more code or add your own syntax.
extends: _layouts.documentation
section: content
---
## Extending Blueprint
From the beginning, Blueprint was designed to be extendable. There’s so much more code you could generate from the _draft_ file, as well as add your own syntax.

Blueprint's primary focus will always be models and controllers. However, Blueprint encourages the Laravel community to create additional packages for generating even more components.

For example, generating HTML for CRUD views, or components for [Laravel Nova](https://nova.laravel.com/).

Blueprint is [bound to the container](https://laravel.com/docs/7.x/container#binding) as a _singleton_. This means you can resolve an instance of the `Blueprint` object either from within your own application or another Laravel package.

All of the parsing and code generation is managed by this `Blueprint`. As such, you may register your own _lexer_ or _generator_ to generate additional code when `blueprint:build` is run.

By registering a lexer, Blueprint will pass an array of the parsed tokens from the YAML file. With these, you could build your own data structures to add the Blueprints _tree_.

Each registered generator is then called with tree and responsible for generating code. By default, this contains the parsed `models` and `controllers`. However, it may also contain additional items you may have placed in the tree with a lexer.

The following project was created to illustrate a very simple extension to Blueprint. You may use this as a template to extend Blueprint in anyway you can think to use in your own projects or share with the Laravel community.
