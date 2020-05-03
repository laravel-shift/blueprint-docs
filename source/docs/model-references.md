---
title: Model References
description: Description
extends: _layouts.documentation
section: content
---
## Model References
For convenience, Blueprint will use the name of a controller to infer the related model. For example, Blueprint will assume a `PostController` relates to a `Post` model.

Blueprint also supports a dot (`.`) syntax for more complex references. This allows you to define values which reference columns on other models.

For example, to _find_ a `User` model within the `PostController` you may use:

```yaml
controllers:
  Post:
    show:
      find: user.id
      # ...
```

While these references will often be used within _Eloquent_ and `query` statements, they may be used in other statements as well. When necessary, Blueprint will convert these into variable references using an arrow (`->`) syntax.

Many times within a controller you will be referencing a model.￼ Blueprint attempts to infer the context based on the controller name.￼￼

However, there may be some statements where you need to reference additional models. You may do this by specifying the name of the model. This may be a model that you are generating in the current draft file or an existing model within your application.

You should reference these models using their class name. For example, User. If you have names based the model, you should pre-fix it with the appropriate name space relative to the model and space. For example, Admin\User.

If you wish to also reference a attribute of a model for one of the statements, you may specify it using.notation. For example, User.name.

Let’s consider the following draft file:

Based on the model name, blueprint willing for using the model post for any context that doesn’t reference a model by name.

In this case, the validate statement will use title, publish that on the post model.

However, well the index action will query all posts, ￼the show action will query all comments.￼￼￼￼

And the create action will find the user by ID.￼￼
