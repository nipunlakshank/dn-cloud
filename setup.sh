#!/usr/bin/env bash

# git configs
git config core.hooksPath .git-hooks

# Install composer packages
composer install

# Install npm packages
npm install

# Copy .env.example to .env (only if .env doesn't exist)
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Generate application key
php artisan key:generate

# Get the database credentials
read -p "Enter the database name: " DB_DATABASE
read -p "Enter the database username: " DB_USERNAME
read -s -p "Enter the database password: " DB_PASSWORD
echo "" # Move to a new line

# Determine OS (Linux vs macOS) for `sed`
if [[ "$OSTYPE" == "darwin"* ]]; then
    # macOS (BSD sed requires empty quotes)
    sed -i '' "s/DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/" .env
    sed -i '' "s/DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/" .env
    sed -i '' "s/DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/" .env
else
    # Linux
    sed -i "s/DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/" .env
    sed -i "s/DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/" .env
    sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/" .env
fi

echo -e "\nRunning migrations..."
echo "----------- Enter the database password again if prompted. -----------"

# Create the database securely
mysql -u "$DB_USERNAME" -p -e "CREATE DATABASE IF NOT EXISTS \`$DB_DATABASE\`" || {
    echo "Failed to create database. Please check your credentials."
    exit 1
}

# Run migrations
php artisan migrate

# Build assets
npm run build

echo "Setup completed successfully."
echo "Run 'php artisan serve' to start the server or 'composer run dev' to start the server and watch for changes."
