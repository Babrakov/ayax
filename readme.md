# Test for AYAX

## Overview

Тестовое приложение для АЯКС

## Start

```
$ git clone https://github.com/Babrakov/ayax.git
$ cd ayax
```
Скопировать файл настроек из примера и настроить параметры подключения к БД в .env
```
$ cp .env.example .env
```
Осуществить генерацию секретного ключа приложения
```
$ php artisan key:generate
```
Выполнить миграцию
```
$ php artisan migrate
```
Настроить владельца каталога. Для apache:
```
$ sudo chown -R www-data:www-data ../ayax
```

## Demo

Пример доступен [по адресу test4ayax.ml](http://test4ayax.ml)
