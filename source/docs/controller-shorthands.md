---
title: Controller Shorthands
description: Learn to use syntax shorthands to generate controllers even faster with Blueprint.
extends: _layouts.documentation
section: content
---
## Controller Shorthands {#controller-shorthands}
In addition to some of the statement shorthands and model reference conveniences, Blueprint also offers shorthands for generating [resource](#resource-shorthand) and [invokable](#invokable-shorthand) controllers.

### Resource Shorthand {#resource-shorthand}
This aligns with Laravel‘s preference for creating [resource controllers](https://laravel.com/docs/controllers#resource-controllers).

Instead of having to write out all of the actions and statements common to CRUD behavior within your controllers, you may instead use the `resource` shorthand.

The `resource` shorthand automatically infers the model reference based on the controller name. Blueprint will expand this into the 7 resource actions with the appropriate statements for each action: `index`, `create`, `store`, `show`, `edit`, `update`, and `destroy`.

For example, the following represents the _longhand_ definition of resource controller:

```yaml
controllers:
  Post:
    index:
      query: all:posts
      render: post.index with:posts
    create:
      render: post.create
    store:
      validate: post
      save: post
      flash: post.id
      redirect: post.index
    show:
      render: post.show with:post
    edit:
      render: post.edit with:post
    update:
      validate: post
      update: post
      flash: post.id
      redirect: post.index
    destroy:
      delete: post
      redirect: post.index
```

Instead, you may generate the equivalent by simply writing `resource`.

```yaml
controllers:
  Post:
    resource
```

By default, the `resource` shorthand generates the 7 _web_ resource actions. Of course, you are welcome to set this explicitly as `resource: web`.

Blueprint doesn’t stop there. You may also specify a value of `api`. A value of `api` would generate the 5 resource actions of an API controller with the appropriate statements and responses for each action: `index`, `store`, `show`, `update`, and `destroy`.

You may also specify the exact controller actions you wish to generate by specifying any of the 7 resource actions as a comma separated list. If you wish to use the API actions, prefix the action with `api.`.

The following examples demonstrates which methods would be generated for each of the shorthands.

```yaml
# generate only index and show actions
resource: index, show

# generate only store and update API actions
resource: api.store, api.update

# generate "web" index and API destroy actions
resource: index, api.destroy
```

While you may use this shorthand to generate these controller actions quickly, and update the code after, you may also combine the `resource` shorthand with any additional actions or even override the defaults.

The following example demonstrates the definition for controller which will generate the all 7 resource actions, plus a `download` action, and will use the defined statements for the `show` action instead of the shorthand defaults.

```yaml
controllers:
  Post:
    resource: all
    download:
      find: post.id
      respond: post
    show:
      query: comments where:post.id
      render: post.show with:post,comments
```

### Invokable Shorthand {#invokable-shorthand}
You can also use Blueprint to generate [single action controllers](https://laravel.com/docs/controllers#single-action-controllers),
using the `invokable` shorthand:

```yaml
controllers:
  Report:
    invokable
```

The above draft is equivalent to explicitly defining a method returning a view (the shorthand infers the view name from the 
controller name):

```yaml
controllers:
  Report:
    __invoke:
      render: report
```

You can also use any of the [controller statements](/docs/controller-statements) as usual, and use the `invokable`
keyword if you don't like underscores in your drafts:
```yaml
controllers:
  Report:
    invokable:
      fire: ReportGenerated
      render: report
```

All of the above drafts would generate routes proper for an invokable controller, based on the value of `generate_fqcn_route`
in your [configuration](/docs/advanced-configuration).
```php
Route::get('/report', 'ReportController');

// or using class-based routes
Route::get('/report', App\Http\Controllers\ReportController::class);
```

