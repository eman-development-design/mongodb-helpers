# How To contribute to MongoDB Helpers

## Pull Requests

MongoDB Helpers follows [git flow](https://danielkummer.github.io/git-flow-cheatsheet/) rules when making branches, 
never ever make a branh off master, always build it off of develop.

## Coding Conventions

MongoDB Helpers uses editorconfig to help maintain a coding standard, all IDEs support it so there shouldn't be an excuse in not following it.

an overview of what we follow:

you are to always use spaces, never tabs, you should be use 4 spaces, the only exception is json files which has to be 2 spaces.

always use a bracket, skipping them will get denied in pull request, the bracket should be after the keywords.

This is what I'll be looking for:

```php
if (condition)
{
}
```
