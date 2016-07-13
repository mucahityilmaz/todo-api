#HOW TO INSTALL

- install composer (if not globally installed on your machine)

- go to project directory

- ```composer install``` ( or ```php composer.phar install``` )

- change .env file in project directory for your db credentials

- ```php artisan migrate```

- ```php artisan db:seed```

- ```chmod -R 777 storage```

- ```chmod -R 777 bootstrap/cache```

- set your virtual host configuration for ```http://todo-api.dev``` to ```public/``` directory and don't forget to add it to your hosts file

- set your apache conf to ```AllowOverride All``` for project directory

- check ```http://todo-api.dev``` for laravel requirements (i.e. ```>= PHP 5.5.9```, ```mod_encrypt```, ```mod_rewrite``` i.e.)

- you should be good to go: ```curl -u "username:passw0rd" http://todo-api.dev/v1/lists```