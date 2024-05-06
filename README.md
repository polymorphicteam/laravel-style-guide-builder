# Laravel Style Guide
Use to quickly generate living style guides for laravel projects.

## Setup and configuration
1. Publish the package
```bash
php artisan vendor:publish
```
2. Configure the package: {project_dir} > config > styleguide.php
3. Customize the templates published to resources/views/vendor/styleguide (Currently uses Foundation Zurb as the default)

## Creating new pages
1. Add new blade files to the components directory under resources/views/vendor/styleguide
2. Component files are used to auto-generate the style guides navigation menu
3. Ordering of the menu items is customizable using menu variable in the config file: config > styleguide.php

## Formatting pages
Blade methods used to generate html:
```php
@component('styleguide::code-head')
    {{--Component Name Here--}}
@endcomponent

@component('styleguide::code', [
    'title' => 'Standard Button',
    'note' => 'You can put some additional notes here',
])

    <a class="button primary" href="#">Example Button</a>

@endcomponent

```

