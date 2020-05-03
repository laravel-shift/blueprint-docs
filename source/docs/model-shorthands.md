---
title: Model Shorthands
description: Description
extends: _layouts.documentation
section: content
---
## Model Shorthands
Blueprint provides several _shorthands_ when defining models. While using these may at time appear as invalid YAML, they are provided for developer convenience. Blueprint will properly expand these shorthands into valid YAML before parsing the draft file.

The primary model shorthand Blueprint provides is the automatic generation of the `id`, `created_at`, and `updated_at` columns on every model. You never need to specify these columns when defining models. Blueprint will always automatically add them prepend and append them to your column list accordingly.

Of course, you are able to define these yourself at anytime. For example, if you wish for the _id_ column to be a different column type.

You may also disable them by marking them as `false`. For example, to disable the _timestamp_ columns, you may add `timestamps: false` to your model definition. If you wish to generate the _timestamp_ columns with timezone column types, you may use the `timezonesTz` shorthand.

Blueprint also offers a `softDeletes` shorthand. Adding this to your model definition will generate the appropriate `deleted_at` column, as well add the `SoftDeletes` trait to your model. Similarly, if you want timezone information, you may use the `softDeletesTz` shorthand.

You may write these shorthands using the camel casing shown above or all lowercase. Blueprint supports both for developer convenience.

To illustrate using these shorthands, here is the _longhand_ definition of a model:

```yaml
models:
  Widget:
    id: id
    delete_at: timestamp
    created_at: timestamp
    update_at: timestamp
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
