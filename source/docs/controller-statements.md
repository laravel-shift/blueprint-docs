---
title: Controller Statements
description: Blueprint comes with an expressive set of statements to define behavior common within Laravel controllers.
extends: _layouts.documentation
section: content
---
## Controller Statements {#controller-statements}
Blueprint comes with an expressive set of statements which define code within each controller action, but also additional components to generate.

Each statement is a `key: value` pair.

The `key` defines the _type_ of statement to generate. Currently, Blueprint supports the following types of statements: `delete`, `dispatch`, `find`, `fire`, `flash`, `query`, `redirect`, `render`, `resource`, `respond`, `save`, `send`, `store`, `update`, `validate`.


#### delete {#delete-statement}
Generates an Eloquent statement for deleting a model. Blueprint uses the controller action to infer which statement to generate.

For example, within a `destroy` controller action, Blueprint will generate a `$model->delete()` statement. Otherwise, a `Model::destroy()` statement will be generated.


#### dispatch {#dispatch-statement}
Generates a statement to dispatch a [Job](https://laravel.com/docs/queues#creating-jobs) using the `value` to instantiate an object and pass any data.

For example:

```yaml
dispatch: SyncMedia with:post
```

If the referenced _job_ class does not exist, Blueprint will create one using any data to define properties and a `__construct` method which assigns them.


#### find {#find-statement}
Generates an Eloquent `find` statement. If the `value` provided is a qualified [reference](#references), Blueprint will expand the reference to determine the model. Otherwise, Blueprint will attempt to use the controller to determine the related model.


#### fire {#fire-statement}
Generates a statement to dispatch a [Event](https://laravel.com/docs/events#defining-events) using the `value` to instantiate the object and pass any data.

For example:

```yaml
fire: NewPost with:post
```

If the referenced _event_ class does not exist, Blueprint will create one using any data to define properties and a `__construct` method which assigns them.


#### flash {#flash-statement}
Generates a statement to [flash data](https://laravel.com/docs/session#flash-data) to the session. Blueprint will use the `value` as the session key and expands the reference as the session value.

For example:

```yaml
flash: post.title
```


#### query {#query-statement}
Generates an Eloquent query statement using `key:value` pairs provided in `value`. Keys may be any of the basic query builder methods for [`where` clauses](https://laravel.com/docs/queries#where-clauses) and [ordering](https://laravel.com/docs/queries#ordering-grouping-limit-and-offset).

For example:

```yaml
query: where:title where:content order:published_at limit:5
```

Currently, Blueprint supports generating query statements for `all`, `get`, `pluck`, and `count`.


#### redirect {#redirect-statement}
Generates a `return redirect()` statement using the `value` as a reference to a named route passing any data parameters.

For example:

```yaml
redirect: post.show with:post
```


#### render {#render-statement}
Generates a `return view();` statement for the referenced template with any additional view data as a comma separated list.

For example:

```yaml
view: post.show with:post,foo,bar
```

When the template does not exist, Blueprint will generate the Blade template for the view.


#### resource {#resource-statement}
Generates response statement for the [Resource](https://laravel.com/docs/7.x/eloquent-resources) to the referenced model. You may prefix the plural model reference with `collection` or `paginate` to return a resource collection or paginated collection, respectively.

If the resource for the referenced model does not exist, Blueprint will create one using the model definition.

For example:

```yaml
resource: user
resource: paginate:users
```

When the template does not exist, Blueprint will generate the Blade template for the view.


#### respond {#respond-statement}
Generates a response which returns the given value. If the value is an integer, Blueprint will generate the proper `response()` statement using the value as the status code. Otherwise, the value will be used as the name of the variable to return.

For example:

```yaml
respond: post.show with:post
```

When the template does not exist, Blueprint will generate the Blade template for the view.


#### save {#save-statement}
Generates an Eloquent statement for saving a model. Blueprint uses the controller action to infer which statement to generate.

For example, for a `store` controller action, Blueprint will generate a `Model::create()` statement. Otherwise, a `$model->save()` statement will be generated.


#### send {#send-statement}
Generates a statement to send a [Mailable](https://laravel.com/docs/mail#generating-mailables) using the `value` to instantiate the object, specify the recipient, and pass any data.

For example:

```yaml
send: ReviewNotification to:post.author with:post
```

If the referenced _mailable_ class does not exist, Blueprint will create one using any data to define properties and a `__construct` method which assigns them.


#### store {#store-statement}
Generates a statement to [store data](https://laravel.com/docs/7.x/session#storing-data) to the session. Blueprint will slugify the `value` as the session key and expands the reference as the session value.

For example:

```yaml
store: post.title
```

Generates:

```php
$request->session()->put('post-title', $post->title);
```


#### update {#update-statement}
Generates an Eloquent statement for updating the referenced model. Blueprint will use the values from a preceding `validate` statement to determine the columns to update.

For example:

```yaml
update: post
```


#### validate {#validate-statement}
Generates a form request with _rules_ based on the referenced model definition. Blueprint accepts a `value` containing a comma separated list of column names.

For example:

```yaml
validate: title, content, author_id
```

Blueprint also updates the type-hint of the injected request object.
