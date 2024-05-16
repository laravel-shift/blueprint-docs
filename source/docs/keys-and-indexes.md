---
title: Model Keys and Indexes
description: Blueprint supports keys and indexes on your models through the column definition and by leveraging convention.
extends: _layouts.documentation
section: content
---
## Model Keys and Indexes {#model-keys-indexes}
Blueprint supports keys and indexes on your models through the column definition and by leveraging convention.

Within the column definition, you may specify a key or index using the `id` column type or the `foreign`, `index`, or `unique` column modifiers.

The simplest of these are the `index` and `unique` modifiers. Blueprint will generate the necessary code to the migration to add the _index_. In turn, Laravel will create an index for this column.

The `foreign` column modifier will also generate the necessary code to create an index on the column. In addition, it will generate code to add the reference and cascade "on delete" constraints.

By default, Blueprint will automatically infer the foreign reference from the column name just as Laravel does. For example, a column name of `user_id`, would imply a reference to the `id` column of the `users` table.

If you are not following Laravel's naming conventions, you may set the attribute on the `foreign` modifier. Blueprint supports either the foreign table name or the table and column name using dot notation.

For example, all of the following column definitions generate a foreign reference to the `id` column of the `users` table.

```yaml
    user_id: id foreign
    owner_id: id foreign:users
    uid: id foreign:users.id
```

Finally, while the `id` column type does not create an explicit index on the database, it does imply a foreign key relationships for the model.

Similar to the `foreign` column modifier, you may specify an attribute on the `id` column type. In this case, you specify the foreign model name or the model and column name using dot notation.

^^^
Blueprint will always create model relationships for `id` and `uuid` columns. So it is only necessary to specify `foreign` when you want to generate constraints. If you always want to generate foreign key constraints, you should enable at the `use_constraints` [configuration option](/docs/advanced-configuration).
^^^


### Composite Indexes {#composite-indexes}
Blueprint also supports adding a composite index. You may do so adding the `indexes` key to your model definition. This key accepts an array of key/value pairs, where the key is the type of index and the value is a comma separated list of column names. 

For example, this will add a unique composite index on the `owner_id` and the `badge_number` column of the `users` table.

```yaml
  User:
    indexes:
      - unique: owner_id, badge_number
```
