---
title: Model Relationships
description: Blueprint also allows you to define many of the relationships available within Laravel.
extends: _layouts.documentation
section: content
---
## Model Relationships {#model-relationships}
Blueprint also allows you to define many of the relationships available within Laravel, including: `belongsTo`, `hasOne`, `hasMany`, and `belongsToMany`.

In fact, the `belongsTo` relationship is automatically generated for any column defined with the `id` column type or `foreign` attribute. While you may define the `belongsTo` relationship explicitly, it is not necessary. Simply defining the foreign key column or the `belongsTo` relationship is enough for Blueprint to automatically generate the correct columns and code.

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
      belongsTo: \Spatie\LaravelPermission\Models\Role
```

While you may specify the `relationships` anywhere within the model section, Blueprint recommends doing so at the bottom.

For each of these relationships, Blueprint will add the respective [Eloquent relationship](https://laravel.com/docs/eloquent-relationships) method within the generated model class. In addition, Blueprint will automatically generate the "pivot table" migration for any `belongsToMany` relationship.

To specify a model which is not part of your application, you may provide the fully qualified class name. Be sure to include the initial `\` (backslash). For example, `\Spatie\LaravelPermission\Models\Role`.

^^^
When defining relationships or [foreign keys](/docs/keys-and-indexes) it's important to remember the referenced tables must exist. While Blueprint makes an effort to generate migrations for "pivot tables" last, it is still possible encounter these errors. If so, you may define your models without these relationships or constraints and add them manually later.
^^^
