<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Install
#### cp .env.example .env
#### docker-compose up -d
#### docker exec -it api_crud_app /bin/bash
#### 
inside the container execute next commands:
#### composer install
#### php artisan key:generate
#### php artisan migrate
#### php artisan db:seed
#
endpoint - http://127.0.0.1:8000


###   ApiMethods
GET|HEAD        api/posts ................................................................................................. posts.index › PostsController@index
POST            api/posts ................................................................................................. posts.store › PostsController@store
GET|HEAD        api/posts/{post} ............................................................................................ posts.show › PostsController@show
PUT|PATCH       api/posts/{post} ........................................................................................ posts.update › PostsController@update
DELETE          api/posts/{post} ...................................................................................... posts.destroy › PostsController@destroy

GET|HEAD        api/tags .................................................................................................... tags.index › TagsController@index
POST            api/tags .................................................................................................... tags.store › TagsController@store
GET|HEAD        api/tags/{tag} ................................................................................................ tags.show › TagsController@show
PUT|PATCH       api/tags/{tag} ............................................................................................ tags.update › TagsController@update
DELETE          api/tags/{tag} .......................................................................................... tags.destroy › TagsController@destroy
