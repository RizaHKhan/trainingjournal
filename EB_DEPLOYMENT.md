## ZIP method

EB deployment was very straightforward with [zip](https://www.youtube.com/watch?v=ISVaMijczKc) method.

1. Create a zip file, and upload it to an environment.
2. To get past the `forbidden` error, go to configurations and add `/public` as the Document Root.

3. That still won't help because the next error will be `404/ngnix`. To get past this follow the steps outlined [here](https://stackoverflow.com/questions/61640771/any-aws-eb-laravel-route-getting-404-not-found-nginx-1-16-1),

4. Next, update the variables for the database connection. I did the following:

`database.php`

```

define('RDS_HOSTNAME', $_SERVER['RDS_HOSTNAME']);
define('RDS_USERNAME', $_SERVER['RDS_USERNAME']);
define('RDS_PASSWORD', $_SERVER['RDS_PASSWORD']);
define('RDS_DB_NAME', $_SERVER['RDS_DB_NAME']);

// And in the database section use the above defined variables

'pgsql' => [
    'driver'         => 'pgsql',
    'url'            => env('DATABASE_URL'),
    'host'           => RDS_HOSTNAME,
    'port'           => env('RDS_PORT', '5432'),
    'database'       => RDS_DB_NAME,
    'username'       => RDS_USERNAME,
    'password'       => RDS_PASSWORD,
    'charset'        => 'utf8',
    'prefix'         => '',
    'prefix_indexes' => true,
    'search_path'    => 'public',
    'sslmode'        => 'prefer',
],
```

4. That still won't help because we haven't run any migrations.

To get past this error do the following, create a `.ebextensions/init.config` and add the following code:

```
container_commands:
  01initdb:
    command: "php artisan migrate"

```

Command to convert folder to zip is:

```
zip ..Downloads/laravel-v2-rds.zip -r * .[^.]* -x "vendor/*"
```

### Resources

[Deploying a Laravel application to Elastic Beanstalk](https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/php-laravel-tutorial.html#php-laravel-tutorial-launch)
