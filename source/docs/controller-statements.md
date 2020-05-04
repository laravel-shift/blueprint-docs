---
title: Controller Statements
description: Blueprint comes with an expressive set of statements to define behavior common within Laravel controllers.
extends: _layouts.documentation
section: content
---
## Controller Statements
Blueprint comes with an expressive set of statements which define code within each controller action, but also additional components to generate.

Each statement is a `key: value` pair.

The `key` defines the _type_ of statement to generate. Currently, Blueprint supports the following types of statements: `delete`, `dispatch`, `find`, `fire`, `flash`, `query`, `redirect`, `render`, `resource`, `respond`, `save`, `send`, `store`, `update`, `validate`.


<a name="delete-statement"></a>
**delete**
Generates an Eloquent statement for deleting a model. Blueprint uses the controller action to infer which statement to generate.

For example, within a `destroy` controller action, Blueprint will generate a `$model->delete()` statement. Otherwise, a `Model::destroy()` statement will be generated.


<a name="dispatch-statement"></a>
**dispatch**
Generates a statement to dispatch a [Job](https://laravel.com/docs/queues#creating-jobs) using the `value` to instantiate an object and pass any data.

For example:

```yaml
dispatch: SyncMedia with:post
```

If the referenced _job_ class does not exist, Blueprint will create one using any data to define properties and a `__construct` method which assigns them.


<a name="find-statement"></a>
**find**
Generates an Eloquent `find` statement. If the `value` provided is a qualified [reference](#references), Blueprint will expand the reference to determine the model. Otherwise, Blueprint will attempt to use the controller to determine the related model.


<a name="fire-statement"></a>
**fire**
Generates a statement to dispatch a [Event](https://laravel.com/docs/events#defining-events) using the `value` to instantiate the object and pass any data.

For example:

```yaml
fire: NewPost with:post
```

If the referenced _event_ class does not exist, Blueprint will create one using any data to define properties and a `__construct` method which assigns them.


<a name="flash-statement"></a>
**flash**
Generates a statement to [flash data](https://laravel.com/docs/session#flash-data) to the session. Blueprint will use the `value` as the session key and expands the reference as the session value.

For example:

```yaml
flash: post.title
```


<a name="query-statement"></a>
**query**
Generates an Eloquent query statement using `key:value` pairs provided in `value`. Keys may be any of the basic query builder methods for [`where` clauses](https://laravel.com/docs/queries#where-clauses) and [ordering](https://laravel.com/docs/queries#ordering-grouping-limit-and-offset).

For example:

```yaml
query: where:title where:content order:published_at limit:5
```

Currently, Blueprint supports generating query statements for `all`, `get`, `pluck`, and `count`.


<a name="redirect-statement"></a>
**redirect**
Generates a `return redirect()` statement using the `value` as a reference to a named route passing any data parameters.

For example:

```yaml
redirect: post.show with:post
```


<a name="render-statement"></a>
**render**
Generates a `return view();` statement for the referenced template with any additional view data as a comma separated list.

For example:

```yaml
view: post.show with:post,foo,bar
```

When the template does not exist, Blueprint will generate the Blade template for the view.


<a name="resource-statement"></a>
**resource**
Generates response statement for the [Resource](https://laravel.com/docs/7.x/eloquent-resources) to the referenced model. You may prefix the plural model reference with `collection` or `paginate` to return a resource collection or paginated collection, respectively.

If the resource for the referenced model does not exist, Blueprint will create one using the model definition.

For example:

```yaml
resource: user
resource: paginate:users
```

When the template does not exist, Blueprint will generate the Blade template for the view.


<a name="respond-statement"></a>
**respond**
Generates a response which returns the given value. If the value is an integer, Blueprint will generate the proper `response()` statement using the value as the status code. Otherwise, the value will be used as the name of the variable to return.

For example:

```yaml
respond: post.show with:post
```

When the template does not exist, Blueprint will generate the Blade template for the view.


<a name="save-statement"></a>
**save**
Generates an Eloquent statement for saving a model. Blueprint uses the controller action to infer which statement to generate.

For example, for a `store` controller action, Blueprint will generate a `Model::create()` statement. Otherwise, a `$model->save()` statement will be generated.


<a name="send-statement"></a>
**send**
Generates a statement to send a [Mailable](https://laravel.com/docs/mail#generating-mailables) using the `value` to instantiate the object, specify the recipient, and pass any data.

For example:

```yaml
send: ReviewNotification to:post.author with:post
```

If the referenced _mailable_ class does not exist, Blueprint will create one using any data to define properties and a `__construct` method which assigns them.


<a name="store-statement"></a>
**store**
Generates a statement to [store data](https://laravel.com/docs/7.x/session#storing-data) to the session. Blueprint will slugify the `value` as the session key and expands the reference as the session value.

For example:

```yaml
store: post.title
```

Generates:

```php
$request->session()->put('post-title', $post->title);
```


<a name="update-statement"></a>
**update**
Generates an Eloquent statement for updating the referenced model. Blueprint will use the values from a preceding `validate` statement to determine the columns to update.

For example:

```yaml
update: post
```


<a name="validate-statement"></a>
**validate**
Generates a form request with _rules_ based on the referenced model definition. Blueprint accepts a `value` containing a comma separated list of column names.

For example:

```yaml
validate: title, content, author_id
```

Blueprint also updates the type-hint of the injected request object.
