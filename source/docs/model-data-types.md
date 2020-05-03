---
title: Model Data Types
description: Description
extends: _layouts.documentation
section: content
---
## Model Data Types
Blueprint supports all of the [available column types](https://laravel.com/docs/migrations#creating-columns) within Laravel. Blueprint also has a built-in column type of `id`. This one of the [model shorthands](/docs/model-shorthands).

Some of these column types support additional attributes. For example, the `string` column type accepts a length, `decimal` accepts a _precision_ and _scale_, and an `enum` may accept a list of values.

Within Blueprint, you may define these attributes by appending the column type with a colon (':') followed by the attribute value. For example:

```yaml
payment_token: string:40
total: decimal:8,2
status: enum:pending,successful,failed
```

You may also specific _modifiers_ for each column. Blueprint supports most of the [column modifiers](https://laravel.com/docs/migrations#column-modifiers) available in Laravel, including: `autoIncrement`, `charset`, `collation`, `default`, `foreign`, `index`, `nullable`, `primary`, `unsigned`, `unique`, and `useCurrent`.

Similar to the column type attributes, the `foreign` modifier also supports attributes. This is discussed in [Keys and Indexes](/docs/keys-and-indexes).

The column type and modifiers are separated by a space. While you may specify these in any order, it's recommend to specify the column type first, then the modifiers. For example:

```yaml
email: string:100 nullable index
```
