---
title: Defining Models
description: Description
extends: _layouts.documentation
section: content
---
## Defining Models
Within the `models` section of a draft file you may define multiple models. Each model is defined with a _name_ followed by a list of columns. Columns are `key: value` pairs where `key` is the column name and `value` defines its attributes.

Expanding on the example above, this draft file defines multiple models:

```yaml
models:
  Post:
    title: string:400
    content: longtext
    published_at: nullable timestamp

  Comment:
    content: longtext
    published_at: nullable timestamp

  # additional models...
```

From this definition, Blueprint creates two models: `Post` and `Comment`, respectively. You may continue to define additional models.

Blueprint recommends defining the model name in its _StudlyCase_, singular form to follow Laravel's model naming conventions. For example, use `Post` instead of `post`, `Posts`, or `posts`.

For each of the model columns, the `key` will be used as the exact column name. The _attributes_ are a space separated string of [data types and modifiers](/docs/model-data-types).

For example, using the `Post` definition above, Blueprint would generate the following migration code:

```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title', 400);
    $table->longText('content');
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
});
```
