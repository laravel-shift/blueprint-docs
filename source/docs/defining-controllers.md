---
title: Defining Controllers
description: Learn how to define controllers to generate not only controllers, but events, jobs, mailables, and more with Blueprint.
extends: _layouts.documentation
section: content
---
## Defining Controllers {#defining-controllers}
Similar to [defining models](/docs/defining-models), Blueprint also supports defining _controllers_. You may do so within the `controllers` section, listing controllers by name. For each controller, you may define multiple `actions` which contain a list of _statements_.

Consider the `controllers` section of the following draft file:

```yaml
controllers:
  Post:
    index:
      query: all
      render: post.index with:posts
    create:
      render: post.create
    store:
      validate: title, content
      save: post
      redirect: post.index

  Comment:
    show:
      render: comment.show with:comment
```

From this definition, Blueprint will generate two controllers. A `PostController` with `index`, `create`, and `store` actions. And a `CommentController` with a `show` action.

While you may specify the full name of a controller, Blueprint will automatically suffix controller names with `Controller` to follow Laravel's naming conventions. So, for convenience, you may simply specify the root name of the controller - be it singular or plural.

Blueprint will generate the methods for each controller's actions. In addition, Blueprint will register routes for each action. The HTTP method will be inferred based on the action name. For example, Blueprint will register a `post` route for the `store` action. Otherwise, a `get` route will be registered.

For these reasons, Blueprint recommends defining [resource controllers](/docs/controller-shorthands#resource-shorthand). Doing so allows Blueprint to infer details and generate even more code automatically.

If you wish to namespace a controller, you may prefix the controller name. Blueprint will use this prefix as the namespace and properly save the generated controller class following Laravel conventions. For example, defining an `Api\Post` controller will generate a `App\Http\Controllers\Api\PostController` class saved as `app/Http/Controllers/Api/PostController.php`.

Review the [advanced configuration](/docs/advanced-configuration) to customize these namespaces and paths further.

Finally, Blueprint will analyze each of the statements listed within the action to generate the body of each controller method. For example, the above definition for the `index` action would generate the following controller method:

```php
public function index(Request $request): View
{
    $posts = Post::all();

    return view('post.index', compact('posts'));
}
```

Blueprint has statements for many of the common actions within Laravel. Some statements generate code beyond the controller. Review the [Controller Statements](/docs/controller-statements) section for a full list of statements and the code they generate.
