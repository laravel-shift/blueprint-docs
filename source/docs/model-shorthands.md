---
title: Model Shorthands
description: Learn to use syntax shorthands to generate models even faster with Blueprint.
extends: _layouts.documentation
section: content
---
## Model Shorthands {#model-shorthands}
Blueprint provides several _shorthands_ when defining models. While using these may at time appear as invalid YAML, they are provided for developer convenience. Blueprint will properly expand these shorthands into valid YAML before parsing the draft file.

Blueprint provides an implicit model shorthand by automatically generating the `id` and _timestamp_ (`created_at`, and `updated_at`) columns on every model. You never need to specify these columns when defining models.

Of course, you are able to define these yourself at anytime. For example, if you want to use a different column type for the _id_ column, like `uuid`.

You may also disable them by marking them as `false`. For example, to disable the _timestamp_ columns, you may add `timestamps: false` to your model definition. If you wish to generate the _timestamp_ columns with timezone column types, you may use the `timestampsTz` shorthand.

Blueprint also offers a `softDeletes` shorthand. Adding this to your model definition will generate the appropriate `deleted_at` column, as well add the `SoftDeletes` trait to your model. Similarly, if you want timezone information, you may use the `softDeletesTz` shorthand.

You may write these shorthands using the camel casing shown above or all lowercase. Blueprint supports both for developer convenience.

To illustrate using these shorthands, here is the _longhand_ definition of a model:

```yaml
models:
  Widget:
    id: id
    deleted_at: timestamp
    created_at: timestamp
    updated_at: timestamp
```

And again using shorthands:

```yaml
models:
  Widget:
    id
    softDeletes
    timestamps
```

And finally, leveraging the full power of Blueprint by also using implicit model shorthands:

```yaml
models:
  Widget:
    softDeletes
```
