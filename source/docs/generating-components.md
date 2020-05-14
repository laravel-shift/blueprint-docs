---
title: Generating Components
description: Learn how to rapidly generate Laravel components using a Blueprint draft file.
extends: _layouts.documentation
section: content
---
## Generating Components {#generating-components}
Using Blueprint's `artisan` commands you may generate multiple Laravel components from a _draft_ file. The draft file contains a [definition](#defining-components) using a YAML syntax, with a few _shorthands_ for convenience.

By default, the `blueprint:build` command attempts to load a `draft.yaml` (or `draft.yml`) file. While you are welcome to create your own _draft_ files, it's common to simply reuse the `draft.yaml` file over and over again to continue to generate code for your application.

### Draft file syntax {#draft-file-syntax}
Within the draft file you define _models_ and _controllers_ using an expressive, human-readable YAML syntax.

Let's review the following draft file:

```yaml
models:
  Post:
    title: string:400
    content: longtext
    published_at: nullable timestamp

controllers:
  Post:
    index:
      query: all
      render: post.index with:posts

    store:
      validate: title, content
      save: post
      send: ReviewNotification to:post.author with:post
      dispatch: SyncMedia with:post
      fire: NewPost with:post
      flash: post.title
      redirect: post.index
```

This draft file defines a model named `Post` and a controller with two actions: `index` and `store`.

While this YAML might seem dense at first, the syntax aligns nicely with the same syntax you'd use within Laravel. For example, all of the column data types are the same you would use when [creating columns](https://laravel.com/docs/migrations#columns) in a migration.

In addition, the _statements_ within each controller actions use familiar terms like `validate`, `save`, and `fire`.

Blueprint also leverages conventions and uses shorthands whenever possible. For example, you don't need to define the `id`, `created_at`, and `updated_at` columns. Blueprint automatically generates these for models.

You also don't have to specify the _Controller_ suffix when defining a controller. Blueprint automatically appends it when not present. All of this aligns with Blueprints goal of _rapid development_.

### Generated code {#generated-code}
From just these 20 lines of YAML, Blueprint will generate all of the following Laravel components:

- A _model_ class for `Post` complete with `fillable`, `casts`, and `dates` properties, as well as relationships methods.
- A _migration_ to create the `posts` table.
- A [_factory_](https://laravel.com/docs/database-testing) intelligently set with fake data.
- A _controller_ class for `PostController` with `index` and `store` actions complete with code generated for each [statement](#statements).
- Resource _routes_ for the `PostController` actions.
- A [_form request_](https://laravel.com/docs/validation#form-request-validation) of `StorePostRequest` validating `title` and `content` based on the `Post` model definition.
- A _mailable_ class for `ReviewNotification` complete with a `post` property set through the _constructor_.
- A _job_ class for `SyncMedia` complete with a `post` property set through the _constructor_.
- An _event_ class for `NewPost` complete with a `post` property set through the _constructor_.
- A _Blade template_ of `post/index.blade.php` rendered by `PostController@index`.
- An [HTTP Test](https://laravel.com/docs/http-tests) complete with respective _arrange_, _act_, and _assert_ sections for the `PostController` actions.

While this draft file only defines a single model and controller, you may define multiple models and controllers.
