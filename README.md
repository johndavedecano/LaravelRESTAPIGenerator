LaravelRESTAPIGenerator
=======================
A simple package that will help you save your time to create a basic RESTful API for Laravel.

# How to Install
1. First clone this package.
2. Edit your app.php and 'Jdecano\Api\ApiServiceProvider' to your available service providers.
3. Publish the config "php artisan config:publish jdecano/api"

# Usage
~~~
php artisan api:make --api_m=User --api_v=1.0
~~~
#Required Parameters
1. api_m = Your Eloquent Model
2. api_v = Version default to 1.0

# Example Output

After your run the command it will generate the following.

1. If you use User as your model, it will create ApiUserController.php
2. It will add Route::resource('api/1.0/users','ApiUserController'); at the end of the routes file.

## Retrive Users
**METHOD** - GET
**PATH** - /api/1.0/users
**PARAMS**
1. limit = N
2. index = Where to start
3. where = Find by column e.g first_name|=|Dave
4. like = Search by column e.g first_name=Dave
**RETURNS** - JSON


## Create User
**METHOD** - POST
**PATH** - /api/1.0/users
**PARAMS** - The column names. Note : Make sure your columns are fillable.
**RETURNS** - JSON

## Update User
**METHOD** - PUT/PATCH
**PATH** - /api/1.0/users/{id}
**PARAMS** - The column names. Note : Make sure your columns are fillable.
**RETURNS** - JSON

## DELETE User
**METHOD** - DELETE
**PATH** - /api/1.0/users/{id}
**RETURNS** - JSON



