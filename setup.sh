#!/usr/bin/env bash

composer install

php artisan key:generate

npm install

php artisan migrate --seed

# git configs
git config core.hooksPath git-hooks

composer run dev
