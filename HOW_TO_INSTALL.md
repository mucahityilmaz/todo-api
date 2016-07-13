**HOW TO INSTALL**

1) install composer (if not globally installed on your machine)

2) go to project directory

3) ```composer install``` ( or ```php composer.phar install``` )

4) change .env file in project directory for your db credentials

5) ```php artisan migrate```

6) ```php artisan db:seed```

7) ```chmod -R 777 storage```

8) ```chmod -R 777 bootstrap/cache```

9) set your virtual host configuration for ```http://todo-api.dev``` to ```public/``` directory and don't forget to add to your hosts file

10) set your apache conf to ```AllowOverride All``` for project directory

11) check ```http://todo-api.dev``` for laravel requirements (i.e. ```>= PHP 5.5.9```, ```mod_encrypt```, ```mod_rewrite``` i.e.)

12) you should be good to go: ```curl -u "username:passw0rd" http://todo-api.dev/v1/lists```