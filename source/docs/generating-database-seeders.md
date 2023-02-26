---
title: Generating Database Seeders
description: Learn how to define seeders with Blueprint to generate database seeders which leverage the generated model factories.
extends: _layouts.documentation
section: content
---
## Generating Database Seeders {#defining-models}
Blueprint also supports defining a `seeders` section within a draft file to generate [database seeders](https://laravel.com/docs/seeding) for a given model.

The syntax for this section is simply `seeders: value`, where `value` is a comma separated list of [model references](/docs/model-references).

For example:

```yaml
models:
  Post:
    title: string:400
    content: longtext
    published_at: nullable timestamp

  Comment:
    post_id: id
    content: longtext
    user_id: id

  User:
    name: string

seeders: Post, Comment
```

From this definition, Blueprint will create two seeders: `PostSeeder` and `CommentSeeder`, respectively.

Notice Blueprint does not create a `UserSeeder`  in this instance since it was not included in the list of model references.

The code within the generated seeder uses the [model factories](https://laravel.com/docs/database-testing#writing-factories) to seed the database with 5 records.

For example, within the `PostSeeder`, Blueprint would generate the following code:

```php
public function run(): void
{
    factory(\App\Post::class, 5)->create();
}
```
