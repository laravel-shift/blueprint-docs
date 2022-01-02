---
title: Blueprint Commands
description: Blueprint comes with a set of artisan commands for generating new components and referencing existing components within your Laravel application.
extends: _layouts.documentation
section: content
---
## Blueprint Commands {#blueprint-commands}
Blueprint comes with a set of `artisan` commands which are helpful during code generation. All of these commands are under the `blueprint` namespace.

While we will cover each of the commands below, you may get additional help for any of these commands by using the `--help` option. For example:

```sh
php artisan blueprint:build --help
```

### Build Command {#build-command}
The `blueprint:build` command is the one you'll use most often as this handles [Generating Components](/docs/generating-components).

It accepts a single argument of path to your _draft_ file. This argument is optional. By default, Blueprint will attempt to load a `draft.yaml` (or `draft.yml`) file from the project root folder.

As such, it's convenient to use the `draft.yaml` file for defining components, but reuse it instead of creating separate _draft_ files each time you run the `blueprint:build` command.

When complete, `blueprint:build` will output a list of the files it created and updated.

### New Command {#new-command}
Blueprint includes a `blueprint:new` command. This command may be helpful when you want to start using Blueprint within your project.

The `blueprint:new` command will generate a `draft.yaml` file with stubs for the `models` and `controllers` sections, as well as run the [`trace` command](#trace-command) to preload your existing models into Blueprint's cache.

^^^
This command has optional flags `--config or -c` and `--stubs or -s`. Using these flags are a shortcut to publishing the config file and stub files.
e.g. `php artisan blueprint:new -cs`
^^^

### Erase Command {#erase-command}
Blueprint also comes with a `blueprint:erase` command. Anytime you run `blueprint:build`, the list of generated components is cached in a local `.blueprint` file.

The `blueprint:erase` command can be used to _undo_ the last `blueprint:build` command. Upon running this command, any of the files generated during the last _build_ will be deleted.

If you realize a mistake after running `blueprint:build` and would like to _rebuild_ your components, your may run `blueprint:erase` and `blueprint:build`.

^^^
While the `blueprint:erase` command is offered for convenience, its capabilities are limited. Instead, Blueprint  recommends running `blueprint:build` from a _clean working state_. This way, you can use version control commands to _undo_ the changes with finer control.
^^^

### Publish Stubs Command {#stubs-command}
Like Laravel, the Blueprint package allows you to publish and modify the stubs. Blueprint will attempt to check for custom stubs, before falling back to the default stubs.

To publish the stubs for customizing, you can use the `blueprint:stubs` command.

### Trace Command {#trace-command}
When using Blueprint with existing applications, you may need to reference existing models when generating new components. Furthermore, even though Blueprint caches the generated model definitions in a `.blueprint` file, this file may become outdated as you continue to develop your application.

At anytime, you may run the `blueprint:trace` command to have Blueprint analyze your application and update its cache with all of your existing models.
