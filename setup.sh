#!/usr/bin/env bash

composer install

php artisan key:generate

npm install

php artisan migrate --seed

composer dev
