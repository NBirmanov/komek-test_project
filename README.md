<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel Test Project Komek

Тестовый проект на Laravel для демонстрации backend-логики и работы с базой данных. Подготовлен тестовый seed с готовыми данными для теста и демонстрации работоспособности проекта.
Есть три таблицы: Movie, Genre, Session, которые связаны ключами «один ко многим».
Для создания фейковых или тестовых данных написана простая логика: сначала создаются жанры, затем при создании тестового фильма задаются имя и изображение. Изображение сохраняется в storage/public/images, а в базе сохраняется URL с путем к файлу изображения.
Перед созданием таблицы жанры берутся из готового массива, а при создании фильма жанры записываются в таблицу genre_movie с полями movie_id и genre_id. Далее, при создании сеансов, к ним прикрепляется соответствующий фильм.
Затем написан простой crud контроллер. Пока не используется полноценный crud, но реализованы методы, которые в будущем можно будет использовать для добавления фильмов через интерфейс. В методе index продемонстрирована простая логика фильтрации по дате.

##

**Komek Test Project** — это веб-приложение, разработанное на Laravel.  
Проект показывает работу с:

- MVC архитектурой
- Миграциями и сидерами
- Eloquent ORM
- Blade-шаблоны
- HTML5 / CSS3 / JavaScript

## Установка

```bash
git clone git@github.com:NBirmanov/komek-test_project.git
cd komek-test_project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
ftware licensed under the [MIT license](https://opensource.org/licenses/MIT).
# komek-test_project
