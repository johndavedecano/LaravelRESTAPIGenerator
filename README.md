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


