---
title: Title
description: Description
extends: _layouts.documentation
section: content
---
## Model Relationships
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
      hasMany: Comments
      belongsToMany: Media, Sites
```

While you may specify the `relationships` anywhere within the model section, Blueprint recommends doing so at the bottom.

For each of these relationships, Blueprint will add the respective [Eloquent relationship](https://laravel.com/docs/7.x/eloquent-relationships) method within the generated model class. In addition, Blueprint will automatically generate the "pivot table" migration for any `belongsToMany` relationship.

^^^
TODO: Order of migrations is important
^^^
