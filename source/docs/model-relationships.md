---
title: Model Relationships
description: Blueprint also allows you to define many of the relationships available within Laravel.
extends: _layouts.documentation
section: content
---
## Model Relationships {#model-relationships}
Blueprint also allows you to define many of the relationships available within Laravel, including: `belongsTo`, `hasOne`, `hasMany`, and `belongsToMany`.

In fact, the `belongsTo` relationship is automatically generated for any column defined with the `id` column type.

To define one of the additional relationships, you may add a `relationships` section to your model definition. Within this section, you specify the relationship type followed by a comma separated list of model names.

For example, the following definition adds some common relationships to a `Post` model:

```yaml
models:
  Post:
    title: string:400
    published_at: timestamp nullable
    relationships:
      hasMany: Comment
      belongsToMany: Media, Site
      belongsTo: \Spatie\LaravelPermission\Role
```

While you may specify the `relationships` anywhere within the model section, Blueprint recommends doing so at the bottom.

For each of these relationships, Blueprint will add the respective [Eloquent relationship](https://laravel.com/docs/eloquent-relationships) method within the generated model class. In addition, Blueprint will automatically generate the "pivot table" migration for any `belongsToMany` relationship.

If you want to specify a Model that does not exist in the configured models directory, but somewhere else (eg. in a third-party package), you can give the entire fully-qualified namespace to Blueprint - just make sure to prefix it with backslash(eg. `\Spatie\LaravelPermission\Models\Role` instead of `Role`).

^^^
When defining relationships or [foreign keys](/docs/keys-and-indexes) it's important to remember the referenced tables must exist. While Blueprint makes an effort to generate migrations for "pivot tables" last, it is still possible encounter these errors. If so, you may define your models without these relationships or constraints and add them manually later.
^^^
