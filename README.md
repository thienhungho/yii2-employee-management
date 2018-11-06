Yii2 Employee Management System
====================
Employee Management System for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thienhungho/yii2-employee-management "*"
```

or add

```
"thienhungho/yii2-employee-management": "*"
```

to the require section of your `composer.json` file.

### Migration

Run the following command in Terminal for database migration:

```
yii migrate/up --migrationPath=@vendor/thienhungho/EmployeeManagement/migrations
```

Or use the [namespaced migration](http://www.yiiframework.com/doc-2.0/guide-db-migrations.html#namespaced-migrations) (requires at least Yii 2.0.10):

```php
// Add namespace to console config:
'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationNamespaces' => [
            'thienhungho\EmployeeManagement\migrations\namespaced',
        ],
    ],
],
```

Then run:
```
yii migrate/up
```

Config
------------

Add module EmployeeManage to your `AppConfig` file.

```php
...
'modules'          => [
    ...
    /**
     * Block Manage
     */
    'employee-manage' => [
        'class' => 'thienhungho\CustomerManagement\modules\CustomerManage\CustomerManagerModule',
    ]
    ...
],
...
```

Modules
------------

[CustomerBase](https://github.com/thienhungho/yii2-customer-management/tree/master/src/modules/CustomerBase), [CustomerManage](https://github.com/thienhungho/yii2-customer-management/tree/master/src/modules/CustomerManage)

Functions
------------

[Core](https://github.com/thienhungho/yii2-customer-management/tree/master/src/functions/core.php)