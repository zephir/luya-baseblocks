# Baseblocks Module
 
File has been created with `module/create` command on LUYA version 1.0.0-dev. 
 
## Installation

In order to add the modules to your project go into the modules section of your config:

```php
return [
    'modules' => [
        // ...
        'baseblocks' => 'zephir\luya\baseblocks\frontend\Module',
        'baseblocksadmin' => 'zephir\luya\baseblocks\admin\Module',
        // ...
    ],
];
```

PSR-4 Binding in Composer JSON:

```json
"autoload": {
        "psr-4": {
            "zephir\\luya\\baseblocks\\" : "../luya-baseblocks/src"
        }
    },
```