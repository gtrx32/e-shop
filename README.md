<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Описание

Этот проект был создан в рамках выполнения задачи по курсу Laravel. Задача заключалась в создании интернет-магазина с функциональностью авторизации и регистрации пользователей, а также возможностью добавления товаров, их просмотра, добавления в корзину и оформления заказов.

## Требования

Для успешного запуска проекта на вашем компьютере должны быть установлены следующие инструменты:

- PHP
- Composer
- MySQL
- Laravel
- Node.js

## Установка

1. **Клонируйте репозиторий**:

    ```bash
    git clone https://github.com/gtrx32/e-shop.git
    cd e-shop
    ```

2. **Установите зависимости** с помощью Composer:

    ```bash
    composer install
    ```

3. **Установите зависимости** для клиентской части с помощью npm:

    ```bash
    npm install
    ```

4. **Создайте файл `.env`** на основе `.env.example`:

    ```bash
    cp .env.example .env
    ```

5. **Настройте вашу базу данных** в файле `.env`, указав параметры для подключения. Пример:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=название_базы_данных
    DB_USERNAME=имя_пользователя
    DB_PASSWORD=пароль
    ```

6. **Сгенерируйте ключ приложения**:

    ```bash
    php artisan key:generate
    ```


7. **Выполните миграции**:

    ```bash
    php artisan migrate
    ```

8. Для корректной работы с изображениями **создайте символическую ссылку** на директорию хранения файлов:

    ```bash
    php artisan storage:link
    ```

9. **Запустите сервер**:

    ```bash
    composer run dev
    ```

*После этого приложение будет доступно по адресу [http://localhost:8000](http://localhost:8000).*