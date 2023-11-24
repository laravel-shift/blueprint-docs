---
title: Model Relationships
description: Blueprint also allows you to define many of the relationships available within Laravel.
extends: _layouts.documentation
section: content
---
## Model Relationships {#model-relationships}
Blueprint also allows you to define many of the relationships available within Laravel, including: `belongsTo`, `hasOne`, `hasMany`, and `belongsToMany`.

^^^
While you may define the `belongsTo` relationship explicitly, it is not necessary. Simply defining a column with the `id` data type or `foreign` attribute is enough for Blueprint to automatically generate the relationship.
^^^

To define one of these relationships, you may add a `relationships` section to your model definition. Within this section, you specify the relationship type followed by a comma separated list of model names.

For example, the following definition adds some common relationships to a `Post` model:

```yaml
models:
  Post:
    title: string:400
    published_at: timestamp nullable
    relationships:
      hasMany: Comment
      belongsToMany: Media, Site
      belongsTo: \Spatie\LaravelPermission\Models\Role
```

^^^
While you may specify the `relationships` anywhere within the model section, Blueprint recommends doing so at the bottom.
^^^

For each of these relationships, Blueprint will add the respective [Eloquent relationship](https://laravel.com/docs/eloquent-relationships) method within the generated model class. In addition, Blueprint will automatically generate the "pivot table" migration for any `belongsToMany` relationship.

^^^
When defining relationships or [foreign keys](/docs/keys-and-indexes) the referenced tables must exist. While Blueprint makes an effort to generate migrations for "pivot tables" last, it is still possible to encounter errors. If so, you may define your models without these relationships or constraints and add them manually later.
^^^

To specify a model which is not part of your application, you may provide the fully qualified class name. Be sure to include the initial `\` (backslash). For example, `\Spatie\LaravelPermission\Models\Role`.

You may also _alias_ any of the relationships to give them a different name by suffixing the model name by appending the model name with a colon (`:`) followed by the name. For example:

```yaml
models:
  Post:
    relationships:
      hasMany: Comment:reply
```

Blueprint will automatically pluralize the alias correctly based on the relationship type. In the case of a `belongsToMany` relationship, an alias will also be used as the pivot table name.

Sometimes you may want to use an [intermediate model](https://laravel.com/docs/eloquent-relationships#defining-custom-intermediate-table-models) for a `belongsToMany` relationship. If so, you may prefix the alias with an ampersand (`&`) and reference the model name. For example:

```yaml
User:
  relationships:
    belongsToMany: Team:&Membership
```
