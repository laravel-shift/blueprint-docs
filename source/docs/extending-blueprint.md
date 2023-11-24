---
title: Extending Blueprint
description: Build your own add-ons to generate even more code or add your own syntax.
extends: _layouts.documentation
section: content
---
## Extending Blueprint {#extending-blueprint}
From the beginning, Blueprint was designed to be extendable. There’s so much more code you could generate from the _draft_ file, as well as add your own syntax.

Blueprint's primary focus will always be models and controllers. However, Blueprint encourages the Laravel community to create additional packages for generating even more components.

For example, generating HTML for CRUD views, or components for [Laravel Nova](https://nova.laravel.com/).

Blueprint is [bound to the container](https://laravel.com/docs/container#binding) as a _singleton_. This means you can resolve an instance of the `Blueprint` object either from within your own application or another Laravel package.

All of the parsing and code generation is managed by this `Blueprint`. As such, you may register your own _lexer_ or _generator_ to generate additional code when `blueprint:build` is run.

By registering a lexer, Blueprint will pass an array of the parsed tokens from the YAML file. With these, you could build your own data structures to add the Blueprints _tree_.

Each registered generator is then called with tree and responsible for generating code. By default, this contains the parsed `models` and `controllers`. However, it may also contain additional items you may have placed in the tree with a lexer.

In addition, I also discuss the architecture for extending Blueprint as well as adding new syntax for [database seeders](/docs/generating-database-seeders) during this [weekly Blueprint live-stream](https://www.youtube.com/watch?v=ZxpmSAXKG1A&t=1656).

### Community Addons
You may use these addons in your projects or as an example of how to create your own and possibly share them with the Laravel community.


- [Laravel Nova](https://github.com/Naoray/blueprint-nova-addon): Automatically generate Nova resources for each of the models specified in your _draft file_.
- [API Resources Tests](https://github.com/axitbv/laravel-blueprint-streamlined-test-addon): Generate test code similar to Blueprint, but using an [opinionated and streamlined](https://github.com/laravel-shift/blueprint/pull/220) style.
- [TALL-forms](https://github.com/tanthammar/tall-blueprint-addon): Automatically generate _TALL_ forms for each of the models specified in your draft file.

### Additional Services
The following services also support using _Blueprint_ by either accepting or generating a draft file.

- [drawSQL](https://drawsql.app/): Generate _draft file_ from your database entity relationship diagrams.
