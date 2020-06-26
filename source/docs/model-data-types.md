---
title: Model Data Types
description: Blueprint supports all of the column types within Laravel, as well as a few shorthands for defining models.
extends: _layouts.documentation
section: content
---
## Model Data Types {#model-data-types}
Blueprint supports all of the [available column types](https://laravel.com/docs/migrations#creating-columns) within Laravel. Blueprint also has a built-in column type of `id`. This is one of the [model shorthands](/docs/model-shorthands).

Some of these column types support additional attributes. For example, the `string` column type accepts a length, `decimal` accepts a _precision_ and _scale_, and an `enum` may accept a list of values.

Within Blueprint, you may define these attributes by appending the column type with a colon (':') followed by the attribute value. For example:

```yaml
payment_token: string:40
total: decimal:8,2
status: enum:pending,successful,failed
```

You may also specify _modifiers_ for each column. Blueprint supports most of the [column modifiers](https://laravel.com/docs/migrations#column-modifiers) available in Laravel, including: `autoIncrement`, `charset`, `collation`, `default`, `foreign`, `index`, `nullable`, `primary`, `unsigned`, `unique`, and `useCurrent`.

^^^
To give you full control, Blueprint uses the literal value you define for the `default` modifier. For example, defining an _integer_ with `default:1`, versus a _string_ with `default:'1'`.
^^^

Similar to the column type attributes, the `foreign` modifier also supports attributes. This is discussed in [Keys and Indexes](/docs/keys-and-indexes).

The column type and modifiers are separated by a space. While you may specify these in any order, it's recommend to specify the column type first, then the modifiers. For example:

```yaml
email: string:100 nullable index
```

^^^
When specifying an attribute or modifier value which contains a space, you must wrap the value in double quotes (`"`). For example, `enum:Ordered,Completed,"On Hold"`. Blueprint will _unwrap_ the value during parsing.
^^^
