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
     * Employee Manage
     */
    'employee-manage' => [
        'class' => 'thienhungho\EmployeeManagement\modules\EmployeeManage\EmployeeManageModules',
    ]
    ...
],
...
```

Modules
------------

[EmployeeBase](https://github.com/thienhungho/yii2-employee-management/tree/master/src/modules/EmployeeBase), [EmployeeManage](https://github.com/thienhungho/yii2-employee-management/tree/master/src/modules/EmployeeManage)

Functions
------------

[Core](https://github.com/thienhungho/yii2-employee-management/tree/master/src/functions/core.php)

Models
------------

[Employee](https://github.com/thienhungho/yii2-employee-management/tree/master/src/models/Employee.php)

Constant
------------

[Core](https://github.com/thienhungho/yii2-employee-management/tree/master/src/const/core.php)