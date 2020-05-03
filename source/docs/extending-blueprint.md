---
title: Extending Blueprint
description: Description
extends: _layouts.documentation
section: content
---
## Extending Blueprint

From the beginning blueprint was designed to be extendable. There’s so much more you can do with the draft file.

Blueprints primary focus will always be models and controllers. However you could generate a lot more from the draft file.

For example crud reviews, or components for Laravel nova.

Underneath the blueprint is registered as a singleton. Intern each of the lectures and generators are registered within blueprint.

As such you may register your own Lexar or generator to output additional code when blueprint build is run.

By registering a Lexar blueprint will pass the poorest tokens from the Yamo file. From there you could turn these into your own local objects to then iterate over and generate code.

Each generator is then called with V for syntax tree of post models and controllers, as well as any additional items you may have placed in the tree.

The following illustrates a very simple extension to blueprint which adds an additional author section and parts is that out.

Using this as a template you are welcome to extend blueprint in anyway you can think to expand upon its draft file statements or the code it generates.

￼￼￼￼￼￼￼

￼￼
