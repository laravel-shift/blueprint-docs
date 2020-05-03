---
title: Blueprint Commands
description: Description
extends: _layouts.documentation
section: content
---
## Blueprint Commands
Blueprint comes with a set of `artisan` commands helpful during code generation. Each of these commands are under the `blueprint` namespace.

While we will cover each of the commands below, you may get additional help with any of these commands by using the `--help` option. For example:

```sh
php artisan blueprint:build --help
```

## Build Command
We mentioned the `blueprint:build` command in [Generating Code](). This is the command you'll use most often with Blueprint.

It accepts a single argument of the _draft_ file. This argument is optional. By default, Blueprint will automatically load a `draft.yaml` file.

As such, it's convenient to use the `draft.yaml` file for defining components, but reuse it instead of creating separate _draft_ files each time you run the `blueprint:build` command.

When complete, the `blueprint:build` will output a completed list of the files it created and updated.

## Erase Command
Blueprint also comes with a `blueprint:erase` command. Anytime you run `blueprint:build`, the list of generated components is cached in a local `.blueprint` file.

The `blueprint:erase` command can be used to _undo_ the last `blueprint:build` command. Upon running this command, any of the files generated during the last _build_ will be deleted.

^^^
While the `blueprint:erase` command is offered for convenience, it's recommended to instead run `blueprint:build` from a _clean working state_. This way, you can use version control commands to _undo_ the changes with finer control.
^^^

## Trace Command
