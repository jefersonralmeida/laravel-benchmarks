# Laravel/Lumen benchmarks

This repo have the same tiny project implemented in Laravel and Lumen. The goal here
is to be able to compare the frameworks performance.

The project is a simple Rest API CRUD for just one entity "customers", that have three fields: 
first_name, last_name and email. All fields are required and the email have to be a valid
email.

On Laravel we removed all the web related stuff, leaving just the API related structures. 

There are migrations and a seeder that creates 500 random customers inside the Laravel 
project.

On the root of this project, you have a json file, that can be used as payload for the 
create and update requests.

We also have a fresh install of both frameworks, for comparison. On this case, for
Laravel, we just removed the throttle protection (to allow the benchmark) and 
included a closure based route that just return the framework version (like Lumen have).

To serve the application you can use a Homestead machine, or host it on a cloud service.

Remember that, if you're using a mapped folder, the results won't be accurate, because
the loading from mapped folders can be slower than usual load.

Before executing any benchmark, check if the requests are working correctly using curl
or Postman.

Below you can see suggestions for benchmarks commands (using Apache Bench).

All commands send 1000 requests, always with 10 concurrent connections. The domains can 
be changed to fir you environment definitions.

Request que fresh frameworks
```
ab -n 1000 -c 10 http://fresh-lumen.local:80/
ab -n 1000 -c 10 http://fresh-laravel.local:80/
```

Paginated index of customers:
```
ab -n 1000 -c 10 http://lumen.local:80/customers
ab -n 1000 -c 10 http://laravel.local:80/customers
```

View of a single customer:
```
ab -n 1000 -c 10 http://lumen.local:80/customers/30
ab -n 1000 -c 10 http://laravel.local:80/customers/30
```

Create new customers:
```
ab -n 1000 -c 10 -p payload.json -T application/json http://lumen.local:80/customers
ab -n 1000 -c 10 -p payload.json -T application/json http://laravel.local:80/customers
```

Update a customer
```
ab -n 1000 -c 10 -u payload.json -T application/json http://lumen.local:80/customers/30
ab -n 1000 -c 10 -u payload.json -T application/json http://laravel.local:80/customers/30
```

