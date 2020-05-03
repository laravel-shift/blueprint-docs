---
title: Controller Shorthands
description: Description
extends: _layouts.documentation
section: content
---
## Controller Shorthands
In addition to some of the statement shorthands and model reference conveniences, Blueprint also offers a resource shorthand.

This aligns with Laravel‘s preference for creating [resource controllers](https://laravel.com/docs/7.x/controllers#resource-controllers).

Instead of having to write out all of the actions and statements common to CRUD behavior within your controllers, you may instead use the `resource` shorthand.

The `resource` shorthand automatically infers the model reference based on the controller name. Blueprint will expand this to into the 7 resource actions with the appropriate statements for each action: `index`, `create`, `store`, `show`, `edit`, `update`, and `destroy`.

For example, the following definition represents the resourceful controller with statements written out in longhand.

Instead, you may generate the equivalent by simply writing `resource`.

Of course, Blueprint doesn’t stop there. You may also specify a value of `all`, `web`, or `api`.

A value of `api` would generate the 5 resource actions of an API controller with the appropriate statements and responses for each action: `index`, `store`, `show`, `update`, and `destroy`.

You may also specify the exact controller actions you wish to generate by specifying any of the 7 resource actions as a comma separated list. If you wish to use the API actions, prefix the action with `api.`.

```yaml

```

The following examples demonstrates which methods would be generated for each of the shorthands.


While you may use this shorthand for convenience to generate these actions within your controller quickly, and update the code after, you may also combine the resource shorthand with any additional controller or even those you wish to overwrite.

The following example demonstrates the definition for controller which will generate the index create and store methods. In addition it will generate the user defined download action and instead of using the default statements for the create action, it will instead use the one to find.
