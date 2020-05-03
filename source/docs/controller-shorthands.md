---
title: Controller Shorthands
description: Description
extends: _layouts.documentation
section: content
---
## Controller Shorthands
In addition to some of the statement short hands and model reference conveniences, blueprint also offers a resource shorthand.

This aligns with Laravel‘s preference of creating resource for controllers.

Instead of having to write out all of the actions and statements common to crud behavior within your controllers, you may instead use the resource shorthand.

The resource shorthand automatically infers the model reference based on the controller name. By default it creates the seven resource full control her actions with the appropriate behavior for each action: index, create, store, edit, update, destroy, show

￼￼￼￼ for example, the following definition represents the resourceful controller with statements written out in longhand.

Instead, you may generate the equivalent by simply writing resource.

Of course, blueprint doesn’t stop there. You may also specify a value of all, web, or api,

A value of API would generate the five resourceful actions for an API controller with the appropriate Jason response resource response.

You may also specify the exact controller actions you wish to generate within your resource.

The following examples demonstrates which methods would be generated for each of the short hands.

￼￼￼
Well you may use this short hand for convenience to generate these actions within your controller quickly, and update the code after, you may also combine the resource shorthand with any additional controller or even those you wish to overwrite.￼

The following example demonstrates the definition for controller which will generate the index create and store methods. In addition it will generate the user defined download action and instead of using the default statements for the create action, it will instead use the one to find.
