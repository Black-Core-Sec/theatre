<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel application for testing

## Task

Мы делаем сайт для, небольшого, провинциального театра. Город N, в котором находится театр маленький, публики не много, поэтому спектакли проводятся строго один раз в день, в 19:00.

Нам прежде всего предстоит реализовать афишу. У нас есть администратор театра, Оксана Григорьевна, уважаемая женщина. Она и будет вносить расписание спектаклей.

Спектакль характеризуется свойствами:

- Название
- Дата начала (19-02-2019)
- Дата окончания (21-03-2019)

У нас методы create, index, delete.

При добавлении нового спектакля, если у нас есть уже спектакль на эти даты - мы выводим ошибку.

Систему авторизации писать не нужно, мы просто закроем доступ к методам create\delete средствами nginx в дальнейшем.

Web интерфейс только при большом желании, достаточно методов API.

Тесты тоже очень приветствуются.

В качестве БД рекомендую посмотреть Postgresql и нестандартные типы данных.

## Using
 - Rename .env.example to .env and configure it for your environment.
 - Use (on Linux with docker) "make up", "make down" and "make logs" for start, stop and show logs respectively.
